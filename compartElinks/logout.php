<?

// include function files for this application
require_once("bookmark_fns.php");
session_start();

// 2013.11.14 Gustaf - Actualizado uso de sesión
if ( isset( $_SESSION['valid_user'] ) )
{
  $old_user = $_SESSION['valid_user'];  // almacenado para comprobar si ellos estuvieron logged in
  unset( $_SESSION['valid_user'] );
}

// $old_user = $valid_user;  // store  to test if they *were* logged in
// $result_unreg = session_unregister("valid_user");
// --

$result_dest = session_destroy();

// start output html
do_html_header("Logging Out");

if (!empty($old_user))
{
  if ($result_dest) // 2013.11.14 Gustaf - Actualizado uso de sesión
  // if ($result_unreg && $result_dest)
  {
    // if they were logged in and are now logged out
    echo "Logged out.<br>";
    do_html_url("login.php", "Login");
  }
  else
  {
   // they were logged in and could not be logged out
    echo "No hemos podido hacer Log Out.<br>";
  }
}
else
{
  // if they weren't logged in but came to this page somehow
  echo "No te encuentras logged in, así que no hemos podido hacer logged out.<br>";
  do_html_url("login.php", "Login");
}

do_html_footer();

?>