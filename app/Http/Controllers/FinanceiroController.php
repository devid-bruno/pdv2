<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinanceiroRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateFinanceiroRequest;
use App\Models\Estoque;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Financeiro;
use App\Models\despesa;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use DateTime;
class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::where('status_id', 1)
        ->with('produto', 'produto.estoque')
        ->get();
         $produtos = Produto::whereIn('id', $pedidos->pluck('produto_id'))->get();
         $produtoTotals = [];

         foreach ($pedidos as $pedido) {
             $nomeProduto = $pedido->produto->nome_produto;
             $valorTotal = $pedido->valor_total;
             $quantidade = $pedido->quantidade;
             $valorGastamos = $pedido->produto->estoque->valor_unitario;


             $valorGasto = $valorGastamos * $quantidade;
             $paraVenderGastamos = $quantidade * $valorGastamos;

             $faturamento = $valorTotal - $paraVenderGastamos;
             if (!isset($produtoTotals[$nomeProduto])) {
                 $produtoTotals[$nomeProduto] = [
                    'valor_total' => $valorTotal,
                    'valor_unitario' => $pedido->produto->estoque->valor_unitario,
                    'valorGastamos' => $valorGasto,
                    'quantidade' => $quantidade,
                    'paraVenderGastamos' => $paraVenderGastamos,
                    'faturamento' => $faturamento
                 ];
             } else {
                $produtoTotals[$nomeProduto]['valor_total'] += $valorTotal;
                $produtoTotals[$nomeProduto]['valorGastamos'] += $valorGasto;
                $produtoTotals[$nomeProduto]['quantidade'] += $quantidade;
                $produtoTotals[$nomeProduto]['paraVenderGastamos'] += $paraVenderGastamos;
                $produtoTotals[$nomeProduto]['faturamento'] += $faturamento;
             }
         }

    return view('financeiro.index', compact('produtoTotals'));

    }

    public function despesas(){
        $despesas = despesa::all();
        return view('financeiro.despesas', compact('despesas'));
    }

    public function cadastrodespesa(Request $request){
        $request->validate([
            'quem_pagou' => 'required|string|max:255',
            'forma_pagamento' => 'required|string|max:255',
            'valor' => 'required|max:255',
            'categoria' => 'required|string|max:255'
        ]);

        $despesa = new despesa([
            'quem_pagou' => $request->input('quem_pagou'),
            'forma_pagamento' => $request->input('forma_pagamento'),
            'valor' => $request->input('valor'),
            'categoria' => $request->input('categoria')
        ]);

        $despesa->save();

        return redirect()->route('financeiro.despesas')->with('sucess', 'Despesa cadastrada com sucesso!');
    }

    public function imprimirNota($id)
{

        $notaFiscal = Pedido::find($id);

        $conteudoNota =  "  PALMEIRAS MATERIAS DE CONSTRUCAO LTDA" . "\n";
        $conteudoNota .= "  CNPJ: 43.888.244/0001-65" . "\n";
        $conteudoNota .= "  AV VAL PARAISO, 1601 - CJ PALMEIRAS 60870-440" . "\n";
        $conteudoNota .= "  TELEFONE: (85) 9 9126-3001" . "\n". "\n". "\n";
        $conteudoNota .= "          NUMERO PEDIDO: " . $notaFiscal->numero_pedido . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $conteudoNota .= "Cliente: " . $notaFiscal->cliente->nome . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $conteudoNota .= "Data da emissao: " .  now()->format('d/m/Y H:i:s') . "\n";

        $conteudoNota .= "Produtos:\n";
        if ($notaFiscal->produto) {
            $produto = $notaFiscal->produto;
            $conteudoNota .= "- " . $produto->nome_produto . " - R$ " . number_format($notaFiscal->valor_unitario, 2, ',', '.') . " x " . $notaFiscal->quantidade . "\n";
        }
        $conteudoNota .= "Forma de Pagamento: " . $notaFiscal->forma_pagamento . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $conteudoNota .= "Total do Pedido R$ " . number_format($notaFiscal->valor_total, 2, ',', '.') . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $conteudoNota .= "              VOLTE SEMPRE!" . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $conteudoNota .= "  *Este Ticket NAO e DOCUMENTO FISCAL*" . "\n";
        $conteudoNota .= "==============================================" . "\n";
        $printer_ip = '192.168.1.87';
        $connector = new NetworkPrintConnector($printer_ip, 9100);
        $printer = new Printer($connector);
        $printer->text($conteudoNota);
        $printer->cut();
        $printer->close();

        $mensagem = 'Comprovante impresso com sucesso!';
        session()->flash('alerta', $mensagem);
        return redirect()->back();
    }

    public function gerarRelatório(){
        $pedidos = Pedido::all()->groupBy(function($pedido) {
            return DateTime::createFromFormat('Y-m-d', $pedido->data_venda)->format('m');
        });

        $spreadsheet = new Spreadsheet();

        $spreadsheet->removeSheetByIndex(0);

        $meses = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        foreach ($pedidos as $mes => $pedidos_mes) {
            $sheet = $spreadsheet->createSheet();
            $sheet->setTitle($meses[intval($mes)]);

            $sheet->setCellValue('A1', 'Cliente');
            $sheet->setCellValue('B1', 'Produto');
            $sheet->setCellValue('C1', 'Valor da venda');
            $sheet->setCellValue('D1', 'Quantidade');
            $sheet->setCellValue('E1', 'Pagamentos');
            $sheet->setCellValue('F1', 'Dia Venda');

            $linha = 2;
            foreach ($pedidos_mes as $pedido) {
                $sheet->setCellValue('A'.$linha, $pedido->cliente->nome);
                $sheet->setCellValue('B'.$linha, $pedido->produto->nome_produto);
                $sheet->setCellValue('C'.$linha, $pedido->valor_total);
                $sheet->setCellValue('D'.$linha, $pedido->quantidade);
                $sheet->setCellValue('E'.$linha, $pedido->forma_pagamento);
                $sheet->setCellValue('F'.$linha, DateTime::createFromFormat('Y-m-d', $pedido->data_venda)->format('d') );
                $linha++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'relatorio_vendas.xlsx';
        $writer->save($filename);

        return response()->download($filename);

    }

    public function RelatórioRemessas(){
    $spreadsheet = new Spreadsheet();

    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Produto');
    $sheet->setCellValue('B1', 'Valor das Compras');
    $sheet->setCellValue('C1', 'Remessas');
    $sheet->setCellValue('D1', 'Fornecedor');

    $estoques = Estoque::all();


    $linha = 2;
    foreach ($estoques as $estoque) {
        $sheet->setCellValue('A'.$linha, $estoque->produto->nome_produto);
        $sheet->setCellValue('B'.$linha, $estoque->valor_total);
        $sheet->setCellValue('C'.$linha, $estoque->remessas);
        $sheet->setCellValue('D'.$linha, $estoque->produto->fornecedor->nome);
        $linha++;
    }


    $writer = new Xlsx($spreadsheet);
    $filename = 'relatorio_estoque.xlsx';
    $writer->save($filename);


    return response()->download($filename);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinanceiroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Financeiro $financeiro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Financeiro $financeiro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceiroRequest $request, Financeiro $financeiro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Financeiro $financeiro)
    {
        //
    }
}
