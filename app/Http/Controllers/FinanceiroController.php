<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinanceiroRequest;
use App\Http\Requests\UpdateFinanceiroRequest;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use App\Models\Pedido;
use App\Models\Financeiro;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

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
        // Conecta à impressora térmica e envia o arquivo de texto para impressão
        $printer_ip = '192.168.1.87'; // IP da impressora
        $connector = new NetworkPrintConnector($printer_ip, 9100); // 9100 é a porta padrão para impressoras na rede
        $printer = new Printer($connector);
        $printer->text($conteudoNota);
        $printer->cut();
        $printer->close();



        // Define uma mensagem de alerta para informar que o comprovante foi impresso com sucesso
        $mensagem = 'Comprovante impresso com sucesso!';

        // Adiciona a mensagem na sessão
        session()->flash('alerta', $mensagem);

        // Redireciona o usuário de volta à página anterior
        return redirect()->back();
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
