<?php

class FonCartPage extends FonPage
{
    
    protected $items;
    
    public function __construct($items)
    {
	// GW : en bewaart deze in zijn eigen class-variabele
	$this->items = $items;
    }
    
    protected function fonPageContent()
    {
        echo '<div id="body">
        <div id="webshopwrapper">';
        
        foreach ($this->items as $item)
        {
            $item->fonRemoveCartItem();
            echo $item->fonShowCartPageItem();
        }

        echo    "</div>
                </div>";
    }
}

