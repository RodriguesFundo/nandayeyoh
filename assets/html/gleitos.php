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
            <form>
                <label for="numero">Número do Leito:</label>
                <input type="text" id="numero" name="numero" required>
                
                <label for="tipo">Tipo de Leito:</label>
                <select id="tipo" name="tipo">
                    <option value="UTI">UTI</option>
                    <option value="Comum">Comum</option>
                    <option value="Isolamento">Isolamento</option>
                </select>
                
                <label for="status">Status do Leito:</label>
                <select id="status" name="status">
                    <option value="Disponível">Disponível</option>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Manutenção">Manutenção</option>
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
                        <th>Número do Leito</th>
                        <th>Tipo de Leito</th>
                        <th>Status do Leito</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>UTI</td>
                        <td>Disponível</td>
                        <td>
                            <a href="#">Editar</a> |
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
            </table>
        </div>

        <!-- Excluir Leito -->
        <div class="card">
            <h3>Excluir Leito</h3>
            <form>
                <label for="numero">Número do Leito:</label>
                <input type="text" id="numero" name="numero" required>
                
                <button type="submit">Excluir Leito</button>
            </form>
        </div>
    </div>
</body>
</html>
