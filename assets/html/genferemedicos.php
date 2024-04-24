<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Enfermeiros e Médicos</title>
    <link rel="stylesheet" href="../css/enfermedicos.css">
    <script>
        function mostrarAlerta() {
            alert("Operação realizada com sucesso!");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Gestão de Enfermeiros e Médicos</h2>

        <!-- Adicionar Enfermeiro -->
        <div class="card">
            <h3>Adicionar Enfermeiro</h3>
            <form method="post" action="">
                <label for="nome_enfermeiro">Nome do Enfermeiro:</label>
                <input type="text" id="nome_enfermeiro" name="nome_enfermeiro" required>
                
                <label for="cpf_enfermeiro">BI do Enfermeiro:</label>
                <input type="text" id="cpf_enfermeiro" name="cpf_enfermeiro" required>
                
                <button type="submit" name="adicionar_enfermeiro" onclick="mostrarAlerta()">Adicionar Enfermeiro</button>
            </form>
        </div>

        <!-- Adicionar Médico -->
        <div class="card">
            <h3>Adicionar Médico</h3>
            <form method="post" action="">
                <label for="nome_medico">Nome do Médico:</label>
                <input type="text" id="nome_medico" name="nome_medico" required>
                
                <label for="especialidade_medico">Especialidade:</label>
                <input type="text" id="especialidade_medico" name="especialidade_medico" required>
                
                <label for="crm_medico">BI do Médico:</label>
                <input type="text" id="crm_medico" name="crm_medico" required>
                
                <button type="submit" name="adicionar_medico" onclick="mostrarAlerta()">Adicionar Médico</button>
            </form>
        </div>

        <!-- Visualizar Enfermeiros -->
        <div class="card">
            <h3>Visualizar Enfermeiros</h3>
            <?php
            // Incluir arquivo de conexão com o banco de dados
            include '../php/conexao.php';

            // Consulta SQL para recuperar os enfermeiros
            $sql_enfermeiros = "SELECT * FROM Enfermeiros";
            $resultado_enfermeiros = $conexao->query($sql_enfermeiros);

            // Verificar se há resultados
            if ($resultado_enfermeiros->num_rows > 0) {
                // Exibir os enfermeiros em uma tabela
                echo "<table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>BI</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $resultado_enfermeiros->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["CPF"] . "</td>
                            <td>
                                <a href=\"#\">Editar</a> |
                                <a href=\"#\">Excluir</a>
                            </td>
                        </tr>";
                }
                echo "</tbody>
                    </table>";
            } else {
                echo "Nenhum enfermeiro encontrado.";
            }
            ?>
        </div>

        <!-- Visualizar Médicos -->
        <div class="card">
            <h3>Visualizar Médicos</h3>
            <?php
            // Consulta SQL para recuperar os médicos
            $sql_medicos = "SELECT * FROM Medicos";
            $resultado_medicos = $conexao->query($sql_medicos);

            // Verificar se há resultados
            if ($resultado_medicos->num_rows > 0) {
                // Exibir os médicos em uma tabela
                echo "<table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Especialidade</th>
                                <th>BI</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $resultado_medicos->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["Especialidade"] . "</td>
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
                echo "Nenhum médico encontrado.";
            }
            ?>
        </div>

        <!-- Excluir Enfermeiro -->
        <div class="card">
            <h3>Excluir Enfermeiro</h3>
            <form method="post" action="">
                <label for="cpf_excluir_enfermeiro">BI do Enfermeiro:</label>
                <input type="text" id="cpf_excluir_enfermeiro" name="cpf_excluir_enfermeiro" required>
                
                <button type="submit" name="excluir_enfermeiro" onclick="mostrarAlerta()">Excluir Enfermeiro</button>
            </form>
            <?php
            // Verificar se o formulário de excluir enfermeiro foi enviado
            if (isset($_POST['excluir_enfermeiro'])) {
                // Receber CPF do enfermeiro a ser excluído
                $cpf_excluir_enfermeiro = $_POST['cpf_excluir_enfermeiro'];

                // Excluir enfermeiro com o CPF especificado
                $sql_excluir_enfermeiro = "DELETE FROM Enfermeiros WHERE CPF='$cpf_excluir_enfermeiro'";
                if ($conexao->query($sql_excluir_enfermeiro) === TRUE) {
                    echo "<script>alert('Enfermeiro excluído com sucesso.');</script>";
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao excluir enfermeiro: " . $conexao->error;
                }
            }
            ?>
        </div>

        <!-- Excluir Médico -->
        <div class="card">
            <h3>Excluir Médico</h3>
            <form method="post" action="">
                <label for="cpf_excluir_medico">BI do Médico:</label>
                <input type="text" id="cpf_excluir_medico" name="cpf_excluir_medico" required>
                
                <button type="submit" name="excluir_medico" onclick="mostrarAlerta()">Excluir Médico</button>
            </form>
            <?php
            // Verificar se o formulário de excluir médico foi enviado
            if (isset($_POST['excluir_medico'])) {
                // Receber CPF do médico a ser excluído
                $cpf_excluir_medico = $_POST['cpf_excluir_medico'];

                // Excluir médico com o CPF especificado
                $sql_excluir_medico = "DELETE FROM Medicos WHERE cpf='$cpf_excluir_medico'";
                if ($conexao->query($sql_excluir_medico) === TRUE) {
                    echo "<script>alert('Médico excluído com sucesso.');</script>";
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao excluir médico: " . $conexao->error;
                }
            }
            ?>
        </div>

    </div>
</body>
</html>
