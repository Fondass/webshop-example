<?php


class FonUsers extends FonDatabase
{
 
    protected $username;
    protected $password;
    protected $db;
    
          
    public function FonUserCheck() {
        
        // Zet de username en pass als naar invalid als die niet gezet is.
        // anders stopt hij de bewaarde username en password in variabellen
        
        if (isset ($_POST["username"]))
        {
            $username = $_POST["username"];
        }
    
        else
        {
            $username = "invalid";
        }
    
        if (isset ($_POST["password"])) 
        {
            $password = $_POST["password"];
        }
    
        else 
        {
            $password = "invalid";
        }
        
        
        
        $username = mysqli_real_escape_string($this->db, $username);
        
        
        $sql = "SELECT id, password FROM inlog_gegevens WHERE username='".$username."'";         
      //  $sql = "SELECT id, username, password FROM inlog_gegevens";
        $result = $this->db->query($sql);
        
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                if ($password == $row["password"]) 
                {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    return true;
                }
            }
        }
        
        else 
        {
            return false;
        }
    }

    public function fonLoggedUser() 
    {
        return (isset($_SESSION["username"]) && $_SESSION["password"] != "");
    }

    public function fonUserLogout()
    {
        session_destroy();
    }
}