<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos por console</title>
</head>
<body>
    <h1>Lista de jogos para determinada plataforma (console)</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Plataforma</th>
            <th>Jogo</th>
        </tr>

        <?php
          if (is_array($retorno)) {
              foreach ($retorno as $dado) {
                  echo "<tr>";
                  echo "<td>" . $dado->idgame . "</td>";
                  echo "<td>" . $dado->plataforma . "</td>";
                  echo "<td>" . $dado->jogo . "</td>";
                  echo "</tr>";
              }
          }
        ?>
    </table>
</body>
</html>
