<?

function db_connect()
{
   $result = mysql_pconnect("localhost", "nombreUsuario", "contraseņa");
   if (!$result)
      return false;
   if (!mysql_select_db("nombreBaseDatos"))
      return false;

   return $result;
}

?>