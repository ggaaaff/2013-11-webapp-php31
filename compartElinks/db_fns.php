<?

function db_connect()
{
   $result = mysql_pconnect("localhost", "nombreUsuario", "contrase�a");
   if (!$result)
      return false;
   if (!mysql_select_db("nombreBaseDatos"))
      return false;

   return $result;
}

?>