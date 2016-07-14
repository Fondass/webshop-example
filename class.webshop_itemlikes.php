<?php

/* 
 * 
 *     // opgeslagen in de variabbele $user-id
                    
                    $sql = "SELECT id FROM inlog_gegevens WHERE username = '".$_SESSION['username']."'";
                    $result = $this->db->query($sql);
                    
                    $array = mysqli_fetch_array($result);
                    
                    $user_id = $array[0];
                    
                    // quantity of the artikel in question
                    
                    $quantity = $_SESSION["savedItems"][$item->fonGetItemId()];
                    
 * 
 * $likes = $_GET["likes"];
 */

class FonItemLikes
{
    
   
    public function __construct($db, $items)
    {
        $this->db = $db;
        $this->items = $items;
        $this->likes = $_GET["likes"];
    }
    
    
    function fonSaveLikes()
    {
        
        $likes = mysql_real_escape_string($this->likes);
        
        $sql = 'INSERT INTO items (likes) VALUES ("'.$likes.'")';
        
        $this->db->query($sql);  
        
        $sql2 = 'SELECT likes FROM items WHERE id ="' . $this->itemid .'"';
        $result = $this->db->query($sql);
        
        $array = mysqli_fetch_array($result);
        
        $likes = $array[0];
        
        return $likes;
    }
    
     
     
        
    
    
    function fonShowLikes()
    {
        $sql = 'SELECT likes FROM items WHERE id ="' . $this->itemid .'"';
        $result = $this->db->query($sql);
        
        $array = mysqli_fetch_array($result);
        
        $likes = $array[0];
        
        return $likes;
    }
    
}

