<?php

/* 
 * 
 * 
 * 
 */

class FonCheckoutButton
{
    
    public function __construct($db, $items)
    {
        $this->db = $db;
        $this->items = $items;
    }
    
    public function fonCheckoutButton()
    {
        if (isset($_REQUEST["checkout"]))
        {
            // Order ID, kan gewoon (b)order ID ophalen en plus 1 doen.
            // moet wel opgehaald worden voor de foreach zodat elke order een unieke id krijgt, niet leke order
            // regel.
                    
                    $sql5 = "SELECT COUNT(ID) FROM border";
                    $result2 = $this->db->query($sql5);
                    
                    $array2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
                    
                    $border_id = $array2[0]+1;
            
            foreach($this->items as $item)
            {
                if (isset($_SESSION["savedItems"][$item->fonGetItemId()]))
                { 
                    // Gehele code voor ophalen van active user_id uit database.
                    // opgeslagen in de variabbele $user-id
                    
                    $sql = "SELECT id FROM inlog_gegevens WHERE username = '".$_SESSION['username']."'";
                    $result = $this->db->query($sql);
                    
                    $array = mysqli_fetch_array($result);
                    
                    $user_id = $array[0];
                    
                    // quantity of the artikel in question
                    
                    $quantity = $_SESSION["savedItems"][$item->fonGetItemId()];
                    
                    // Artikel ID ophalen en storen
                    
                    $artikel_id = $item->fonGetItemId();
                                      
                    // alle variables set, ready to put into db. 
                    
                     $sql3 = "INSERT INTO border (ID, User_id, Date) VALUES ('$border_id', '$user_id', now())";
                     
                     $sql4 = "INSERT INTO border_rule (Border_id, Artikel_id, Quantity) VALUES ('$border_id', '$artikel_id', '$quantity')";
                     
                     $this->db->query($sql3);
                     
                     $this->db->query($sql4);

                    /* 
                    
                    -> Debuggers and the date function, uncomment to log the different aspects
                       Of database communication <-
                     
                    Debug::writeToLogFile("artikel ordered ".$artikel_id);
                    Debug::writeToLogFile("ordered by user ".$user_id);
                      
                    $date = date("M j Y");
                    Debug::writeToLogFile("ordered on ".$date);
                    Debug::writeToLogFile("this many ordered ".$quantity);
                    Debug::writeToLogFile("order id = ".$border_id);
                    
                     */
                }
            }
            $_SESSION["savedItems"] = array();
            $_SESSION["savedItems"] = array_diff($_SESSION["savedItems"], array());
            mysqli_close($this->db);
        }   
    }
}