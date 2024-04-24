<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema Hospitalar</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
<div class="container">
    <h2>NANDAYEYOH</h2>
    <!-- Formulário de Login -->
    <form id="login-form" class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="email" name="email" placeholder="E-mail" required />
        <input type="password" name="password" placeholder="Senha" required />
        <input type="submit" value="Login" />
        <p class="form-toggle">
            Ainda não tem uma conta?
            <a href="#" onclick="toggleForm()">Cadastre-se</a>
        </p>
    </form>
    <!-- Formulário de Cadastro -->
    <form id="register-form" class="register-form" style="display: none" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="nome" placeholder="Nome" required />
        <input type="email" name="email_cadastro" placeholder="E-mail" required />
        <input type="password" name="password_cadastro" placeholder="Senha" required />
        <select name="papel" required>
            <option value="">Selecione sua função</option>
            <option value="medico">Médico</option>
            <option value="enfermeiro">Enfermeiro(a)</option>
            <option value="admin">Administrador</option>
        </select>
        <input type="submit" name="cadastro_submit" value="Cadastrar" />
        <p class="form-toggle">
            Já possui uma conta? <a href="#" onclick="toggleForm()">Faça login</a>
        </p>
    </form>
</div>

<script src="./assets/js/script.js"></script>

<?php
// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
    // Incluir arquivo de conexão com o banco de dados
    include './assets/php/conexao.php';

    // Receber os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Consulta SQL para verificar se as credenciais existem no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($resultado->num_rows > 0) {
        // Credenciais corretas, redirecionar para a página de sucesso
        header("Location: ./assets/html/principal.php");
        exit();
    } else {
        // Credenciais incorretas, exibir mensagem de erro
        echo "<script>alert('Email ou senha incorretos. Tente novamente.');</script>";
    }
}

// Verificar se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email_cadastro']) && isset($_POST['password_cadastro']) && isset($_POST['papel']) && isset($_POST['cadastro_submit'])) {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email_cadastro'];
    $senha = $_POST['password_cadastro'];
    $papel = $_POST['papel'];

    // Incluir arquivo de conexão com o banco de dados
    include './assets/php/conexao.php';

    // Consulta SQL para verificar se o e-mail já está cadastrado
    $sql_verificar_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_verificar_email = $conexao->query($sql_verificar_email);

    // Verificar se o e-mail já está cadastrado
    if ($resultado_verificar_email->num_rows > 0) {
        echo "<script>alert('Este e-mail já está cadastrado.');</script>";
    } else {
        // Consulta SQL para inserir o novo usuário no banco de dados
        $sql_inserir_usuario = "INSERT INTO usuarios (nome, email, senha, papel) VALUES ('$nome', '$email', '$senha', '$papel')";
        if ($conexao->query($sql_inserir_usuario) === TRUE) {
            echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar usuário.');</script>";
        }
    }
}
?>

</body>
</html>
