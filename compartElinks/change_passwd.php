<?
 require_once("bookmark_fns.php");
 session_start();
 do_html_header("Cambiar Contraseña");
 check_valid_user();
 if (!filled_out($_POST))  //2013.11.14 Gustaf - Acceso a variables POST
 // if (!filled_out($HTTP_POST_VARS))
 {
   echo "No has cubierto el formulario completo.
         Prueba de nuevo por favor.";
   display_user_menu();
   do_html_footer();
   exit;
 }
 else
 {
    //2013.11.14 Gustaf - Acceso a variables POST.
    $old_passwd    = $_POST['old_passwd'];
    $new_passwd    = $_POST['new_passwd'];
    $new_passwd2   = $_POST['new_passwd2'];


    if ($new_passwd!=$new_passwd2)
       echo "Contraseña escrita no era la misma.  No cambiado.";
    else if (strlen($new_passwd)>16 || strlen($new_passwd)<6)
       echo "Nueva contraseña debe estar entre 6 y 16 caracteres.  Prueba de nuevo.";
    else
    {
        // attempt update
        // 2013.11.14 Gustaf - Actualizada acceso varible sesión.
        if (change_password($_SESSION['valid_user'], $old_passwd, $new_passwd)) 
        // if (change_password($valid_user, $old_passwd, $new_passwd))
           echo "Contraseña cambiada.";
        else
           echo "La contraseña no ha podido cambiarse.";
    }


 }
   display_user_menu();
   do_html_footer();
?>