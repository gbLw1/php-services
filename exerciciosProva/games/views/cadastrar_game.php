<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nova game</title>
  </head>
  <body>
    <h1>Cadastrar Game</h1>
    <form method="POST" action="#">
      <label for="nome">Nome</label>
      <input type="text" id="nome" name="nome" />
      <br/><br/>

      <label for="console">Console</label>
      <select name="console" id="console">
        <?php 
          if (is_array($retorno)) { 
            foreach ($retorno as $dado) {
              echo "<option value='{$dado->idconsole}'>{$dado->descricao}</option>"; 
            }
          } 
        ?>
      </select>

      <br/><br/>

      <button type="submit">Cadastrar</button>
    </form>
  </body>
</html>
