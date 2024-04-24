<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../css/relatorios.css">
</head>
<body>
    <div class="container">
        <h2>Relatórios</h2>

        <!-- Relatório de Pacientes -->
        <div class="card">
            <h3>Relatório de Pacientes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>BI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inclua o arquivo de conexão com o banco de dados
                    include '../php/conexao.php';

                    // Consulta SQL para recuperar os pacientes
                    $sql_pacientes = "SELECT * FROM Pacientes";
                    $resultado_pacientes = $conexao->query($sql_pacientes);

                    // Verificar se há resultados
                    if ($resultado_pacientes->num_rows > 0) {
                        // Exibir os pacientes em uma tabela
                        while ($row = $resultado_pacientes->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["Nome"] . "</td>
                                    <td>" . $row["Sexo"] . "</td>
                                    <td>" . $row["Data_Nascimento"] . "</td>
                                    <td>" . $row["Endereco"] . "</td>
                                    <td>" . $row["Telefone"] . "</td>
                                    <td>" . $row["Email"] . "</td>
                                    <td>" . $row["cpf"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhum paciente encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Relatório de Leitos -->
        <div class="card">
            <h3>Relatório de Leitos</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID do Leito</th>
                        <th>Tipo de Leito</th>
                        <th>Estado do Leito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para recuperar os leitos
                    $sql_leitos = "SELECT * FROM Leitos";
                    $resultado_leitos = $conexao->query($sql_leitos);

                    // Verificar se há resultados
                    if ($resultado_leitos->num_rows > 0) {
                        // Exibir os leitos em uma tabela
                        while ($row = $resultado_leitos->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id_leito"] . "</td>
                                    <td>" . $row["tipo_leito"] . "</td>
                                    <td>" . $row["estado"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhum leito encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Relatório de Médicos -->
        <div class="card">
            <h3>Relatório de Médicos</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Especialidade</th>
                        <th>BI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para recuperar os médicos
                    $sql_medicos = "SELECT * FROM Medicos";
                    $resultado_medicos = $conexao->query($sql_medicos);

                    // Verificar se há resultados
                    if ($resultado_medicos->num_rows > 0) {
                        // Exibir os médicos em uma tabela
                        while ($row = $resultado_medicos->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["Nome"] . "</td>
                                    <td>" . $row["Especialidade"] . "</td>
                                    <td>" . $row["cpf"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhum médico encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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



    
</body>
</html>
