<?
 require_once("bookmark_fns.php");
 session_start();
 do_html_header("Cambiar Contraseņa");
 check_valid_user();
 if (!filled_out($HTTP_POST_VARS))
 {
   echo "No has cubierto el formulario completo.
         Prueba de nuevo por favor.";
   display_user_menu();
   do_html_footer();
   exit;
 }
 else
 {
    if ($new_passwd!=$new_passwd2)
       echo "Contraseņa escrita no era la misma.  No cambiado.";
    else if (strlen($new_passwd)>16 || strlen($new_passwd)<6)
       echo "Nueva contraseņa debe estar entre 6 y 16 caracteres.  Prueba de nuevo.";
    else
    {
        // attempt update
        if (change_password($valid_user, $old_passwd, $new_passwd))
           echo "Contraseņa cambiada.";
        else
           echo "La contraseņa no ha podido cambiarse.";
    }


 }
   display_user_menu();
   do_html_footer();
?>