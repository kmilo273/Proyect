<?php
require_once 'models/user.php';

class UserController
{
  public function index()
  {
    require_once 'views/index.php';
  }

  public function login()
  {
    require_once 'views/login.php';
  }

  public function logear()
  {
    if (isset($_POST) && $_POST['correo'] && $_POST['contraseña']) {
      $correo = $_POST['correo'];
      $contraseña = $_POST['contraseña'];
      $u = new User();
      $u->setCorreo($correo);
      $userFind = $u->findId();
      if ($userFind) {
        if ($userFind->PASSWORD == $contraseña) {
          $_SESSION['userLog'] = $userFind;
          header('Location: ' . baseUrl . 'user/index');
        } else {
          $_SESSION['login'] = 'ContraPaila';
          header('Location: ' . baseUrl);
        }
      } else {
        $_SESSION['login'] = 'NoExiste';
        header('Location: ' . baseUrl);
      }
    } else {
      $_SESSION['login'] = 'vacios';
      header('Location: ' . baseUrl);
    }
  }

  public function registrarme(){
    require_once 'views/registrarme.php';
  }

  public function registrar(){
    if (isset($_POST) && $_POST['nombre']  && $_POST['apellido'] && $_POST['correo'] && $_POST['contraseña']) {
      // Guardar los datos en variables
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $correo = $_POST['correo'];
      $contraseña = $_POST['contraseña'];
      // Instanciar un Objecto User
      $u = new User();
      // Guardar los datos en el Objeto User
      $u->setNombre($nombre);
      $u->setApellido($apellido);
      $u->setCorreo($correo);
      $u->setContraseña($contraseña);
      // Ejecutar el metodo para registrar
      $r = $u->save();
      if ($r) {
        $_SESSION['registrado'] = true;
        header('Location: ' . baseUrl);
      }
    } else {
      header('Location: ' . baseUrl . 'user/registrarme');
    }
  }

  public function logout()
  {
    if (isset($_SESSION['userLog'])) {
      $_SESSION['userLog'] = null;
      unset($_SESSION['userLog']);
    }
    header('Location: ' . baseUrl);
  }
}
