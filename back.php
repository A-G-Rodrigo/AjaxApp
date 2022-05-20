<?php

    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {

        exit('Could not connect');
        
    } else {

        $sql = "SELECT * FROM $reception";
        $result = $cnx->query($sql);
        $cnx->close();
        include 'info.php';

    }

?>