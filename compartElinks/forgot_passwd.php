<?
 require_once("bookmark_fns.php");
 do_html_header("Recuperar Contrase�a");

 if ($password=reset_password($username))
 {
    if (notify_password($username, $password))
      echo "Tu nueva Contrase�a ha sido enviada a tu direcci�n email.";
    else
      echo "Tu contrase�a no ha podiso ser enviada por email."
           ." Prueba pulsando actualizar.";
 }
 else
   echo "Tu contrase�a no ha podido modificarse - Prueba de nuevo m�s tarde por favor.";

  do_html_url("login.php", "Login");

 do_html_footer();
?>