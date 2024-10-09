<?php  
// index.php  

include('conexao.php');  

// Definindo variáveis  
$title = "Exemplo aplicação - Saveincloud";  
$message = "Bem-vindo à minha aplicação!";  

// Processando a inserção de dados  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'inserir') {  
    $nome = trim($_POST['nome']);  

    if (!empty($nome)) {  
        // Inserindo o nome na tabela  
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome) VALUES (?)");  
        $stmt->bind_param("s", $nome);  
        $stmt->execute();  
        $stmt->close();  
    }  
}  

// Consultando dados  
$usuarios = [];  
$result = $conexao->query("SELECT * FROM usuarios");  

if ($result) {  
    while ($row = $result->fetch_assoc()) {  
        $usuarios[] = $row;  
    }  
}  

// Início do HTML  
?>  
<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?php echo $title; ?></title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 0;  
            color: #333;  
        }  
        header {  
            background: #3053ab;  
            color: #fff;  
            padding: 20px;  
            text-align: center;  
            border-bottom: 4px solid #001f55;  
        }  
        main {  
            max-width: 600px;  
            margin: 20px auto;  
            padding: 20px;  
            background: #fff;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }  
        form {  
            margin-bottom: 20px;  
            display: flex;  
            flex-direction: column;  
            align-items: center;  
        }  
        input[type="text"], input[type="submit"] {  
            width: 100%;  
            padding: 10px;  
            margin-top: 10px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            transition: border-color 0.3s;  
        }  
        input[type="text"]:focus {  
            border-color: #3053ab;  
            outline: none;  
        }  
        input[type="submit"] {  
            background-color: #3053ab;  
            color: white;  
            border: none;  
            cursor: pointer;  
            font-weight: bold;  
            transition: background-color 0.3s;  
        }  
        input[type="submit"]:hover {  
            background-color: #253e90;  
        }  
        ul {  
            list-style-type: none;  
            padding: 0;  
        }  
        li {  
            background: #e7f0ff;  
            margin: 5px 0;  
            padding: 10px;  
            border-radius: 4px;  
        }  
        footer {  
            text-align: center;  
            margin-top: 20px;  
            padding: 10px;  
            background: #3053ab;  
            color: white;  
        }  
        footer p {  
            margin: 0;  
        }  
        a {  
            color: #3053ab;  
            text-decoration: none;  
            font-weight: bold;  
        }  
    </style>  
</head>  
<body>  

<header>  
    <h1><?php echo $title; ?></h1>  
</header>  

<main>  
    <p><?php echo $message; ?></p>  

    <!-- Seção para registro de dados -->  
    <h2>Registrar Usuário:</h2>  
    <form method="POST" action="">  
        <input type="text" name="nome" placeholder="Digite seu nome" required>  
        <input type="hidden" name="acao" value="inserir">  
        <input type="submit" value="Inserir">  
    </form>  

    <!-- Exibindo os usuários cadastrados -->  
    <h2>Usuários Cadastrados:</h2>  
    <ul>  
        <?php foreach ($usuarios as $usuario): ?>  
            <li><?php echo htmlspecialchars($usuario['nome']); ?></li>  
        <?php endforeach; ?>  
    </ul>  

    <p><a href="sobre.php">Saiba mais sobre nós</a></p>  
</main>  

<footer>  
    <p>&copy; <?php echo date("Y"); ?> Minha Web App</p>  
</footer>  

</body>  
</html>  
