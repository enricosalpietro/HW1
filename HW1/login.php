<?php
     // Avvia la sessione
     session_start();
     // Verifica l'accesso
     if(isset($_COOKIE["user"]))
     {
         $_SESSION["username"] = $_COOKIE["user"];
         // Vai alla home
         header("Location: home.php");
         exit;
     }
    // Verifica l'esistenza di dati POST
     if(isset($_POST["username"]) && isset($_POST["password"]))
     {
         // Connetti al database
         $conn = mysqli_connect("127.0.0.1", "root", "", "DB");
         // SQL injection
         $user= mysqli_real_escape_string($conn, $_POST['username']);
         $pass= mysqli_real_escape_string($conn, $_POST['password'] );
         //query SQL
         $query = "SELECT * FROM utenti WHERE username = '".$user."' AND password = '".$pass."'";
         $res = mysqli_query($conn, $query);
         // Verifica la correttezza delle credenziali
         if(mysqli_num_rows($res) > 0)
         {
             $check=$_POST['ricorda'];
             $user=$_POST['username'];
             if(isset($check)){
                 //se richiesto, setta cookie
                 setcookie("user",$user,strtotime("+1 week"));        
             }
             // Imposta la variabile di sessione
             $_SESSION["username"] = $_POST["username"];
             // Vai alla pagina home.php
             header("Location: home.php");
             exit;
         }
         else
         {
             // Flag di errore
             $errore = true;
         }
     }
?>
<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <title>Motorsport-Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">     
        
    </head>
    <body>
        <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                header("Location: login.php");
                
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
                <h1>Login</h1>
            </div>
            <div id='form'>
            <form name='nome_form' id='form' method='post'>
                <p>
                    <span>Username</span>
                        <label><input type='text' name='username'></label>
                </p>
                <p>
                    <span>Password</span>
                        <label><input type='password' name='password'></label>
                </p>
                <p>Memorizza dati accesso<input type='checkbox' name='ricorda' value='yes'></p>
                <p>
                    <label>&nbsp;<input type='submit' class='btn' value='Entra'></label>
                </p>
            </form>
            </div>
            <div id="signup">
                <a href="signup.php">Non sei registrato?</a>
            </div> 
        </main>
        
    </body>
</html>