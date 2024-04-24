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
                <select id="id_hospital" name="id_hospital">
                    <?php
                    // Incluir arquivo de conexão com o banco de dados
                    include '../php/conexao.php';

                    // Consulta SQL para recuperar os IDs dos hospitais
                    $sql_hospital = "SELECT id_hospital FROM Hospital";
                    $resultado_hospital = $conexao->query($sql_hospital);

                    // Verificar se há resultados
                    if ($resultado_hospital->num_rows > 0) {
                        // Exibir os IDs dos hospitais como opções no campo de seleção
                        while ($row_hospital = $resultado_hospital->fetch_assoc()) {
                            echo "<option value='" . $row_hospital["id_hospital"] . "'>" . $row_hospital["id_hospital"] . "</option>";
                        }
                    }
                    ?>
                </select>
                
                <button type="submit">Adicionar Leito</button>
            </form>
        </div>

        <!-- Visualizar Leitos -->
        <div class="card">
            <h3>Visualizar Leitos</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID do Leito</th>
                        <th>Tipo de Leito</th>
                        <th>Estado do Leito</th>
                        <th>Nome do Hospital</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para recuperar os leitos com o nome do hospital
                    $sql_leitos = "SELECT Leitos.id_leito, Leitos.tipo_leito, Leitos.estado, Hospital.nome AS hospital_nome FROM Leitos INNER JOIN Hospital ON Leitos.id_hospital = Hospital.id_hospital";
                    $resultado_leitos = $conexao->query($sql_leitos);

                    // Verificar se há resultados
                    if ($resultado_leitos->num_rows > 0) {
                        // Exibir os leitos em uma tabela
                        while ($row_leitos = $resultado_leitos->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row_leitos["id_leito"] . "</td>
                                    <td>" . $row_leitos["tipo_leito"] . "</td>
                                    <td>" . $row_leitos["estado"] . "</td>
                                    <td>" . $row_leitos["hospital_nome"] . "</td>
                                    <td>
                                        <a href=\"#\">Editar</a> |
                                        <a href=\"#\">Excluir</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum leito encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Excluir Leito -->
        <div class="card" style="border: solid green 2x">
            <h3>Excluir Leito</h3>
            <form method="post" action="">
                <label for="numero">Número do Leito:</label>
                <input type="text" id="numero" name="numero" required>
                
                <button type="submit">Excluir Leito</button>
            </form>
        </div>
    </div>
</body>
</html>
