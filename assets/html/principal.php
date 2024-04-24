<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
      }

      .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
      }

      h1 {
        margin-bottom: 30px;
        color: #333;
      }

      .card {
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        text-align: left;
        transition: transform 0.3s;
      }

      .card:hover {
        transform: translateY(-5px);
      }

      .card h2 {
        margin-top: 0;
        color: #007bff;
      }

      .card p {
        margin-bottom: 20px;
        color: #666;
      }

      .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s;
      }

      .btn:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Bem-vindo ao sistema</h1>

      <div class="card">
        <h2>Gestão de Pacientes</h2>
        <p>
          Adicionar pacientes, visualizar pacientes, editar e excluir
          informações de pacientes.
        </p>
        <a href="./gpacientes.html" class="btn">Ir para Gestão de Pacientes</a>
      </div>

      <div class="card">
        <h2>Gestão de Leitos</h2>
        <p>
          Visualizar o status dos leitos, registrar a admissões e altas, e
          registrar operações de higienização.
        </p>
        <a href="./gleitos.html" class="btn">Ir para Gestão de Leitos</a>
      </div>

      <div class="card">
        <h2>Gestão de Médicos e Enfermeiros</h2>
        <p>
          Adicionar medicos e enfermeiros, visualizar, editar e excluir
          informações de médicos e enfermeiros.
        </p>
        <a href="./genferemedicos.html" class="btn"
          >Ir para Gestão de Médicos e Enfermeiros</a
        >
      </div>

      <div class="card">
        <h2>Relatórios</h2>
        <p>
          Visualizar relatórios sobre pacientes, leitos e outras informações
          relevantes.
        </p>
        <a href="./relatorios.html" class="btn">Ir para Relatórios</a>
      </div>
    </div>
  </body>
</html>
