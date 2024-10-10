<?php  
// conexao.php  
$hostname = "10.70.35.247:3306"; #IP Privado, Público ou Endpoint  
$bancodedados = "site1";  #Nome da sua base
$usuario = "root";  #Usuário de acesso
$senha = "suasenha";  #Senha do Banco de Dados

// Criando a conexão  
$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);  

?>  
