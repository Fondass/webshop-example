<?php


// function to build up the webshop page itself. create items here and also build up the
// page by echoing the different webshop items.

// note: less usefull if there are a lot of items for sale.




class FonWebshopPage extends FonPage
{ 
    public function __construct($items, $db, $totalprice, $checkoutbutton, $emptycartbutton)
    {
        // GW : en bewaart deze in zijn eigen class-variabele
        $this->items = $items;
        $this->db = $db;
        $this->totalprice = $totalprice;
        $this->checkoutbutton = $checkoutbutton;
        $this->emptycartbutton = $emptycartbutton;
    }
    
    protected function fonPageContent()
    { 
        echo '<script type="test/javascript" src="ajaxscript.js"></script>
            <div id="shoppagecart">
          <div id="shopcartcontent">';
        
        $this->emptycartbutton->fonEmptyCartButton();
        
        foreach ($this->items as $item)
        {
            $item->fonSaveCartItem();
            echo $item->fonShowCartItem();
        }
        
        echo    '<div id="shopcartbottem">
            <div id="shopcarttotal">
            <p id="shopcarttotaltext">Total: '. $this->totalprice->fonShowTotalPrice().
            '</p>
            </div>
            <div id="shopcartempty"><p id="emptytext">
            <form action="" method="POST">
            <input type="submit" name="emptycart" value="Empty" />
            </form>
            </p></div>
            <div id="shopcartpay"><p id="paytext"><form action="" method="POST">
            <input type="submit" name="checkout" value="Save and pay" />
            </form></p></div>
            </div>
            </div></div>';
        
        echo '<div id="body">';
    
        echo '<div id="webshopwrapper">';
        
        $this->checkoutbutton->fonCheckoutButton();   
        
        foreach ($this->items as $item)
        {
            echo $item->fonShowWebshopItem();   
        } 
        echo '</div></div>';
    }
}




