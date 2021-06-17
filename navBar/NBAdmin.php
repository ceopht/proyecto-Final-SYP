<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand"><?php echo $_SESSION['user'];?></a>
    <button class="navbar-toggler">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestión de datos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../GestionUsuario/formulario.php">Gestion de usuarios</a></li>
            <li><a class="dropdown-item" href="../GestiondeClientes/FormularioCliente.php">Gestion de clientes</a></li>
            <li><a class="dropdown-item" href="../GestionvCFinal/gestorCFinal.php">Gestion de consumidor final</a></li>
            <li><a class="dropdown-item" href="../GestionvContribuidor/gestorContribuidor.php">Gestion de contribuidor</a></li>
          </ul>
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
        <li class="nav-item">
          <a class="nav-link" href="../Ventas/ventas.php">Ventas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../BalanceGeneral/balance.php">Balance General</a>
        </li>
      </ul>
        <a href="../login/cerrarSesion.php">
        <div class="btn btn btn-outline-light">Cerrar Sesión</div>
        </a>
    </div>
  </div>
</nav>