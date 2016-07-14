<?php
require_once("class.database.php");
require_once("database.login_user.php");


class FonController 
{
    protected $database;
    
    public function __construct($database, $itemdb, $user)
    {
	// GW : en bewaart deze in zijn eigen class-variabele
        $this->database = $database;
        $this->itemdb = $itemdb;
        $this->user = $user;
    }

    
    /*
     * add a function here that mimcs the fonHandleRequest and the fonGetPage 
     * and aply it to post and get urls made by a ajex call.
     * function(s) should determin if a call is ajax or not, to then call uppon the
     * correct controller. (todo: place and expeand following controller in this
     * script:
     * 
     *  if(isset($_POST['ajaxaction']) && !empty($_POST['ajaxaction'])) {
    $ajaxaction = $_POST['ajaxaction'];
    switch($ajaxaction) {
        case 'test' : test();break;
        case 'blah' : blah();break;
        // ...etc...
    }
}
    */
    
    public function fonRequestCheck()
    {
        if (isset($_POST["page"]) || isset($_GET["page"]))
        {
            $this->fonHandleRequest();
        }
        
        elseif (isset($_POST["ajaxaction"]) || isset($_GET["ajaxaction"]))
        {
            $this->fonHandleAjaxRequest();
        }  
    }
    
    public function fonHandleRequest() 
    {
        $pagevar =  $this->fonGetPage();
        $page = $this->fonPageController(htmlspecialchars($pagevar, ENT_QUOTES, "UTF-8"));
        if ($page)
        {
            $page->fonShowPage();
        }
        else
        {
            echo "Gnomes have stolen the webpage, we apoligise for their natural behavior";
        }
    }
    
    public function fonGetPage () 
    {
        if (isset($_POST["page"])) 
        {
            return $_POST["page"];
        }
        elseif (isset($_GET["page"]))
        {        
            return $_GET["page"];   
        }
        else
        {
            return "home";
        }
    }
    
    public function fonHandleAjaxRequest()
    {
        $ajaxaction = htmlspecialchars($this->fonGetAjaxPage(), ENT_QUOTES, "UTF-8");
        
        switch($ajaxaction)
        {
           case 'test' : $this->test();break;
            
        }      
    }
    
    
    public function fonGetAjaxPage()
    {
        if (isset($_POST["ajaxaction"]))
        {
            return $_POST["ajaxaction"];
        }
        elseif  (isset($_GET["ajaxaction"]))
        {
            return $_GET["ajaxaction"];
        }
    }
    
    
    
    
    
    
    
    public function fonPageController($pagevar) 
    {
        require_once("class.page.php");
        require_once("database.login_user.php");
        
        
        
        $page = null;
        switch ($pagevar) 
        {
            case "about":
                require_once("page.about.php");
                $page = new FonAboutpage();
                break;
            case "contact":
                include_once("page.contact.php");
                $page = new FonContactPage();
                break;
            case "login":
                include_once("page.login.php");
                $page = new FonLoginPage($this->user);
                break;
            case "logout":
                include_once("page.home.php");
                $this->user->fonUserLogout();
                $page = new FonHomepage();
                break;
            case "webshop":
                if ($this->user->fonLoggedUser())
                {
                    include_once("page.webshop.php");
                    include_once("class.webshop_shopitem.php");
                    include_once("class.webshop_checkout.php");
                    include_once("class.webshop_totalprice.php");
                    include_once("class.webshop_empty.php");
                    $totalprice = new FonTotalPrice($this->itemdb->fonGetItems());
                    $checkoutbutton = new FonCheckoutButton($this->database->fonGetDb(), $this->itemdb-> fonGetItems());
                    $emptycartbutton = new FonEmptyCartButton();
                    $page = new FonWebshopPage($this->itemdb->fonGetItems(), $this->database->fonGetDb(), $totalprice, $checkoutbutton, $emptycartbutton);
                    break;
                }
                else
                {
                    include_once("page.login.php");
                    $page = new FonLoginPage($this->user);
                    break;
                }
            case "cart":
                if ($this->user->fonLoggedUser())
                {
                    include_once("page.cart.php");
                    require_once("class.webshop_shopitem.php");
                    $page = new FonCartPage($this->itemdb->fonGetItems());
                    break;
                }
                else
                {
                    include_once("page.login.php");
                    $page = new FonLoginPage($this->user);
                    break;
                }
                
            case "home":
                
            default:
                include_once("page.home.php");
                $page = new FonHomePage();
        }
        return $page;
    }
    
    public function test()
    {
        $itemid = $_POST['item'];
        
       $sql = "SELECT likes FROM items WHERE id = '".$itemid."'";
        
       $result = $this->db->query($sql);
       
       $likes = $result + 1;
       
       $sql = "INSERT INTO items (likes) VALUES ('$likes')";
               
       $this->db_>query($sql);   
    }    
}


