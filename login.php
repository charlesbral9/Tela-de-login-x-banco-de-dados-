<?php
$usuario = 'root'; $senha = ''; $database = 'tela_usuario'; $host = 'localhost';
$mysqli = new mysqli($host, $usuario, $senha, $database);
if ($mysqli->connect_errno) {
die ("falha ao conectar ao banco de dados: " . $mysqli->connect_errno) . $mysqli->connect_error;
} else;
if(isset($_POST['email']) || isset($_POST['senha'])) {if(strlen($_POST['usuário']) == 0) {echo "Preencha seu e-mail";} else if(strlen($_POST['senha']) == 0) {
echo "Preencha sua senha";} else {
$email = $mysqli->real_escape_string($_POST['usuário']);
$senha = $mysqli->real_escape_string($_POST['senha']);
$sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade = $sql_query->num_rows;
if($quantidade == 1) {$usuario = $sql_query->fetch_assoc();
if (!isset($_SESSION)) {session_start();}$_SESSION['id'] = $usuarios['id']; 
$_SESSION['nome'] = $usuarios['nome']; header("Location: painel.php");
} else {echo "Falha ao logar! E-mail ou senha incorretos";