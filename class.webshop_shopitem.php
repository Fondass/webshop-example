<?php


  
class FonItem {
    private $itemname;
    private $itemprice;
    private $itemimg;
    private $id;
     
    // constructor building up webshop items and giving them the means to
    // pressent themselves on the weshop page
    
    public function __construct($id, $name, $price, $img, $likes)
    {   
        $this->itemname = $name;     
        $this->itemprice = $price;
        $this->itemimg = '<img class="resize" src=' . $img . '>';
        $this->id = $id;
        $this->itemlikes = $likes;
    }
    
    // get item id
    
    public function fonGetItemId()
    {
        return $this->id;
    }

    // getting the itemname
    
    public function fonGetItemName()
    {
        return $this->itemname;
    }
    
    // getting artikel prijs

    public function fonGetItemPrice()
    {
        return $this->itemprice;
    }
    
    // getting artikel image
    
    public function fonGetItemImg()
    {
        return $this->itemimg;
    }
    
    public function fonGetItemLikes()
    {
        return $this->itemlikes;
    }
    
    
    
    
    // This is where each webshop item is put in a showable format. Each individual item has to
    // called by adding an echo ($itemnumber)->webshop item, in the webshop.inc.php
    
    public function fonShowWebshopItem()
    {
        // maybe add a session save here
        
        return '<div class="webshopcontent">
            <div class="webshopcontentfoto">
            ' . $this->itemimg . '
            </div>
            <div class="webshopcontentdata">
            ' . $this->itemname . '<br>' . $this->itemprice . '
            <div class="itemlikebutton"><input type="button" onclick="fonJSitemLike('.$this->id.')" value="like"/></div>
            <p>Likes: <span class="likeCount">'. $this->itemlikes .'</span></p>
            </div><form action="" method="post">
            <div><input type="submit" name="addtocart'. $this->id .'" value="Add" /></div>
            <div><input type="number" name="quantity" min="1" max="100" required /></div>
            <input type="hidden" name="ding" value="' . $this->id . '" />
            </form></div>';
    }
    
    
    
    
    
    
    
    public function fonSaveCartItem()
    {
        if (isset($_REQUEST["addtocart".$this->id]))
        {
            if (isset($_SESSION["savedItems"][$this->id]))
            {
                $_SESSION["savedItems"][$this->id] = $_SESSION["savedItems"][$this->id] + $_REQUEST["quantity"];
            }
            else
            {
                $_SESSION["savedItems"][$this->id] = $_REQUEST["quantity"];
            }        
        }
    }
    
    public function fonShowCartItem()
    {
        if (isset($_SESSION["savedItems"][$this->id]))
        {
            return '<div class="cartitemcontent">
            <div class="cartitemimg">
            ' . $this->itemimg . '
            </div>
            <div class="cartitemtext">
            ' . $this->itemname . '<br>' . $this->itemprice . '<br> in cart: <br>'
            . $_SESSION["savedItems"][$this->id] .'
            </div> </div>';
        }              
    }
    
    public function fonShowCartPageItem()
    {
        if (isset($_SESSION["savedItems"][$this->id]))
        {
            return '<div class="webshopcontent">
            <div class="webshopcontentfoto">'.
            $this->itemimg .' </div>
            <div class="webshopcontentdata">'.
            $this->itemname .'<br>'. $this->itemprice .'<br> in cart: <br>'
            .$_SESSION["savedItems"][$this->id].'
            </div>
            <form action="" method="post">
            <div><input type="submit" name="removefromcart'.$this->id .'" value="Remove" /></div>
            </form>
            </div>';
        }
    }
    
    
    
    
    public function fonRemoveCartItem()
    {
        if (isset($_REQUEST["removefromcart".$this->id]))
        {
            if (isset($_SESSION["savedItems"][$this->id]))
            {
                unset($_SESSION["savedItems"][$this->id]);
                //  $_SESSION["savedItems"] = array_diff($_SESSION["savedItems"], array($this->id));
            }
        }   
    }   
}
