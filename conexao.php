<?php  
// conexao.php  
$hostname = "10.70.35.247:3306"; #IP Privado, Público ou Endpoint  
$bancodedados = "site1";  #Nome da sua base
$usuario = "root";  #Usuário de acesso
$senha = "ZTAiri94171";  #Senha do Banco de Dados

// Criando a conexão  
$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);  

// Verificando a conexão  
if ($conexao->connect_errno) {  #Se a conexão retornar em erro;
    die("Falha ao conectar: " . $conexao->connect_error); #Retornar "Falha ao conectar"  
}  
?>  
