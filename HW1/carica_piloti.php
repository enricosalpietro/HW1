<?php

    $conn=mysqli_connect("127.0.0.1", "root", "", "DB");

    $piloti =array();

    $query="SELECT id_pilota, nome, descrizione, immagine from pilota";

    $res=mysqli_query($conn, $query);

    while($row=mysqli_fetch_assoc($res)){
        $piloti[]=$row;
    }

    mysqli_free_result($res);
    mysqli_close($conn);

    echo json_encode($piloti);
?>