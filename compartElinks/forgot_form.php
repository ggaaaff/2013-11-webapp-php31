<?
 require_once("bookmark_fns.php");
 do_html_header("Nueva Contrase�a");

 display_forgot_form();

 do_html_url("login.php", "Login");

 do_html_footer();
?>