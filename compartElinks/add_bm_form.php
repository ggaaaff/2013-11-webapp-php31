<?
// include function files for this application
require_once("bookmark_fns.php");
session_start();

// start output html
do_html_header("A�adir Marcador");

check_valid_user();
display_add_bm_form();

display_user_menu();
do_html_footer();

?>