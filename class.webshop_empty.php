<?php

/* 
 * 
 * 
 * 
 */

class FonEmptyCartButton
{
    public function fonEmptyCartButton()
    {
        if (isset($_REQUEST["emptycart"]))
        {
           $_SESSION["savedItems"] = array();
           $_SESSION["savedItems"] = array_diff($_SESSION["savedItems"], array());
        }
    }
}