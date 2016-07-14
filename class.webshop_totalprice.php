<?php

/*
 * Has to work with at least class.shop_item.php
 * 
*/

class FonTotalPrice
{
    
    public function __construct($items)
    {
        $this->items = $items;
    }
    
    public function fonShowTotalPrice()
    {
        $totalprice = "";
        foreach($this->items as $item)
        {
            if (isset($_SESSION["savedItems"][$item->fonGetItemId()]))
            {
                $totalprice += $_SESSION["savedItems"][$item->fonGetItemId()] * $item->fonGetItemPrice();
            }
        }
        return $totalprice;
    }     
}