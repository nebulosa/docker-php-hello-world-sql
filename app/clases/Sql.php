<?php
class Sql
{
	var $connection;
	
	function __construct($host,$user,$password,$database)
	{

        $conexxion = mysqli_connect($host, $user, $password) or die ("Could not connect");
        mysqli_set_charset($conexxion, 'utf8');
		mysqli_select_db ($conexxion, $database) or die ("Could not select database");
        
        $this->connection = $conexxion;
	}  
    
	function ClienInfo()
	{return mysqli_get_client_info();}
	
	function Close()
	{ mysqli_close($this->connection);}
	
	function ErrorMessage()
	{return mysqli_error($this->connection);}
	
	function ErrorNumber()
	{return mysqli_errno($this->connection);}
	
	function ExecQuery($query)
	{
		$result = mysqli_query($this->connection, $query);
		if (!$result)
		die('Query failed: ' . mysqli_error($this->connection));
		return $result;
	}
	
	function FetchArray ($resource)
	{ return mysqli_fetch_array ($resource, MYSQLI_ASSOC);}  
	
	function HostInfo()
	{return mysqli_get_host_info($this->connection);}
	
	function LasInsertId()
	{return mysql_insert_id($this->connection);}
	
	function NumerRows($resource)
	{ return mysql_num_rows ($resource);}
	
	function ServerInfo()
	{return mysql_get_server_info($this->connection);}

    function Limpiar($input)
    {return mysqli_real_escape_string($this->connection,$input);}
}