<?php


class FonPage
{
    
    public function fonShowPage()
    {
        $this->fonPageOpen("stylesheet.css", "", "my first costom site");
        $this->fonThreeButtonHeader();
        $this->fonPageContent();
        $this->fonPageClose();
    }
        
    protected function fonPageOpen($stylesheet, $shorticon, $title)
    {
       echo '<!DOCTYPE html>
	<html>
	<head>
	<meta charset=UTF-8 />
	<meta name="generator" content="Notepad++" />
	<link rel="stylesheet" href="' . $stylesheet . '" type="text/css" media="all" />
	<link rel=shortcut icon" href=' . $shorticon . ' />
	<title> ' . $title . ' </title>
	</head>
	<body>'; 
    }
    
    protected function fonThreeButtonHeader()
    {
        echo '<div id="header">
	<a href="index.php?page=home">
	<div class="menubutton", id="button1"><p class="buttontext">Home</p>
	</div> </a>

	<a href="index.php?page=about">
	<div class="menubutton", id="button2"><p class="buttontext">About</p>

	</div> </a>

	<a href="index.php?page=contact">
	<div class="menubutton", id="button3"><p class="buttontext">Contact</p>
	</div> </a>
        
        <a href="index.php?page=webshop">
        <div class="menubutton", id="button4"><p class="buttontext">Webshop</p>
        </div> </a>
        
        <a href="index.php?page=cart">
        <div id="button5"><p class="buttontextcart">Cart</p>
        </div> </a>

        <a href="index.php?page=login">
        <div class="logbutton", id="loginbutton"><p class="buttontext">Login</p>
        </div> </a>
        
        <a href="index.php?page=logout">
        <div class="logbutton", id="logoutbutton"><p class="buttontext">Logout</p>
        </div> </a>
        
	</div>';
    }
    
    protected function fonPageContent()
    {
    }
    
    protected function fonPageClose()
    {
        echo "</body> </html>";
    }
        
}