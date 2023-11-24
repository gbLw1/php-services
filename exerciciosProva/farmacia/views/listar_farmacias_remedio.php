<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácias por remédio</title>
</head>
<body>
    <h1>Lista de farmácias para determinado remédio</h1>
    <table border="1">
        <tr>
            <th>Remédio</th>
            <th>Farmácia</th>
            <th>Telefone</th>
            <th>Latitude</th>
            <th>Longitude</th>
        </tr>

        <?php
          if (is_array($retorno)) {
              foreach ($retorno as $dado) {
                  echo "<tr>";
                  echo "<td>" . $dado->remedio . "</td>";
                  echo "<td>" . $dado->nome . "</td>";
                  echo "<td>" . $dado->telefone . "</td>";
                  echo "<td>" . $dado->latitude . "</td>";
                  echo "<td>" . $dado->longitude . "</td>";
                  echo "</tr>";
              }
          }
        ?>
    </table>
</body>
</html>
