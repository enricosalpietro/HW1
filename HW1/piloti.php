<?php
     // Avvia la sessione
     session_start();
    
     if(isset($_COOKIE['user'])){
         $_SESSION['username']=$_COOKIE['user'];
     }
     // Verifica se l'utente è loggato
?>
<html>
    <head>
        <title>piloti</title>   
        <script src="script.js"> </script>
        <script src="script_preferiti.js"> </script>  
        <link rel="stylesheet" href="piloti.css">  
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">        
        <meta charset="utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1">     
    </head>
    <body>
      <div id='access'>
        <?php
            if(empty($_SESSION['username'])){
              echo "<a href='login.php'>Login</a>
                    <a href='signup.php'>Iscriviti</a>";
            }

            if(isset($_SESSION['username'])){
              $user = $_SESSION['username'];
              echo "<a> $user </a>";
              echo "<a href='logout.php'>Logout</a>";
            }
        ?>
      </div>  
        <header>
            <nav>
                <div id="logo">
                  <img src="logo.png">
                </div>
                <div id="links">
                  <a href = 'home.php'>Home</a>
                  <a href = 'piloti.php'>Piloti</a>
                  <a>Lista circuiti</a>
                  <a>About</a>              
                </div>
                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>                
            </nav> 
            <div class="overlay"></div>     
        </header>
        <section id="favorite" class="hidden">
            <h2>Preferiti:</h2>
            <form id="sezPreferiti"> </form>
        </section>
        <section id="main">
            <h1>Scegli i tuoi piloti preferiti</h1>
            <form id = "grid"> </form>
        </section>
        <footer>
            <address>Enrico Salpietro O46002067</address>
            <h2>Seguici</h2>
            <div id='social'>
              <div>
               <img src="instagram.png">
                <p>@Motorsport_italia</p>
              </div>
              <div>
               <img src="facebook.png">
                <p>Motorsport Italia</p>
              </div>
              <div>
               <img src="twitter.png">
                <p>Motorsport Italia</p>
              </div>
            </div>  
        </footer>    
    </body>
     
<html>    