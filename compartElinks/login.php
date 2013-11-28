<?
require_once("bookmark_fns.php");

// 2013.11.18 Gustaf - Actualización lógica para login.
session_start(); 
if ( isset($_SESSION['valid_user']) )
{
  header("Location: member.php");
  exit;
}
else 
{
  // No hay sesión activa, se muestra formulario login.
  do_html_header("");

  display_site_info(); 
  display_login_form();

  do_html_footer();	
}


?>
