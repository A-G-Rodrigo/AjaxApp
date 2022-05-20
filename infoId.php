<main class="item-view" id="itemView">
<?php

    foreach ($result as $result){
        foreach($result as $key=>$value) {
            $keys[] = $key;
            $values[] = $value;
            echo $key.': '.$value.'<br>';
        }
    }    
?>
<div>
    <div id="itemDetele">
        <a href="<?php echo $keys[0] ?>" hreflang="<?php echo $table ?>" name="Delete" id="<?php echo $values[0] ?>">
            <?php echo 'Delete' ?> 
        </a> 
    </div>
</div>
<div>
    <div id="itemModify">
        <a href="<?php echo $keys[0] ?>" hreflang="<?php echo $table ?>" name="Modify" id="<?php echo $values[0] ?>">
            <?php echo 'Modify' ?> 
        </a> 
    </div>
</div>
</main>