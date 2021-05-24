<?php

    $conn=mysqli_connect("127.0.0.1", "root", "", "DB");
    $query="INSERT into pilota(id_pilota, nome, descrizione, immagine) values('".$_POST['id']."', '".$_POST['nome']."',  '".$_POST['descrizione']."', '".$_POST['immagine']."');";
    $res=mysqli_query($conn,$query);
    if($res===TRUE){
        echo 1;
    }else{
        echo 0;
    }
?>
