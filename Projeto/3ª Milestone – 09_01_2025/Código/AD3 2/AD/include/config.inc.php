<?php

//Iniciar Sessão para guardar as variaveis locais

  


//Para conseguir armazenar todos os dados da base de dados num vetor
global $arrConfig;

//Para não reportar erros se for acessado por um cliente
if($_SERVER['HTTP_HOST'] == 'web.colgaia.local' || $_SERVER['HTTP_HOST'] == 'localhost') {
  error_reporting(E_ALL);
} else {
  error_reporting(0);
}

//Armazenamento das configurações
$arrConfig['servername'] ='localhost';

//Armazenamento das configurações Casa
$arrConfig['username'] ='root';
$arrConfig['password']='';
$arrConfig['dbname']='projetoad';

//Armazenamento das configurações Escola
//$arrConfig['username'] ='root';
//$arrConfig['password']='';
//$arrConfig['dbname']='sprinkles';

// isLoginKey - alterar a chave de codificação para o Backoffice
$arrConfig['isLoginKey'] = 'dkfjsdlkfjadslkjsdflkjdslkjsdjsdl';

// acessos FrontOffice
$arrConfig['url_site']='http://localhost/AD';
$arrConfig['dir_site']='C:\xampp\htdocs\AD';

// acessos BackOffice
$arrConfig['url_admin']=$arrConfig['url_site'].'/admin/login.php';
$arrConfig['dir_admin']=$arrConfig['dir_site'].'/admin';

// caminhos Docs e/ou fotografias
$arrConfig['fotos']=$arrConfig['dir_site'].'/Upload';
$arrConfig['files_auth'] = array ('image/jpeg', 'image/jpg', 'image/png', 'image/gif');

// número de registo de página, para situações de paginação
$arrConfig['num_reg_pagina'] = 25;

# chamada de outros include
include_once $arrConfig['dir_site'].'/include/functions.inc.php'; 
include_once $arrConfig['dir_site'].'/include/db.inc.php';
include_once $arrConfig['dir_site'].'/include/funcoes.php';  

/*
$sql = "SELECT descricao, url FROM menu WHERE estado = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="'.$row["url"].'">'.$row["descricao"].'</a>';
    }
}
*/
?>