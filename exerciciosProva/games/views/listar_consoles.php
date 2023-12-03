<!doctype html>
<html lang="pt-BR">
  <head>
    <title>Consoles</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <br /><br />
    <form action="#" method="POST">
      <label>Escolha um console para buscar os jogos</label>
      <select name="console">
        <?php 
          if (is_array($retorno)) { 
            foreach ($retorno as $dado) {
              echo "<option value='{$dado->idconsole}'>{$dado->descricao}</option>"; 
            }
          } 
        ?>
      </select>
      <br /><br />
      <input type="submit" />
    </form>
  </body>
</html>
