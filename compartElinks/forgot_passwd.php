<?
require_once("bookmark_fns.php");
do_html_header("Recuperar Contrase�a");


if (!filled_out($_POST))  //2013.11.18 Gustaf - Acceso a variables POST
{
  echo "No has cubierto el formulario completamente.
        Prueba de nuevo por favor.";
}
else
{
  if ($password=reset_password($_POST['username'])) //2013.11.14 Gustaf - Acceso a variables POST actualizado.
  // if ($password=reset_password($username))
  {
   echo "-DEBUG  NUEVA PASSWORD- " . $password . " -DEBUG  NUEVA PASSWORD- <br>";

     if (notify_password($_POST['username'], $password)) // 2013.11.18 Gustaf - Actualizaci�n
     // if (notify_password($username, $password))
       echo "Tu nueva Contrase�a ha sido enviada a tu direcci�n email.";
     else
       echo "Tu contrase�a no ha podido ser enviada por email."
            ." Prueba pulsando actualizar o comunicate con nosotros.";
  }
  else
    echo "Tu contrase�a no ha podido modificarse - Prueba de nuevo m�s tarde por favor.";

}

do_html_url("login.php", "Login");
do_html_footer();
?>