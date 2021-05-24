<?php

    session_start();
    // Verifica se l'utente è loggato
    //se non è loggato allora vai al login
    /*if(!isset($_SESSION['username']))
    {
        exit(0);
    }*/

    $codice_pilota = mysqli_real_escape_string($conn,$_POST["codice"]);
    $codice_utente = mysqli_real_escape_string($conn,$_SESSION['username']);
    $conn=mysqli_connect("127.0.0.1", "root", "", "DB");
    $query='INSERT INTO preferiti values ('".$codice_pilota"', '".$codice_utente"');';
    if($res===TRUE){
        echo 1;
    }else{
        echo 0;
    }
?>
