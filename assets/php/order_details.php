<?php #include 'assets/php/_protect.php';
    #$token = $_SESSION["token"];
?>

<div class='modal fade' id='orderModal_<?php echo $ordered_row[1];?>'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h4>Order Details</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
            <div class='modal-body'>
                <ul class='nav nav-tabs'>
                    <li class='nav-item'>
                        <a class='nav-link active' data-toggle='tab' href='#overview_<?php echo $ordered_row[1];?>'>Order Overview</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='tab' href='#specifics_<?php echo $ordered_row[1];?>'>Specifics</a>
                    </li>
                </ul>
                <div class='tab-content'>
                    <div class='tab-pane container active' id='overview_<?php echo $ordered_row[1];?>'>
                        <table class='table table-borderless'>
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Order ID</td>
                                    <td><?php echo $ordered_row[1] ?></td>
                                </tr>
                                <tr>
                                    <td>Item Quantity</td>
                                    <td><?php echo $item_quantity ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td class="set-title"><?php echo $ordered_row[5] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class='tab-pane container fade' id='specifics_<?php echo $ordered_row[1];?>'>
                        <table class='table table-borderless'>
                            <thead>
                            </thead>
                            <tbody>
                                <?php 
                                    $productList = explode(";", $ordered_row[3]);
                                    $quantityList = explode(";", $ordered_row[4]);
                                    foreach($productList as $p){
                                        $q = $quantityList[array_search($p, $productList)];
                                        echo "Product: $p, Quantity: $q";
                                    }?>
                                <td>img</td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>