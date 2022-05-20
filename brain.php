<?php
// include "MySqlDB.php";
$test = ['A', 'B', 'C',
    'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K',
    'L', 'M', 'N', 'Ñ', 
    'O', 'P', 'Q', 'R', 
    'S', 'T', 'U', 'V',
    'W', 'X', 'Y', 'Z'
];
$saveTest = [];
if(isset($_POST['create'])){

    // $accion = $_POST['create']['crud'];
    $table = $_POST['create']['DBTable'];
    $origin = $_POST['create']['back'];
    $accion = 'saveCreate';
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {

        exit('Could not connect');
        
    } else {

        $sql = "SELECT * FROM $table";
        $result = $cnx->query($sql);
        $cnx->close();
        include 'form.php';

    }
}
if(isset($_POST['search'])){

    // $accion = $_POST['create']['crud'];
    $searchtable = $_POST['search']['DBTable'];
    $searchorigin = $_POST['search']['back'];
    $searchaccion = $_POST['search']['crud'];
    $searchvalue = $_POST['search']['value'];
    $searchkey = $_POST['search']['key'];
    $reception = $searchtable;
    $reception2 = $searchorigin;
    // $reception3 = ;
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {

        exit('Could not connect');
        
    } else {
        $sql = "SELECT * FROM $searchtable WHERE $searchkey LIKE '%$searchvalue%'";
        // echo $sql;
        $result = $cnx->query($sql);
        $cnx->close();

        include 'info.php';

    }
}
if(isset($_POST['Delete'])){
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {
        exit('Could not connect');       
    } else {
            $table = $_POST['Delete']['table'];
            $key = $_POST['Delete']['key'];
            $value = $_POST['Delete']['value']; 
            $sql = "DELETE FROM $table WHERE $key=$value";
            $result = $cnx->query($sql);
            $cnx->close();  
            $reception = $table; 
            include "back.php";     
    }   
}
if(isset($_POST['Modify'])){  
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {
        exit('Could not connect');       
    } else {
        $table = $_POST['Modify']['table'];
        $key = $_POST['Modify']['key'];
        $value = $_POST['Modify']['value'];
        $accion = $_POST['Modify']['accion'];
        $sql = "SELECT * FROM $table WHERE $key=$value";
        $result = $cnx->query($sql);
        $cnx->close();
        include "form.php";
    }
}
if(isset($_POST['saveModify'])){
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {
        exit('Could not connect');       
    } else {
        $table = $_POST['saveModify']['table'];
        $key = $_POST['saveModify']['key'];
        $value = $_POST['saveModify']['value'];
        $accion = $_POST['saveModify']['accion'];
        $reception = strtolower($table);
        $reception2 = $origin;
        $reception3 = $_POST['saveModify']['datas'];
        $items = [];
        $params = [];
        $update = [];
        for ($x=1; $x<$reception3[0]; $x++){
            $reception4 = $_POST['saveModify']['inputIdValue'.$x];
            if($x+1<$reception3[0]){
                array_push($params, "'".$reception4."', ");
                array_push($items, $_POST['saveModify']['inputId'.$x].', ');
                if(empty($reception4)){
                    array_push($update, strtolower($_POST['saveModify']['inputId'.$x]).'=null, ');

                } else {
                    array_push($update, strtolower($_POST['saveModify']['inputId'.$x]).'="'.$reception4.'", ');
                }
            } else {
                array_push($params, "'".$reception4."'");
                array_push($items, $_POST['saveModify']['inputId'.$x]);
                if(empty($reception4)){
                    array_push($update, strtolower($_POST['saveModify']['inputId'.$x]).'=null');

                } else {
                    array_push($update, strtolower($_POST['saveModify']['inputId'.$x]).'="'.$reception4.'"');
                }
                // array_push($update, strtolower($_POST['saveModify']['inputId'.$x]).'='.$reception4);

            }       
        }
        $item = join($items);
        $lowerItem = strtolower($item);
        $param = join($params);
        $update = join($update);
        $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
        if($cnx->connect_error) {
            exit('Could not connect');        
        } 
            $sql = "UPDATE $reception SET $update WHERE id=$value";
       
            // include 'back.php';
            // $sql = "UPDATE $table SET nombre = ?, stock = ?, 
            // marca = ?, precio=?, descripcion=?, categoria=?,
            // peso=?, imagen=? WHERE id_producto=?";        
            $result = $cnx->query($sql);
            // echo $param;
            // echo $lowerItem;
            // echo $update;
            // echo $sql;
            // if ($cnx->query($sql) === TRUE) {
            //         echo "New record created successfully";
        
            //       } else {
            //         echo "Error: " . $sql . "<br>" . $cnx->error;
            //       }
            $cnx->close();
            include "back.php";

        }
}
 

if(isset($_POST['cancelCreate'])){

    $reception = $_POST['cancelCreate']['DBTable'];
    include "back.php";
     
}
if(isset($_POST['saveCreate'])){

    // $accion = $_POST['create']['crud'];
    $reception = strtolower($_POST['saveCreate']['DBTable']);
    $reception2 = $origin;
    $reception3 = $_POST['saveCreate']['datas'];
    $items = [];
    $params = [];
    // $values = [];
    for ($x=1; $x<$reception3[0]; $x++){
        $reception4 = $_POST['saveCreate']['inputIdValue'.$x];
        if($x+1<$reception3[0]){
            array_push($params, "'".$reception4."', ");
            array_push($items, $_POST['saveCreate']['inputId'.$x].', ');
            // array_push($values, '?, ');
        } else {
            array_push($params, "'".$reception4."'");
            array_push($items, $_POST['saveCreate']['inputId'.$x]);
            // array_push($values, '?');
        }       
    }
    $item = join($items);
    $lowerItem = strtolower($item);

    // $value = join($values);
    $param = join($params);
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {

        exit('Could not connect');
        
    } 
 
        $sql = "INSERT INTO $reception ($lowerItem)
        VALUES ($param)";
        $result = $cnx->query($sql);
        $cnx->close();        
        //   if ($cnx->query($sql) === TRUE) {
        //     // echo "New record created successfully";
        //     $reception = 

        //   } else {
        //     echo "Error: " . $sql . "<br>" . $cnx->error;
        //   }
        include 'back.php';
}
if(isset($_POST['consultId'])){

    $table = $_POST['consultId']['table'];
    $key = $_POST['consultId']['key'];
    $value = $_POST['consultId']['value'];

    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {
        exit('Could not connect');
    } else {
        $sql = "SELECT * FROM $table WHERE $key=$value";
        // echo $sql;
        $result = $cnx->query($sql);
        $cnx->close();
        include 'infoId.php';
    }
}
if(isset($_POST['load'])){

    $reception = $_POST['load']['secondaryRute'];
    $reception2 = $_POST['load']['mainRute'];
    $reception = strtolower($reception);
    $cnx = new mysqli("bbdd.pixyorobotics.es", "ddb183422", "PixyoAdmin1", "ddb183422");
    if($cnx->connect_error) {
        exit('Could not connect');      
    } else {
        // var_dump($cnx);
        $sql = "SELECT * FROM $reception";
                $result = $cnx->query($sql);
                $cnx->close();
        // var_dump($result);
        if($result->field_count == 0){
            echo "<h2 class='consult-title'>".'This table not exist'."</h2>";
        } else {
            if($result->num_rows == 0){
                // $columns = [];
                echo "<h2 class='consult-title'>".'This table is empty'."</h2>";
                echo $result;
                // var_dump($result->field_count);
                // var_dump($result);
                // echo $reception;
                // echo $result->field_count;
                // echo $result->current_field;
                // echo $result->rows;

                // for($x=1; $x <= $result->field_count; $x++){
                //     if($x==1){
                //         array_push($columns, "null, ");
                //     } else if($x==$result->field_count){
                //         array_push($columns, "''");
                //     } else {
                //         array_push($columns, "'', ");
                //     }
                // }
                // $columns = join($columns);
                // $sql = "INSERT INTO $reception VALUES ($columns)";
                // echo $sql;

                // SELECT * FROM $reception";
                // $result = $cnx->query($sql);
                // if ($cnx->query($sql) === TRUE) {
                //     echo "New record created successfully";
                // } else {
                //     echo "Error: " . $sql . "<br>" . $cnx->error;
                // }
                // $cnx->close();               
                // include "info.php";
            } else {               
                include "info.php";
            }
            // include "info.php";

        }
    } 
}
?>