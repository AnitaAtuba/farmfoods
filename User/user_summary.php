
<?php 
session_start();
require_once"userguard.php";
require_once"Classes/buyer.php";
$buyer = new Buyer;
$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);
$products = $buyer->my_transactions($_SESSION['buyeronline']);



// echo"<pre>";
// print_r($products);
// echo"</pre>";

require_once"Partials/header.php";
require_once"Partials/dash.php";


?>
    <!-- CONTAINER-->
    <div class="container-fluid bg-white my-4">
     <div class="row">
          <div class="col  my-3">
            <h3 class="text-success">Transactions</h3>
              </div>

            <div class="col-12">
                	<?php 
			if(isset($_SESSION['buyererror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['buyererror']."</p>";
				unset($_SESSION['buyererror']);
			}

				if(isset($_SESSION['buyermessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['buyermessage']."</p>";
				unset($_SESSION['buyermessage']);
			}?>
            </div>
          </div>

       <div class="row mb-5">
         <div class="col bg-white" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Ref Number</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($products){?>
                        <?php $count=1; foreach($products as $prod){?>
                            <tr>
                                <td><?php echo $count++;?></td>
                                <td><?php echo $prod['pay_refernum'] ?></td>
                                <td><span class="">
                                    <?php if($prod['pay_status']=='pending'){
                                        echo "<span class='badge bg-warning p-2'>".$prod['pay_status']."</span>";
                                    }else{
                                        echo "<span class='badge bg-success p-2'>".$prod['pay_status']."</span>";
                                    }?>
                                </span></td>
                                <td><?php echo number_format($prod['pay_totalamt'],2) ?></td>
                                <td><?php echo $prod['formatted_date'] ?></td>
                            </tr>
                        <?php } ?>
                    <?php }else{ ?>
                        <tr><td colspan="6">No transactions found.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
 </div>

    
    <?php 
    require_once "Partials/footer.php";
    ?>