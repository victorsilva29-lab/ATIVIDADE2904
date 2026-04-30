<?php

function depositar($saldo, $valor) {
    if ($valor > 0) {
        $saldo += $valor;
        echo "Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.\n";
    } else {
        echo "Valor inválido para depósito.\n";
    }
    return $saldo;
}

function sacar($saldo, $valor) {
    if ($valor <= 0) {
        echo "Valor inválido para saque.\n";
    } elseif ($valor > $saldo) {
        echo "Saldo insuficiente.\n";
    } else {
        $saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.\n";
    }
    return $saldo;
}

function extrato($saldo) {
    echo "Saldo atual: R$ " . number_format($saldo, 2, ',', '.') . "\n";
}

function menu() {
    echo "\n=== CAIXA ELETRÔNICO ===\n";
    echo "1 - Depositar\n";
    echo "2 - Sacar\n";
    echo "3 - Extrato\n";
    echo "4 - Sair\n";
}

function caixaEletronico() {
    $saldo = 0.0;

    while (true) {
        menu();
        echo "Escolha uma opção: ";
        $opcao = trim(fgets(STDIN));

        switch ($opcao) {
            case "1":
                echo "Digite o valor para depósito: ";
                $valor = floatval(trim(fgets(STDIN)));
                $saldo = depositar($saldo, $valor);
                break;

            case "2":
                echo "Digite o valor para saque: ";
                $valor = floatval(trim(fgets(STDIN)));
                $saldo = sacar($saldo, $valor);
                break;

            case "3":
                extrato($saldo);
                break;

            case "4":
                echo "Encerrando sistema...\n";
                return;

            default:
                echo "Opção inválida.\n";
        }
    }
}

// Executa o programa
caixaEletronico();

?>