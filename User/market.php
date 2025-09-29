
<?php 
session_start();
require_once"userguard.php";
require_once"classes/Buyer.php";

$buyer = new Buyer;
$deets = $buyer->fetch_buyer_details($_SESSION['buyeronline']);

// $states=$buyer->fetch_states();

$local= $buyer->fetch_lga();
$cate= $buyer->fetch_category();
$products =$buyer->fetch_all_product();


$search   = $_POST['search']   ?? '';
$category = $_POST['category'] ?? '';
$lga      = $_POST['lga']      ?? '';


// Decide which filter to use
if (!empty($search)) {
    $products = $buyer->filter_search($search);

} elseif (!empty($category)){
    $products = $buyer->filter_category($category);

} elseif (!empty($lga))  {
    $products = $buyer->filter_lga($lga);

} else {
    $products = $buyer->fetch_all_product();
}



// $search = $buyer->search_product(" ");
// $lga_filter =$buyer->fetch_product_lga();

// echo"<pre>";
// print_r($cate);
// echo"</pre>";

require_once"partials/header.php";
require_once"partials/dash_carty.php";


?>
		<div class="container-fluid">
			<!-- FILTER -->

<section>
	<div class="row  mt-2 mb-3">
		<div class="col" align="left">
			<div class="dropdown">
				
				<select class="form-select" aria-label="Default select example" id="category" name="category">
					 <option value="">Category</option>
					<?php  foreach($cate as $cat){ ?>		
					<option value="<?php echo $cat["category_id"]?>"><?php echo $cat["category_name"] ?> </option>
					<?php } ?>
				</select>
				
				</div>
		</div>

		<div class="col" align="right">
			<div class="dropdown">
				<select class="form-select" aria-label="Default select example"  id="lga" name="lga">
						<option value="">Select LGA</option>
						<?php  foreach($local as $lg){ ?>
					<option  value="<?php echo $lg["lga_id"]?>"><?php echo $lg["lga_name"] ?></option>
				<?php } ?>
				</select>
			
				</div>
		</div>
		</div>
</section>
								<!--CONTAINER FLUID-->
			<div class="container-fluid body">
							<div>
			 <?php 
			if(isset($_SESSION['buyererror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['buyererror']."</p>";
				unset($_SESSION['buyererror']);
			}

      		if(isset($_SESSION['buyermessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['buyermessage']."</p>";
				unset($_SESSION['buyermessage']);
			}
			?>
				</div>
							
						<?php if (!empty($products)) { ?>
				<div class="row mb-3">
					<div class="col">
						<div id="searchbody" class="row mb-3">
							<?php foreach ($products as $product) { ?>
								<?php require_once "partials/product_cards.php"; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php }else{ ?>
				<p class="alert alert-info">No Products found</p>
			<?php } ?>

		</div>
				 																																													
	

		</div>
		<br>
		<br>
		<br>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="Assets/jquery.js"></script>

		<script>
	$(function(){
			$("#search").on("input", function(e){
				 e.preventDefault(); 
				var search = $("#search").val();
				if(search){
				 $("#searchbody").load("process/process_filter.php",{search:search}, function(data,status,xhr){

				 	if(status == "error"){
				 		$("#searchbody").html("<p class='alert alert-danger'>Could not load products</p>");
							console.log(status);
				 	}
				 });
			}else{
				{ $("#searchbody").load("process/process_filter.php");
			}}
		}); 

		 $("#category").change(function(){
        var category = $(this).val();
        if(category){
            $("#searchbody").load("process/process_filter.php", {category:category}, function(data,status,xhr){
                if(status == "error"){
                    $("#searchbody").html("<p class='alert alert-danger'>Could not load products</p>");
                }
            });
        }else{
			 $("#searchbody").load("process/process_filter.php");

		}
    });

	$("#lga").change(function(){
        var lga = $(this).val();
        if(lga){
            $("#searchbody").load("process/process_filter.php", {lga:lga}, function(data,status,xhr){
                if(status == "error"){
                    $("#searchbody").html("<p class='alert alert-danger'>Could not load products</p>");
                }
            });
        }else{
			$("#searchbody").load("process/process_filter.php")

		}
    });


	});
</script>
<?php require_once"partials/footer.php";?>
