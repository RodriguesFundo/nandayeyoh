<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pacientes</title>
    <link rel="stylesheet" href="../css/pacientes.css">
</head>
<body>
    <div class="container">
        <h2>Gestão de Pacientes</h2>

        <!-- Adicionar Paciente -->
        <div class="card">
            <h3>Adicionar Paciente</h3>
            <form method="post" action="">
                <label for="nome">Nome do Paciente:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                </select>
                
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
                
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required>
                
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
                
                <label for="cpf">BI:</label>
                <input type="text" id="cpf" name="cpf" required>
                
                <button type="submit" name="adicionar_paciente">Adicionar Paciente</button>
            </form>
            <?php
            // Verificar se o formulário de adicionar paciente foi enviado
            if (isset($_POST['adicionar_paciente'])) {
                // Incluir arquivo de conexão com o banco de dados
                include '../php/conexao.php';

                // Receber dados do formulário
                $nome = $_POST['nome'];
                $sexo = $_POST['sexo'];
                $data_nascimento = $_POST['data_nascimento'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $cpf = $_POST['cpf'];

                // Inserir dados na tabela Pacientes
                $sql = "INSERT INTO Pacientes (Nome, Sexo, Data_Nascimento, Endereco, Telefone, cpf) VALUES ('$nome', '$sexo', '$data_nascimento', '$endereco', '$telefone', '$cpf')";
                if ($conexao->query($sql) === TRUE) {
                    echo "<script>alert('Paciente adicionado com sucesso.');</script>";
                    // Redirecionar para a mesma página após adicionar paciente
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao adicionar paciente: " . $conexao->error;
                }
            }
            ?>
        </div>

        <!-- Visualizar Pacientes -->
        <div class="card">
            <h3>Visualizar Pacientes</h3>
            <?php
            // Incluir arquivo de conexão com o banco de dados
            include '../php/conexao.php';

            // Consulta SQL para recuperar os pacientes
            $sql = "SELECT * FROM Pacientes";
            $resultado = $conexao->query($sql);

            // Verificar se há resultados
            if ($resultado->num_rows > 0) {
                // Exibir os pacientes em uma tabela
                echo "<table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Data de Nascimento</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>BI</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["Sexo"] . "</td>
                            <td>" . $row["Data_Nascimento"] . "</td>
                            <td>" . $row["Endereco"] . "</td>
                            <td>" . $row["Telefone"] . "</td>
                            <td>" . $row["cpf"] . "</td>
                            <td>
                                <a href=\"#\">Editar</a> |
                                <a href=\"#\">Excluir</a>
                            </td>
                        </tr>";
                }
                echo "</tbody>
                    </table>";
            } else {
                echo "Nenhum paciente encontrado.";
            }
            ?>
        </div>

        <!-- Excluir Paciente -->
        <div class="card">
            <h3>Excluir Paciente</h3>
            <form method="post" action="">
                <label for="cpf">BI do Paciente:</label>
                <input type="text" id="cpf" name="cpf" required>
                
                <button type="submit" name="excluir_paciente">Excluir Paciente</button>
            </form>
            <?php
            // Verificar se o formulário de excluir paciente foi enviado
            if (isset($_POST['excluir_paciente'])) {
                // Incluir arquivo de conexão com o banco de dados
                include '../php/conexao.php';

                // Receber CPF do paciente a ser excluído
                $cpf_excluir = $_POST['cpf'];

                // Excluir paciente com o CPF especificado
                $sql = "DELETE FROM Pacientes WHERE cpf='$cpf_excluir'";
                if ($conexao->query($sql) === TRUE) {
                    echo "<script>alert('Paciente excluído com sucesso.');</script>";
                    // Redirecionar para a mesma página após excluir paciente
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao excluir paciente: " . $conexao->error;
                }
            }
            ?>
        </div>

        <div class="card" style="text-align: center;">
    <button onclick="window.location.href='./principal.php'"
            style="background-color: #555; /* Cor de fundo cinza escuro */
                   color: #fff; /* Cor do texto */
                   border: none; /* Sem borda */
                   padding: 10px 20px; /* Espaçamento interno */
                   border-radius: 5px; /* Borda arredondada */
                   cursor: pointer; /* Cursor */
                   font-size: 16px; /* Tamanho da fonte */
                   transition: background-color 0.3s; /* Transição de cor de fundo */"
            onmouseover="this.style.backgroundColor='#007bff'" 
            onmouseout="this.style.backgroundColor='#555'"> 
        Voltar para a tela principal
    </button>
</div>

    </div>
</body>
</html>
