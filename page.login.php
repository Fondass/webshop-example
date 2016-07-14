<?php

class FonLoginPage extends FonPage
{
    public function __construct($user)
    {
        $this->user = $user;
    }
    
    protected function fonPageContent() 
    {
        require_once("database.login_user.php");
        
        if ($_SERVER["REQUEST_METHOD"] === "GET" && $this->user->fonLoggedUser() === true) 
        {
            echo '<div id="body"><p id="contactpar"><div id="contactform"><div id="contactform2">
                Welcome back, we missed you.
                </div></p></div></div>';
        }
    
	elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $this->user->fonUserCheck() === true) 
        {
            echo '<div id="body"><p id="contactpar"><div id="contactform"><div id="contactform2">
		Welcome back, we missed you.
		</div></p></div></div>';
	}
        
        elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $this->user->fonUserCheck() !== true) 
        {
            echo '<div id="body"><p id="contactpar"><div id="contactform"><div id="contactform2">
		Unknown user, please register to make full use of the site.
		</div></p></div></div>';
        }

     
	else 
        {
            echo '<div id="body"><p id="contactpar"><div id="contactform"><div id="contactform2">
	
			<form action="" method="post">
                                   
                                <input type="hidden" name="formcheck" value="login">
				<div><label for="username">Username:
					<input type="text" name="username" id="username" required /></label>
				</div>
	
				<div><label for="password">Password:
					<input type="password" name="password" id="password" required /></label>
				</div>
	
				<div><input type="submit" value="Login"/></div>
	
			</form>
			</div></p></div></div>';		
	}
    }
}

