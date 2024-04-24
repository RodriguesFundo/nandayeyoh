<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Leitos</title>
    <link rel="stylesheet" href="../css/leitos.css">
</head>
<body>
    <div class="container">
        <h2>Gestão de Leitos</h2>

        <!-- Adicionar Leito -->
        <div class="card">
            <h3>Adicionar Leito</h3>
            <form method="post" action="">
                <label for="id_leito">ID do Leito:</label>
                <input type="text" id="id_leito" name="id_leito" required>
                
                <label for="tipo_leito">Tipo de Leito:</label>
                <select id="tipo_leito" name="tipo_leito">
                    <option value="UTI">UTI</option>
                    <option value="Comum">Comum</option>
                    <option value="Isolamento">Isolamento</option>
                </select>
                
                <label for="estado">Estado do Leito:</label>
                <select id="estado" name="estado">
                    <option value="Disponível">Disponível</option>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Manutenção">Manutenção</option>
                </select>
                
                <label for="id_hospital">ID do Hospital:</label>
                <input type="text" id="id_hospital" name="id_hospital" required>
                
                <button type="submit" name="adicionar_leito">Adicionar Leito</button>
            </form>
            <?php
            // Verificar se o formulário de adicionar leito foi enviado
            if (isset($_POST['adicionar_leito'])) {
                // Incluir arquivo de conexão com o banco de dados
                include '../php/conexao.php';

                // Receber dados do formulário
                $id_leito = $_POST['id_leito'];
                $tipo_leito = $_POST['tipo_leito'];
                $estado = $_POST['estado'];
                $id_hospital = $_POST['id_hospital'];

                // Inserir dados na tabela Leitos
                $sql = "INSERT INTO Leitos (id_leito, tipo_leito, estado, id_Hospital) VALUES ('$id_leito', '$tipo_leito', '$estado', '$id_hospital')";
                if ($conexao->query($sql) === TRUE) {
                    echo "<script>alert('Leito adicionado com sucesso.');</script>";
                    // Limpar os campos do formulário após adicionar leito
                    echo "<script>document.getElementById('id_leito').value = '';</script>";
                    echo "<script>document.getElementById('tipo_leito').selectedIndex = 0;</script>";
                    echo "<script>document.getElementById('estado').selectedIndex = 0;</script>";
                    echo "<script>document.getElementById('id_hospital').value = '';</script>";
                    // Redirecionar para a mesma página após adicionar leito
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao adicionar leito: " . $conexao->error;
                }
            }
            ?>
        </div>

        <!-- Visualizar Leitos -->
        <div class="card">
            <h3>Visualizar Leitos</h3>
            <?php
            // Incluir arquivo de conexão com o banco de dados
            include '../php/conexao.php';

            // Consulta SQL para recuperar os leitos
            $sql = "SELECT * FROM Leitos";
            $resultado = $conexao->query($sql);

            // Verificar se há resultados
            if ($resultado->num_rows > 0) {
                // Exibir os leitos em uma tabela
                echo "<table>
                        <thead>
                            <tr>
                                <th>ID do Leito</th>
                                <th>Tipo de Leito</th>
                                <th>Estado do Leito</th>
                                <th>ID do Hospital</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id_leito"] . "</td>
                            <td>" . $row["tipo_leito"] . "</td>
                            <td>" . $row["estado"] . "</td>
                            <td>" . $row["id_Hospital"] . "</td>
                            <td>
                                <a href=\"#\">Editar</a> |
                                <a href=\"#\">Excluir</a>
                            </td>
                        </tr>";
                }
                echo "</tbody>
                    </table>";
            } else {
                echo "Nenhum leito encontrado.";
            }
            ?>
        </div>

        <!-- Excluir Leito -->
        <div class="card">
            <h3>Excluir Leito</h3>
            <form method="post" action="">
                <label for="id_leito_excluir">ID do Leito:</label>
                <input type="text" id="id_leito_excluir" name="id_leito_excluir" required>
                
                <button type="submit" name="excluir_leito">Excluir Leito</button>
            </form>
            <?php
            // Verificar se o formulário de excluir leito foi enviado
            if (isset($_POST['excluir_leito'])) {
                // Incluir arquivo de conexão com o banco de dados
                include '../php/conexao.php';

                // Receber ID do leito a ser excluído
                $id_leito_excluir = $_POST['id_leito_excluir'];

                // Excluir leito com o ID especificado
                $sql = "DELETE FROM Leitos WHERE id_leito='$id_leito_excluir'";
                if ($conexao->query($sql) === TRUE) {
                    echo "<script>alert('Leito excluído com sucesso.');</script>";
                    // Redirecionar para a mesma página após excluir leito
                    echo "<script>window.location = window.location.href;</script>";
                    exit();
                } else {
                    echo "Erro ao excluir leito: " . $conexao->error;
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
