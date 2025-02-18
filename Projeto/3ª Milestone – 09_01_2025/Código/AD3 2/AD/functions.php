<?php
function conectarBanco() {
    $host = 'localhost';
    $dbname = 'projetoad';
    $username = 'root';
    $password = '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}

function calcularImportancia($incubadoras, $ordem, $distrito, $distancias) {
    foreach ($incubadoras as &$incubadora) {
        $importancia = 0;

        foreach ($ordem as $campo) {
            if ($campo === 'localizacao') {
                $distancia = $distancias[$distrito][$incubadora['localizacao']] ?? PHP_INT_MAX;
                $importancia -= $distancia; // Menor distância é melhor
            } elseif ($campo === 'valor') {
                $importancia -= $incubadora['valor']; // Menor valor é melhor
            } else {
                $importancia += $incubadora[$campo]; // Maior valor é melhor
            }
        }

        $incubadora['importancia'] = $importancia;
    }

    usort($incubadoras, function ($a, $b) {
        return $b['importancia'] <=> $a['importancia'];
    });

    return $incubadoras;
}
