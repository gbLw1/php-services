<!doctype html>
<html lang="pt-BR">
  <head>
    <title>Remédios</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <br /><br />
    <form action="#" method="POST">
      <label>Escolha um remédio para encontrar farmácias que o possui:</label>
      <select name="remedio">
        <?php 
          if (is_array($retorno)) { 
            foreach ($retorno as $dado) {
              echo "<option value='{$dado->idremedio}'>{$dado->nome}</option>"; 
            }
          } 
        ?>
      </select>
      <br /><br />
      <input type="submit" />
    </form>
  </body>
</html>
