<?php

class FonContactPage extends FonPage
{
    protected function fonPageContent()
    {
        
        echo '<div id="body"><p id="contactpar"><div id="contactform"><div id="contactform2">';

	if (!isset($_REQUEST["name"])) {
	
	
	$this->fonContactForm();
	
	}

	// scherm indien contactformulier wel ingevuld

	else {
	
	$this->fonContactFilled();
	}
	
	echo "</div></p></div></div>";
    }
    
    protected function fonContactForm() 
    {

		echo '<form action="" method="post">
			<div><label for="name">Name:&nbsp&nbsp&nbsp
				<input type="text" name="name" id="name" required /></label>
			</div>
	
			<div><label for="e-mail">E-Mail:&nbsp
				<input type="text" name="e-mail" id="e-mail" required /></label>
			</div>
	
			<div><label for="message">Message:
				<input type="text" name="message" id="message" required /></label>
			</div>
	
			<div><input type="submit" name="contactform" value="Send"/></div>
	
		</form>';
    }
    
    protected function fonContactFilled() 
    {
	
	$bericht = $_REQUEST["message"];
	$email = $_REQUEST["e-mail"];
	$naam = $_REQUEST["name"];
	
	
	echo "Dear " . htmlspecialchars($naam, ENT_QUOTES, "UTF-8") . " your message '" . htmlspecialchars($bericht, ENT_QUOTES, "UTF-8") 
                . "' has been received, you shall receive a reply at " . htmlspecialchars($email, ENT_QUOTES, "UTF-8") . " as soon as posible.";
	
    }
    
    
}

