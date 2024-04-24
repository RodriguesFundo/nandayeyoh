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
        </div>
    </div>
</body>
</html>
