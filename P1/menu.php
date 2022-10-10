<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand"><strong>Eletiva PHP</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Cadastrar</a>
        </li>
      </ul>
      <?php
        if (isset($_SESSION["login"])) {
      ?>
        <div class="col-md-6" style="text-align:right;">
          <a class="btn btn-secondary" href="index.php?logout=0">Sair</a>
        </div>
      <?php
        }
      ?>
    </div>
  </div>
</nav>
<main>