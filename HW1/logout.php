<?php

    // Avvia la sessione
    session_start();
    // Elimina la sessione
    session_destroy();
    //elimino cookie
    setcookie("user","");
    // Vai alla login
    header("Location: home.php");
    exit;

?>