<?php

    session_start();
    // Verifica se l'utente è loggato
    //se non è loggato allora vai al login
    if(!isset($_SESSION['username']))
    {
        exit(0);
    }

    $conn=mysqli_connect("127.0.0.1", "root", "", "DB");

    $nome_pilota =mysqli_real_escape_string($conn, $_GET['id_pilota']);
    $nome_cliente = mysqli_real_escape_string($conn,$_SESSION['id']);

    $query="DELETE FROM preferiti VALUES ('".$nome_pilota."', '".$nome_cliente."');";

    $res=mysqli_query($conn, $query);


    mysqli_free_result($res);
    mysqli_close($conn);
?>