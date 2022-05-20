<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_POST['saveCreate'])){ ?>
        <?php foreach($_POST['saveCreate'] as $key=>$value){ ?>
            <p> <?php echo $key .': '. $value ?> </p>
        <?php } ?>
    <?php } // echo json_encode(isset($reception3)).' y '.json_encode(isset($_POST['saveCreate'])) ?>
</body>
</html>