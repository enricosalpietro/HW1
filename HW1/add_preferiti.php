<?php

    session_start();
    // Verifica se l'utente è loggato
    //se non è loggato allora vai al login
    if(!isset($_SESSION['username']))
    {
        exit(0);
    }

    $conn=mysqli_connect("127.0.0.1", "root", "", "DB");
    
    $codicepilota= mysqli_real_escape_string($conn,$_POST["codice"]);
    $email= mysqli_real_escape_string($conn,$_SESSION['email']);
  
    $query="SELECT * FROM utenti WHERE email='".$email."'";
    $res=mysqli_query($conn, $query);
  
    while($row=mysqli_fetch_assoc($res)){
      $codiceutente=$row['codice'];
    }
  
    $query="INSERT INTO preferiti VALUES ('".$codicepilota."', '".$codiceutente."');";
    

    $res=mysqli_query($conn, $query);


    mysqli_free_result($res);
    mysqli_close($conn);
?>