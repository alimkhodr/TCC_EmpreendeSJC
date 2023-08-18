<main>

  <section>
    <a href="perfil.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?= TITLE ?></h2>

  <form method="post">

      <div class="field image">
      <label>imagem</label>
      <br>
        <input type="file" name="img" required>
      </div>

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $obproduto->nome ?>">
    </div>

    <div class="form-group">
      <label>Categoria</label>
      <input type="text" class="form-control" name="categoria" value="<?= $obproduto->categoria ?>">
    </div>

    <div class="form-group">
      <label>Preço</label>
      <input type="text" class="form-control" name="preco" value="<?= $obproduto->preco ?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>