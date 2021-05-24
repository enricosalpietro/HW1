<?php
    session_start();

    if(isset($_COOKIE['user'])){
        $_SESSION['username']=$_COOKIE['user'];
    }
    
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Motorsport-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">    
    <script src="home.js" defer="true"> </script>
    
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
          <a href ='home.php'>Home</a>
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
      
      <h1>
        <em>Archivio campionati automobilistici</em>
<br/> 
        <strong>Motorsport</strong><br/>
        
      </h1>
      <div class="overlay"></div> 
    </header>  
    <section>
      <div id="main">
        <h1>Risultati, circuiti, team e piloti del mondo automobilistico</h1>
        <p>Puoi trovare tutti i risultati, le informazioni e le statistiche delle diverse edizioni di un campionato
        </p>
      </div>  
      <div id="details">
        <div class="photo">
          <img src="campionati.png">
          <h2>Archivio Campionati</h2>
        </div>  
        <div class="photo">
        <img src="piloti.png">
          <h2>Archivio Piloti</h2>        
        </div>
       </div>       
      </div>
    </section>
    
    <div id="info">
    
    <div id="news">
            <h2>Cerca una notizia</h2>
            <form>
              Inserisci parola chiave
              <input type='text' id='key_news'>
              <input type='submit' value='Cerca'>
            </form>
            <section id="articles"></section>
    </div> 

      <div id="standing">
        <h3>Classifica Formula 1 2021</h3>
        <div class="classifica"></div>
      </div>
    </div>

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
</html>    