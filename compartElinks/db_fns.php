<?

function db_connect()
{
   $result = mysql_pconnect("localhost", "nombreUsuario", "contraseña");
   if (!$result)
      return false;
   if (!mysql_select_db("nombreBaseDatos"))
      return false;

   return $result;
}

?>