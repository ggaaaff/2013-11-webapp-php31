<?
 require_once("bookmark_fns.php");
 session_start();
 do_html_header("A�adir Marcadores");
 check_valid_user();

 if (!filled_out($_POST))  //2013.11.14 Gustaf - Acceso a variables POST
 // if (!filled_out($HTTP_POST_VARS))
 {
   echo "No has cubierto el formulario completamente.
         Prueba de nuevo por favor.";
   display_user_menu();
   do_html_footer();
   exit;
 }
 else
 {

    //2013.11.18 Gustaf - Acceso a variables POST.
    if ( isset($_POST['new_url']) ) {
      $new_url = $_POST['new_url'];

      // check URL format
      if (strstr($new_url, "http://")===false)
        $new_url = "http://".$new_url;

      // check URL is valid
      if (@fopen($new_url, "r"))
      {
       // try to add bm
       if (add_bm($new_url))
         echo "Marcador a�adido.";
       else
         echo "No se ha podido a�adir marcador.";
      }
      else
       echo "No es un URL v�lido.";

    }
    else
    {
     echo "No has cubierto el formulario completamente.";
    }

 }

  // get the bookmarks this user has saved
  if ($url_array = get_user_urls($_SESSION['valid_user'])); // 2013.11.14 Gustaf - Actualizada acceso varible sesi�n.
  // if ($url_array = get_user_urls($valid_user));
    display_user_urls($url_array);


   display_user_menu();
   do_html_footer();
?>