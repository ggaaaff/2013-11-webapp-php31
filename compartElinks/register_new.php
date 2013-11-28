<?
   // include function files for this application
   require_once("bookmark_fns.php");


   // start session which may be needed later
   // start it now because it must go before headers
   session_start();


   // check forms filled in
   if (!filled_out($_POST)) //2013.11.11 Gustaf - Acceso a variables POST
   // if (!filled_out($HTTP_POST_VARS)) 
   {
      do_html_header("Problema:");
      echo "No has cubierto el formulario correctametne - Por favor vuelve"
           ." e int�ntalo de nuevo.";
      do_html_footer();
      exit;
   }


   //2013.11.14 Gustaf - Acceso a variables POST.
   $email     = $_POST['email'];
   $username  = $_POST['username'];
   $passwd    = $_POST['passwd'];
   $passwd2   = $_POST['passwd2'];


   // email address not valid
   if (!valid_email($email))
   {
      do_html_header("Problema:");
      echo "No es una direcci�n email v�lida.  Por favor vuelve "
           ." e int�ntalo de nuevo.";
      do_html_footer();
      exit;
   }

   // passwords not the same
   if ($passwd != $passwd2)
   {
      do_html_heading("Problema:");
      echo "La contrase�a que has entrado no concuerda - por favor vuelve"
           ." e int�ntalo de nuevo.";
      do_html_footer();
      exit;
   }

   // check password length is ok
   // ok if username truncates, but passwords will get
   // munged if they are too long.
   if (strlen($passwd)<6 || strlen($passwd) >16)
   {
      do_html_header("Problema:");
      echo "Tu contrase�a debe tener entre 6 y 16 caracteres."
           ."Por favor vuelve e int�ntalo de nuevo.";
      do_html_footer();
      exit;
   }
   // attempt to register
   $reg_result = register($username, $email, $passwd);
   if ($reg_result == "true")
   {
     // register session variable
     // 2013.11.14 Gustaf - Actualizado registro varible sesi�n.
     $_SESSION['valid_user'] = $username;

     // $valid_user = $username;
     // session_register("valid_user");
     // --

     // provide link to members page
     do_html_header("Registro correcto");
     echo "Tu registro se ha hecho correctamente.  �Vete a la p�gina de miembros"
          ."para empezar a configurar tus marcadores!";
     do_HTML_URL("member.php", "Ir a la p�gina de miembros");
   }
   else
   {
     // otherwise provide link back, tell them to try again
     do_html_header("Problema:");
     echo $reg_result;
     do_html_footer();
     exit;
   }

   // end page
   do_html_footer();

?>