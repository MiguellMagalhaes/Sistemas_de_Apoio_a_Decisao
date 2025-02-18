<?php
include 'config.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário e sanitizá-los

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


    // Verificar se os campos estão preenchidos corretamente
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Conectar ao banco de dados
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparar a instrução SQL para inserir os dados
            $sql = "INSERT INTO salvar (email) VALUES (:email)";

            // Preparar a query para execução
            $stmt = $conn->prepare($sql);

            // Associar os valores às variáveis na consulta
  
            $stmt->bindParam(':email', $email);


            // Executar a query
            $stmt->execute();

            echo "Mensagem salva com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao salvar mensagem: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
}
?>