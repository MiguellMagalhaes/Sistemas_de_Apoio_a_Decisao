<?php
require_once 'functions.php';

// Recuperar parâmetros
$distrito = $_GET['distrito'] ?? '';
$ordem = json_decode($_GET['ordem'] ?? '[]', true);

// Conectar ao banco de dados
$pdo = conectarBanco();

// Buscar todas as incubadoras
$stmt = $pdo->prepare("SELECT * FROM incubadoras");
$stmt->execute();
$incubadoras = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Matriz de distâncias
$distancias = [
    'Aveiro' => ['Aveiro' => 0, 'Beja' => 382, 'Braga' => 109, 'Bragança' => 253],
    'Beja' => ['Aveiro' => 382, 'Beja' => 0, 'Braga' => 471, 'Bragança' => 535],
    // Outros distritos omitidos
];

// Calcular importância para localização
$incubadoras = calcularImportancia($incubadoras, $ordem, $distrito, $distancias);

// Resultado principal
$resultado = $incubadoras[0] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Localização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Resultado: Localização</h1>
        <?php if ($resultado): ?>
            <ul class="list-group">
                <li class="list-group-item"><strong>Localização:</strong> <?= htmlspecialchars($resultado['localizacao']) ?></li>
                <li class="list-group-item"><strong>Valor:</strong> <?= htmlspecialchars($resultado['valor']) ?></li>
                <!-- Adicionar outros campos -->
            </ul>
        <?php else: ?>
            <p class="text-danger">Nenhuma incubadora encontrada.</p>
        <?php endif; ?>
    </div>
</body>
</html>
