<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinanceiroRequest;
use App\Http\Requests\UpdateFinanceiroRequest;
use App\Models\Estoque;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use App\Models\Pedido;
use App\Models\Financeiro;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('financeiro.index');
    }

    public function qrcodes()
    {
        return view('info');
    }


    public function imprimirNota($id)
{

    // Recupera a nota fiscal do banco de dados ou do sistema de arquivos
        $notaFiscal = Pedido::find($id);

        // Cria o arquivo de texto com as informações da nota fiscal


        $conteudoNota =  "  BRASIL CIMENTOS LTDA" . "\n";
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
        $printer_ip = '192.168.1.87'; // IP da impressora
        $connector = new NetworkPrintConnector($printer_ip, 9100); // 9100 é a porta padrão para impressoras na rede
        $printer = new Printer($connector);
        $printer->text($conteudoNota);
        $printer->cut();
        $printer->close();

        $mensagem = 'Comprovante impresso com sucesso!';
        session()->flash('alerta', $mensagem);
        return redirect()->back();
    }

    public function gerarRelatório(){
    $spreadsheet = new Spreadsheet();

    $aba2 = $spreadsheet->createSheet();
    $aba2->setTitle('Ganhos');


    $aba2->setCellValue('A1', 'Diaria');
    $aba2->setCellValue('B1', 'Semanal');
    $aba2->setCellValue('C1', 'Mensal');
    $aba2->setCellValue('D1', 'MÊS REFERÊNCIA');

    $hoje = Carbon::today();
    $valor_diaria = Pedido::where('created_at', '>=', $hoje)->where('status_id', 1)->sum('valor_total');

    $dataInicioSemana = $hoje->startOfWeek();
    $valorTotal = Pedido::where('created_at', '>=', $dataInicioSemana)->where('status_id', 1)->sum('valor_total');

    $datames = $hoje->startOfMonth();
    $valorTotalmes = Pedido::where('created_at', '>=', $datames)->where('status_id', 1)->sum('valor_total');

    $data = Pedido::latest()->value('created_at');
    
    $linha = 2;
        $aba2->setCellValue('A'.$linha, $valor_diaria);
        $aba2->setCellValue('B'.$linha, $valorTotal);
        $aba2->setCellValue('C'.$linha, $valorTotalmes);
        $aba2->setCellValue('D'.$linha, $data->format('m'));
        $linha++;




    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Vendas');
    $sheet->setCellValue('A1', 'Cliente');
    $sheet->setCellValue('B1', 'Produto');
    $sheet->setCellValue('C1', 'Valor da venda');
    $sheet->setCellValue('D1', 'Quantidade');
    $sheet->setCellValue('E1', 'Pagamentos');
    $sheet->setCellValue('F1', 'Data');
    $pedidos = Pedido::all();
    $linha = 2;
    foreach ($pedidos as $pedido) {
        $sheet->setCellValue('A'.$linha, $pedido->cliente->nome);
        $sheet->setCellValue('B'.$linha, $pedido->produto->nome_produto);
        $sheet->setCellValue('C'.$linha, $pedido->valor_total);
        $sheet->setCellValue('D'.$linha, $pedido->quantidade);
        $sheet->setCellValue('E'.$linha, $pedido->forma_pagamento);
        $sheet->setCellValue('F'.$linha, $pedido->created_at->format('d/m/Y'));
        $linha++;
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

    // Busca todas as vendas no banco de dados
    $estoques = Estoque::all();

    // Adiciona uma linha para cada venda
    $linha = 2;
    foreach ($estoques as $estoque) {
        $sheet->setCellValue('A'.$linha, $estoque->produto->nome_produto);
        $sheet->setCellValue('B'.$linha, $estoque->valor_total);
        $sheet->setCellValue('C'.$linha, $estoque->remessas);
        $sheet->setCellValue('D'.$linha, $estoque->produto->fornecedor->nome);
        $linha++;
    }

    // Cria um novo objeto Xlsx Writer e salva a planilha em um arquivo
    $writer = new Xlsx($spreadsheet);
    $filename = 'relatorio_estoque.xlsx';
    $writer->save($filename);

    // Retorna o arquivo para download
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
