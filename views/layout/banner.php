<h2><?= $_SESSION['userLog']->nombre ?> <?= $_SESSION['userLog']->apellido ?> <?= $_SESSION['userLog']->tipoRol ?></h2>
<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?= baseUrl ?>user/index">Inicio</a>
      <a class="nav-item nav-link" href="<?= baseUrl ?>medicamento/gestion">Registrar Medicamento</a>
      <a class="nav-item nav-link text-danger" href="<?= baseUrl ?>user/logout">Salir</a>
      <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </div>
  </div>
</nav>