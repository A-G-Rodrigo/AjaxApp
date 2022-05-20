<form action="" class="form-create-item" id="Form">

    <?php

        $counter = 0;
        $items = $result->num_rows;
        foreach ($result as $result){
        $newRes = $result;
        // echo $newRes;
            foreach($newRes as $itemKey=>$itemValue) {
                $itemKeys[] = $itemKey;
                $itemValues[] = $itemValue;
                if(count($itemKeys)>1){
                    $newKeys[] = ucfirst($itemKey);
                } else {
                    $newKeys[] = ucfirst($itemKey);

                }
                // echo $key.': '.$value."<br>";
            }
        }
        $long = count($itemKeys);

        // echo array_values($keys);
    ?>

    <table class="create-item-table" id="CreateItemTable">
        <thead>
            <tr>
            <?php for($x = 0; $x < count($itemKeys)/$items; $x++){ ?>
                <th class="header-consult-table"> <?php echo ucfirst($itemKeys[$x]) ?> </th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php for($x = 0; $x < count($itemKeys)/$items; $x++){ ?>
                <td class="item-create-table">
                    <input type="text" class="input-data " id="<?php echo ucfirst($itemKeys[$x])?>" value="<?php if(isset($value)){ echo $itemValues[$x]; } ?>">
                </td>
            <?php } ?>
            </tr>
            
        </tbody>
        <tfooter>
            
                <!-- <button>Cancelar</button>
                <button>Guardar</button> -->
        </tfooter>
    </table>
   
</form>
<div>
                <div class="btn-cancel-creation" id="boxBtnCancelCreation">
                    <a href="<?php echo $table ?>"  name="cancelCreation" >Cancelar</a>
                </div>
                <div class="btn-save-creation" id="boxBtnSaveCreation">
                    <a href="<?php echo $table ?>" hreflang="<?php if(isset($value)){echo $value;} ?>" id="<?php  for($x = 0; $x < count($itemKeys)/$items; $x++){echo $newKeys[$x];} ?>" name="<?php echo $accion ?>">
                    <?php if($accion=='saveModify'){ ?> Modificar <?php }else{ ?> Guardar <?php } ?>
                    </a>
                </div>
            </div>