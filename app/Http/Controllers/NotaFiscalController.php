<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

class NotaFiscalController extends Controller
{
    public function imprimirNota($id)
{
    // Recupera a nota fiscal do banco de dados ou do sistema de arquivos
    $notaFiscal = Pedido::find($id);

    // Cria o arquivo de texto com as informações da nota fiscal
    $conteudoNota = "Número da nota fiscal: " . $notaFiscal->numero . "\n";
    $conteudoNota .= "Data da emissão: " . $notaFiscal->data_emissao . "\n";
    $conteudoNota .= "Produtos:\n";
    foreach ($notaFiscal->produtos as $produto) {
        $conteudoNota .= "- " . $produto->nome . " - R$ " . number_format($produto->valor_unitario, 2, ',', '.') . " x " . $produto->quantidade . " = R$ " . number_format($produto->valor_total, 2, ',', '.') . "\n";
    }
    $conteudoNota .= "Total da nota fiscal: R$ " . number_format($notaFiscal->valor_total, 2, ',', '.') . "\n";

    // Conecta à impressora térmica e envia o arquivo de texto para impressão
    $printer_ip = '192.168.0.100'; // IP da impressora
    $connector = new NetworkPrintConnector($printer_ip, 9100); // 9100 é a porta padrão para impressoras na rede
    $printer = new Printer($connector);
    $printer->text($conteudoNota);
    $printer->cut();
    $printer->close();
}
}
