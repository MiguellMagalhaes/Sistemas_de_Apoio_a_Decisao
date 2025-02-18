<?php
// Configurações de conexão com a base de dados
$host = 'localhost';
$dbname = 'projetoad';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Matriz de distâncias aproximadas entre distritos de Portugal (em km)
$distancias = [
    'Aveiro' => ['Aveiro' => 0, 'Beja' => 382, 'Braga' => 109, 'Bragança' => 253, 'Castelo Branco' => 190, 'Coimbra' => 63, 'Évora' => 286, 'Faro' => 480, 'Guarda' => 152, 'Leiria' => 91, 'Lisboa' => 218, 'Portalegre' => 233, 'Porto' => 74, 'Santarém' => 166, 'Setúbal' => 245, 'Viana do Castelo' => 94, 'Vila Real' => 133, 'Viseu' => 92],
    'Beja' => ['Aveiro' => 382, 'Beja' => 0, 'Braga' => 471, 'Bragança' => 535, 'Castelo Branco' => 283, 'Coimbra' => 321, 'Évora' => 79, 'Faro' => 152, 'Guarda' => 336, 'Leiria' => 247, 'Lisboa' => 178, 'Portalegre' => 183, 'Porto' => 457, 'Santarém' => 195, 'Setúbal' => 142, 'Viana do Castelo' => 499, 'Vila Real' => 429, 'Viseu' => 338],
    'Braga' => ['Aveiro' => 109, 'Beja' => 471, 'Braga' => 0, 'Bragança' => 193, 'Castelo Branco' => 312, 'Coimbra' => 171, 'Évora' => 388, 'Faro' => 563, 'Guarda' => 244, 'Leiria' => 200, 'Lisboa' => 317, 'Portalegre' => 347, 'Porto' => 53, 'Santarém' => 279, 'Setúbal' => 346, 'Viana do Castelo' => 48, 'Vila Real' => 82, 'Viseu' => 162],
    'Bragança' => ['Aveiro' => 253, 'Beja' => 535, 'Braga' => 193, 'Bragança' => 0, 'Castelo Branco' => 234, 'Coimbra' => 279, 'Évora' => 452, 'Faro' => 627, 'Guarda' => 140, 'Leiria' => 306, 'Lisboa' => 423, 'Portalegre' => 349, 'Porto' => 217, 'Santarém' => 385, 'Setúbal' => 452, 'Viana do Castelo' => 218, 'Vila Real' => 106, 'Viseu' => 190],
    'Castelo Branco' => ['Aveiro' => 190, 'Beja' => 283, 'Braga' => 312, 'Bragança' => 234, 'Castelo Branco' => 0, 'Coimbra' => 118, 'Évora' => 205, 'Faro' => 396, 'Guarda' => 78, 'Leiria' => 129, 'Lisboa' => 236, 'Portalegre' => 95, 'Porto' => 264, 'Santarém' => 169, 'Setúbal' => 229, 'Viana do Castelo' => 340, 'Vila Real' => 208, 'Viseu' => 100],
    'Coimbra' => ['Aveiro' => 63, 'Beja' => 321, 'Braga' => 171, 'Bragança' => 279, 'Castelo Branco' => 118, 'Coimbra' => 0, 'Évora' => 244, 'Faro' => 438, 'Guarda' => 140, 'Leiria' => 72, 'Lisboa' => 201, 'Portalegre' => 187, 'Porto' => 121, 'Santarém' => 140, 'Setúbal' => 209, 'Viana do Castelo' => 200, 'Vila Real' => 172, 'Viseu' => 81],
    'Évora' => ['Aveiro' => 286, 'Beja' => 79, 'Braga' => 388, 'Bragança' => 452, 'Castelo Branco' => 205, 'Coimbra' => 244, 'Évora' => 0, 'Faro' => 233, 'Guarda' => 265, 'Leiria' => 211, 'Lisboa' => 137, 'Portalegre' => 100, 'Porto' => 374, 'Santarém' => 130, 'Setúbal' => 96, 'Viana do Castelo' => 416, 'Vila Real' => 346, 'Viseu' => 265],
    'Faro' => ['Aveiro' => 480, 'Beja' => 152, 'Braga' => 563, 'Bragança' => 627, 'Castelo Branco' => 396, 'Coimbra' => 438, 'Évora' => 233, 'Faro' => 0, 'Guarda' => 457, 'Leiria' => 394, 'Lisboa' => 278, 'Portalegre' => 334, 'Porto' => 550, 'Santarém' => 307, 'Setúbal' => 275, 'Viana do Castelo' => 590, 'Vila Real' => 521, 'Viseu' => 455],
    'Guarda' => ['Aveiro' => 152, 'Beja' => 336, 'Braga' => 244, 'Bragança' => 140, 'Castelo Branco' => 78, 'Coimbra' => 140, 'Évora' => 265, 'Faro' => 457, 'Guarda' => 0, 'Leiria' => 174, 'Lisboa' => 272, 'Portalegre' => 169, 'Porto' => 212, 'Santarém' => 220, 'Setúbal' => 283, 'Viana do Castelo' => 272, 'Vila Real' => 126, 'Viseu' => 88],
    'Leiria' => ['Aveiro' => 91, 'Beja' => 247, 'Braga' => 200, 'Bragança' => 306, 'Castelo Branco' => 129, 'Coimbra' => 72, 'Évora' => 211, 'Faro' => 394, 'Guarda' => 174, 'Leiria' => 0, 'Lisboa' => 140, 'Portalegre' => 153, 'Porto' => 175, 'Santarém' => 101, 'Setúbal' => 172, 'Viana do Castelo' => 230, 'Vila Real' => 202, 'Viseu' => 121],
    'Lisboa' => ['Aveiro' => 218, 'Beja' => 178, 'Braga' => 317, 'Bragança' => 423, 'Castelo Branco' => 236, 'Coimbra' => 201, 'Évora' => 137, 'Faro' => 278, 'Guarda' => 272, 'Leiria' => 140, 'Lisboa' => 0, 'Portalegre' => 147, 'Porto' => 313, 'Santarém' => 79, 'Setúbal' => 48, 'Viana do Castelo' => 344, 'Vila Real' => 274, 'Viseu' => 229],
    'Portalegre' => ['Aveiro' => 233, 'Beja' => 183, 'Braga' => 347, 'Bragança' => 349, 'Castelo Branco' => 95, 'Coimbra' => 187, 'Évora' => 100, 'Faro' => 334, 'Guarda' => 169, 'Leiria' => 153, 'Lisboa' => 147, 'Portalegre' => 0, 'Porto' => 328, 'Santarém' => 115, 'Setúbal' => 158, 'Viana do Castelo' => 374, 'Vila Real' => 244, 'Viseu' => 181],
    'Porto' => ['Aveiro' => 74, 'Beja' => 457, 'Braga' => 53, 'Bragança' => 217, 'Castelo Branco' => 264, 'Coimbra' => 121, 'Évora' => 374, 'Faro' => 550, 'Guarda' => 212, 'Leiria' => 175, 'Lisboa' => 313, 'Portalegre' => 328, 'Porto' => 0, 'Santarém' => 265, 'Setúbal' => 317, 'Viana do Castelo' => 74, 'Vila Real' => 96, 'Viseu' => 133],
    'Santarém' => ['Aveiro' => 166, 'Beja' => 195, 'Braga' => 279, 'Bragança' => 385, 'Castelo Branco' => 169, 'Coimbra' => 140, 'Évora' => 130, 'Faro' => 307, 'Guarda' => 220, 'Leiria' => 101, 'Lisboa' => 79, 'Portalegre' => 115, 'Porto' => 265, 'Santarém' => 0, 'Setúbal' => 89, 'Viana do Castelo' => 307, 'Vila Real' => 237, 'Viseu' => 186],
    'Setúbal' => ['Aveiro' => 245, 'Beja' => 142, 'Braga' => 346, 'Bragança' => 452, 'Castelo Branco' => 229, 'Coimbra' => 209, 'Évora' => 96, 'Faro' => 275, 'Guarda' => 283, 'Leiria' => 172, 'Lisboa' => 48, 'Portalegre' => 158, 'Porto' => 317, 'Santarém' => 89, 'Setúbal' => 0, 'Viana do Castelo' => 375, 'Vila Real' => 305, 'Viseu' => 260],
    'Viana do Castelo' => ['Aveiro' => 94, 'Beja' => 499, 'Braga' => 48, 'Bragança' => 218, 'Castelo Branco' => 340, 'Coimbra' => 200, 'Évora' => 416, 'Faro' => 590, 'Guarda' => 272, 'Leiria' => 230, 'Lisboa' => 344, 'Portalegre' => 374, 'Porto' => 74, 'Santarém' => 307, 'Setúbal' => 375, 'Viana do Castelo' => 0, 'Vila Real' => 146, 'Viseu' => 193],
    'Vila Real' => ['Aveiro' => 133, 'Beja' => 429, 'Braga' => 82, 'Bragança' => 106, 'Castelo Branco' => 208, 'Coimbra' => 172, 'Évora' => 346, 'Faro' => 521, 'Guarda' => 126, 'Leiria' => 202, 'Lisboa' => 274, 'Portalegre' => 244, 'Porto' => 96, 'Santarém' => 237, 'Setúbal' => 305, 'Viana do Castelo' => 146, 'Vila Real' => 0, 'Viseu' => 99],
    'Viseu' => ['Aveiro' => 92, 'Beja' => 338, 'Braga' => 162, 'Bragança' => 190, 'Castelo Branco' => 100, 'Coimbra' => 81, 'Évora' => 265, 'Faro' => 455, 'Guarda' => 88, 'Leiria' => 121, 'Lisboa' => 229, 'Portalegre' => 181, 'Porto' => 133, 'Santarém' => 186, 'Setúbal' => 260, 'Viana do Castelo' => 193, 'Vila Real' => 99, 'Viseu' => 0]
];

// Processar a requisição do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distritoUtilizador = $_POST['distrito'] ?? '';

    if (isset($_POST['ordem']) && is_array($_POST['ordem']) && !empty($distritoUtilizador)) {
        $ordem = $_POST['ordem']; // Ordem dos campos enviada pelo utilizador
        $campoPrioritario = $ordem[0] ?? null; // Primeiro campo como prioridade principal

        // Validar campos válidos
        $camposValidos = ['localizacao', 'estacionamento', 'escritorios', 'valor', 'area'];
        $ordemFiltrada = array_filter($ordem, fn($campo) => in_array($campo, $camposValidos));

        if (count($ordemFiltrada) === count($camposValidos) && $campoPrioritario) {
            // Buscar todas as incubadoras do base de dados
            $stmt = $pdo->query("SELECT * FROM incubadoras");
            $incubadoras = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($campoPrioritario === 'localizacao') {
                // Calcular distâncias e ordenar as incubadoras
                foreach ($incubadoras as &$incubadora) {
                    $localizacao = $incubadora['localizacao'];
                    $incubadora['distancia'] = $distancias[$distritoUtilizador][$localizacao] ?? PHP_INT_MAX;
                }
                unset($incubadora);

                // Ordenar por distância (menor distância primeiro)
                usort($incubadoras, fn($a, $b) => $a['distancia'] <=> $b['distancia']);
            } else {
                // Ordenar com base no campo prioritário
                usort($incubadoras, function ($a, $b) use ($campoPrioritario) {
                    if ($campoPrioritario === 'valor') {
                        return $a[$campoPrioritario] <=> $b[$campoPrioritario]; // Menor valor primeiro
                    } else {
                        return $b[$campoPrioritario] <=> $a[$campoPrioritario]; // Maior valor primeiro
                    }
                });
            }

            // Resultado final
            $resultado = $incubadoras[0] ?? null; // Retorna o primeiro resultado
        } else {
            $erro = "A ordem enviada é inválida ou faltam campos.";
        }
    } else {
        $erro = "Por favor, selecione seu distrito e defina a ordem dos campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incubadora - Ordenação por Importância</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            background-image: url('assets/img/imagem1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        ul#sortable {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
            background-color: #f4f4f4;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        ul#sortable li {
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            cursor: move;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        ul#sortable li input {
            margin-right: 10px;
        }
        button {
            background-color:rgb(13, 140, 224);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color:rgb(23, 63, 240);
        }
        .error, .result {
            text-align: center;
        }
        .error {
            color: red;
        }
        .result ul {
            list-style-type: none;
            padding: 0;
        }
        .result li {
            background-color: #f1f1f1;
            padding: 10px;
            margin: 5px 0;
        }

        
    .back-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color:rgb(13, 140, 224);
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .back-button:hover {
        background-color: #0056b3;
    }


    </style>
</head>
<body>
<a href="index.php" class="back-button">Voltar à página inicial</a>


    <div class="container">
        <h1>Ordene os Campos por Importância</h1>
        <form method="post">
            <label for="distrito">Selecione o seu distrito:</label>
            <select name="distrito" id="distrito" required>
                <option value="">-- Escolha --</option>
                <?php foreach (array_keys($distancias) as $distrito): ?>
                    <option value="<?= htmlspecialchars($distrito) ?>"><?= htmlspecialchars($distrito) ?></option>
                <?php endforeach; ?>
            </select>

            <p>Arraste e solte os campos para definir a ordem de importância:</p>
            <ul id="sortable">
                <li><input type="hidden" name="ordem[]" value="localizacao">Localização</li>
                <li><input type="hidden" name="ordem[]" value="estacionamento">Número de Estacionamentos</li>
                <li><input type="hidden" name="ordem[]" value="escritorios">Número de Escritórios</li>
                <li><input type="hidden" name="ordem[]" value="valor">Valor</li>
                <li><input type="hidden" name="ordem[]" value="area">Área</li>
            </ul>

            <button type="submit">Pesquisar</button>
        </form>

        <?php if (!empty($erro)): ?>
            <p class="error"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <?php if (!empty($resultado)): ?>
            <div class="result">
                <h2>Resultado</h2>
                <ul>
                    <li><strong>Localização:</strong> <?= htmlspecialchars($resultado['localizacao']) ?></li>
                    <li><strong>Número de Estacionamentos:</strong> <?= htmlspecialchars($resultado['estacionamento']) ?></li>
                    <li><strong>Número de Escritórios:</strong> <?= htmlspecialchars($resultado['escritorios']) ?></li>
                    <li><strong>Valor:</strong> <?= htmlspecialchars($resultado['valor']) ?></li>
                    <li><strong>Área:</strong> <?= htmlspecialchars($resultado['area']) ?></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sortable = document.getElementById('sortable');
            new Sortable(sortable, {
                animation: 150
            });
        });
    </script>
</body>
</html>
