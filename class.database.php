<?php



class FonDatabase
{
    protected $db;
    
    public function __construct()
    {
        $host = "localhost";
        $user = "sybren";
        $passwd = "103225";
        $dbname = "webshop_schema";
        
        $this->db=mysqli_connect($host, $user, $passwd, $dbname) or die ("connection failed");
    }
    
    public function fonGetDb()
    {
                
        return $this->db;
    }
}
