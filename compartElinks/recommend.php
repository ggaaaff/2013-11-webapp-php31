<?
 require_once("bookmark_fns.php");
 session_start();
 do_html_header("URLs Recomendadas");
 check_valid_user();
 $urls = recommend_urls($_SESSION['valid_user']); // 2013.11.14 Gustaf - Actualizada acceso varible sesión.
 // $urls = recommend_urls($valid_user);
 display_recommended_urls($urls);

 display_user_menu();
 do_html_footer();
?>