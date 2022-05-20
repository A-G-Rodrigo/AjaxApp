<?php
// foreach($result as $key2=>$value2){
        //     echo $key2.': '.$value2."<br>";

        // }
        $counter = 0;
        $items = $result->num_rows;
        foreach ($result as $result){
        $newRes = $result;
        // echo $newRes;
            foreach($newRes as $key=>$value) {
                $keys[] = $key;
                $values[] = $value;
                // echo $key.': '.$value."<br>";
            }
        } 
?>
<main class="main-page">
    <h2 class="consult-title" hreflang="<?php echo $reception2 ?>" id="ConsultTitle"><?php echo ucfirst($reception) ?></h2>
    <div class="search-box" id="SearchBox">
            <li class="search-box-li" id="ButtonNew">
                <a class="new-item" name="create" id="<?php echo $reception2 ?>" href="<?php echo $reception ?>">
                    Nuevo
                </a>
            </li>
            <li id="ButtonSearch">
                <a hreflang="<?php echo $reception2 ?>" class="lens" name="search" href="<?php echo $reception ?>">
                    Buscar
                </a>
            </li>
            <li>
                <select name="Search" id="SelectSearch">
                    <?php for($x=0; $x<count($keys)/$items; $x++) { ?>
                        <option value="<?php echo $keys[$x] ?>"><?php echo $keys[$x] ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <input type="text" name="valueSearch">
            </li>
        </div>
    <?php
              
        if($items == 0){ 
            echo "<h2 class='consult-title'>".'This table is empty'."</h2>";
            var_dump($keys);
        } else { ?>

            <table class="consult-table" id="ConsultTable">
                    <thead>
                        <tr>
                        <?php for($x = 0; $x < count($keys)/$items; $x++){ ?>
                            <th class="header-consult-table"> <?php echo $keys[$x] ?> </th>
                        <?php } ?>
                        </tr>
                        <tr>
                            <td class="item-consult-table">                
                                <a href="<?php echo $keys[0] ?>" class='<?php echo $reception ?>' name='' id="<?php echo $values[0] ?>">
                                    <?php echo $values[0]?> 
                                </a> 
                            </td>
                        <?php for($y = 1; $y <count($values); $y++){?>              
                            <?php
                                $counter += 1;
                                if($counter == count($values)/$items){?>
                                    </tr><tr>
                                    <td class="item-consult-table">
                                        <a href="<?php echo $keys[$y] ?>" class='<?php echo $reception ?>' name='' id="<?php echo $values[$y] ?>">
                                            <?php echo $values[$y] ?> 
                                        </a> 
                                    </td>
                            <?php  $counter = 0; } else { ?>
                                <td class="item-consult-table"> <?php echo $values[$y] ?> </td>
                            <?php } ?>
                        <?php } 
                ?>
    <?php } ?>
</main>
