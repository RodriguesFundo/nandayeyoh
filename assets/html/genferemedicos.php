<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Enfermeiros e Médicos</title>
   <link rel="stylesheet" href="../css/enfermedicos.css">
</head>
<body>
    <div class="container">
        <h2>Gestão de Enfermeiros e Médicos</h2>

        <!-- Adicionar Enfermeiro -->
        <div class="card">
            <h3>Adicionar Enfermeiro</h3>
            <form>
                <label for="nome_enfermeiro">Nome do Enfermeiro:</label>
                <input type="text" id="nome_enfermeiro" name="nome_enfermeiro" required>
                
                <label for="cpf_enfermeiro">BI do Enfermeiro:</label>
                <input type="text" id="cpf_enfermeiro" name="cpf_enfermeiro" required>
                
                <button type="submit">Adicionar Enfermeiro</button>
            </form>
        </div>

        <!-- Visualizar Enfermeiros -->
        <div class="card">
            <h3>Visualizar Enfermeiros</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>BI</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maria Silva</td>
                        <td>123.456.789-01</td>
                        <td>
                            <a href="#">Editar</a> |
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
            </table>
        </div>

        <!-- Excluir Enfermeiro -->
        <div class="card">
            <h3>Excluir Enfermeiro</h3>
            <form>
                <label for="cpf_excluir_enfermeiro">BI do Enfermeiro:</label>
                <input type="text" id="cpf_excluir_enfermeiro" name="cpf_excluir_enfermeiro" required>
                
                <button type="submit">Excluir Enfermeiro</button>
            </form>
        </div>

        <!-- Adicionar Médico -->
        <div class="card">
            <h3>Adicionar Médico</h3>
            <form>
                <label for="nome_medico">Nome do Médico:</label>
                <input type="text" id="nome_medico" name="nome_medico" required>
                
                <label for="especialidade_medico">Especialidade:</label>
                <input type="text" id="especialidade_medico" name="especialidade_medico" required>
                
                <label for="crm_medico">CRM do Médico:</label>
                <input type="text" id="crm_medico" name="crm_medico" required>
                
                <button type="submit">Adicionar Médico</button>
            </form>
        </div>

        <!-- Visualizar Médicos -->
        <div class="card">
            <h3>Visualizar Médicos</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Especialidade</th>
                        <th>CRM</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. João Silva</td>
                        <td>Cardiologista</td>
                        <td>12345</td>
                        <td>
                            <a href="#">Editar</a> |
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                    <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
            </table>
        </div>

        <!-- Excluir Médico -->
        <div class="card">
            <h3>Excluir Médico</h3>
            <form>
                <label for="crm_excluir_medico">CRM do Médico:</label>
                <input type="text" id="crm_excluir_medico" name="crm_excluir_medico" required>
                
                <button type="submit">Excluir Médico</button>
            </form>
        </div>
    </div>
</body>
</html>
