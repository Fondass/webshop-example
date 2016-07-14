<?php

/*
 * Webshop database function that works on an extend of class.database.php
 * 
 * works in conjunction with class.shop_item.php
 * 
 * This class takes all webshop items found in your database ($this->ItemDb)
 * Creates an object out of each webshop item for your itemclass ($this->ItemClass)
 * and returns all webshop items as an array ($items)

 */

class FonWebshopDatabase extends FonDatabase
{
    
    private $Id;
    private $Name;
    private $Price;
    private $Link;
    private $ItemDb;
    private $ItemClass;
    private $Likes;
    
    public function fonGetItems()
    {
        // Table name for your database which contains your webshop artikels/items.
        $this->ItemDb = "items";
        
        // Webshop Artikel/Item id as columname in your database.
        $this->Id = "id";
        
        // Webshop Artikel/Item name as columname in your database.
        $this->Name = "name";
                
        // Webshop Artikel/Item price as columname in your database.
        $this->Price = "price";
        
        // Webshop artikel/item link (to an img) as columname in your database.
        $this->Link = "link";
        
        // Webshop artikel/item class, enter classname that handles the properties of your webshop items.
        $this->ItemClass = 'FonItem';
        
        // Webshop artikel/item class, how many likes an item has.
        $this->Likes = "likes";
        
        
        /* Do not edit code past here */
        
        
        $sql = "SELECT $this->Id, $this->Name, $this->Price, $this->Link, $this->Likes FROM $this->ItemDb";
        $result = $this->db->query($sql);
        
        $items = array();
        
        if ($result->num_rows > 0)
        {
            while ($row=$result->fetch_assoc())
            {
                $items[] = new $this->ItemClass($row[$this->Id], $row[$this->Name], $row[$this->Price], $row[$this->Link], $row[$this->Likes]);
            }
            return $items;
        }
        else
        {
            Debug::writeToLogFile("database of webshop items is producing a fault");
        }
    }
    
    public function fonUpdateLikes()
    {
            
        $likes = ($this->Likes) + 1;
        
        $sql = 'INSERT INTO items (likes) VALUES ("'.$likes.'")';
        
        $this->db->query($sql);  
        
        
        
        
        
        
        //-------------------------------------------------
        
       
        
      
        
        
    }
    
    
}