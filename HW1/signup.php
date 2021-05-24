<?php

?>

<html>
    <head>
        <link rel='stylesheet' href='signup.css'>
        <script src="signup.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">        
        <title>Motorsport-Signup</title>
    </head>
    <body>
        <?php
            //verifica la presenza di errori
            if(isset($errore)){
                echo "<p class='errore'>";
                echo "credenziali non valide";
                echo "</p>";
            }
        ?>
        <div id='overlay'></div>
        <main>
            <div id='back'>  
                <a href='home.php'>                       
                    <img src='close.png'>
                </a>                    
            </div>
            <div id='header'> 
                <img src='logo.png'>
                <h1>Iscriviti</h1>
            </div>
            <div id='divform'>        
            <form name='nome_form' id='form' method='post' action='upload.php' enctype="multipart/form-data">
			
			
			    <p>
                    <input type='text' name='name' placeholder="nome">
                </p>
				<p>
                    <input type='text' name='surname' placeholder="cognome">
                </p>
				<p>
				<input type='email' name='email' placeholder="email@domain.ext">                    
                </p>
                <p>
                    <input type='text' name='username' placeholder="username">
                </p>
                <p>
                    <input type='password' name='password' placeholder="password">
                </p>
				<p>
                    <input type='password' name='passwordDue' placeholder="conferma password">
                </p>
                <p>
                    <input name='try'  type='submit' class='button' value='Registrati!'>
				</p>
				<div id="loginHidden" class='hidden'><a href="login.php">Sei già registrato?</a></div>

			</form>
            </div>    
            <div id='login'>
                <a href='login.php'>Sei già membro?</a>
            </div> 
        </main>
    </body>

</html>