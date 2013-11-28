<?

function db_connect()
{
   $result = mysql_pconnect("localhost", "root") or die('Not connected : ' . mysql_error()); //2013.11.14 Gustaf - Configurado
   if (!$result)
      return false;
  
   if (!mysql_select_db("bookmarks")) //2013.11.14 Gustaf - Configurado
      return false;

   return $result;
}

?>