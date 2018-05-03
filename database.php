<?php
class Database 
{
	//private static $dbName = 'productos' ; 
	//private static $dbHost = 'mysql23669-pablo.jl.serv.net.mx' ;
	//private static $dbUsername = 'root';
	//private static $dbUserPassword = 'ATCoch59681';
/*
	private static $dbName = 'sampledb' ; 
	private static $dbHost = '10.129.29.12' ;
	private static $dbUsername = 'root';
	private static $dbUserPassword = 'LIHUFfRTDD55mbv5';
*/
	private static $dbName = 'bdd1' ; 
	private static $dbHost = 'svrpg.postgres.database.azure.com' ;
	private static $dbUsername = 'pablolandetalopez@svrpg';
	private static $dbUserPassword = 'Pablolandeta666';
	
	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$cont )
       {      
        try 
        {
	 //OPENSHIFT		
          //self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
	
	//AZURE 25-04-18
	 //   self::$cont =  new PDO("sqlsrv:server = tcp:servidordata.database.windows.net,1433; Database = bdd1", "pablo", "Alison2013");
	//Azure Postgres 03-05-18
	 self::$cont =  new PDO("host=".self::$dbHost." port=5432 dbname=".self::$dbName." user=".self::$dbUsername." password=".self::$dbUserPassword." sslmode=required");
	//self::$cont = new PDO('pgsql:dbname=bdd1;host=svrpg.postgres.database.azure.com;user=pablolandetalopez@svrpg;password=Pablolandeta666');		
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}
	
	public static function disconnect()
	{
		self::$cont = null;
	}
}
?>
