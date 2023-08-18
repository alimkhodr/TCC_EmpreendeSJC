<?php

$mensagem = '';
if (isset($_GET['status'])) {
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

$resultados = '';
foreach ($produtos as $produto) {
  $resultados .= '<tr>
                      <td>' . $produto->id . '</td>
                      <td>' . $produto->img . '</td>
                      <td>' . $produto->nome . '</td>
                      <td>' . $produto->categoria . '</td>
                      <td>' . $produto->preco . '</td>
                      <td>' . date('d/m/Y à\s H:i:s', strtotime($produto->data)) . '</td>
                      <td>
                        <a href="editar.php?id=' . $produto->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id=' . $produto->id . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma produto encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?= $mensagem ?>

  <div class="container">
    <div class="row">

      <div class="row align-items-start col-sm-2">
        <section>
          <a href="cadastrar.php">
            <button class="btn btn-success">Novo produto</button>
          </a>
        </section>
      </div>

      <div class="col">
        <section>
          <form method="grt">

            <div class="row">

              <div class="row align-items-start col-sm-6">
                <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
              </div>

              <div class="col d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>

            </div>

          </form>

        </section>
      </div>
    </div>
  </div>
  <section>

    <table class="table bg-light mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>imagem</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Preço</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?= $resultados ?>
      </tbody>
    </table>

  </section>

</main>