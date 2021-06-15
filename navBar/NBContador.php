<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" ><?php echo $_SESSION['user'];?></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../BalanceGeneral/balance.php">Balance General</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libros IVA
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../Libros_IVAS/consumidor_final.php">Consumidor Final</a></li>
            <li><a class="dropdown-item" href="../Libros_IVAS/contribuidor.php">Contribuidor</a></li>
          </ul>
        </li> 
      </ul>
      <a href="../login/cerrarSesion.php">
        <div class="btn btn btn-outline-light">Cerrar Sesión</div>
    </a>
    </div>
  </div>
</nav>