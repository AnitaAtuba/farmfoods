<?php
session_start();

   require_once"Partials/header.php";
?>
  
    <div class="container-fluid bg-white">
      <div class="row">
        <!--NAVBAR -->
<section>
  <div class="col" id="login">
     
  </div>
</section>
      </div>
    </div>
    <!--CONTAINER -->
   <section>
    <div class="container ">
      <div class="row my-5 bg-white shadow rounded">
        <!--FORM -->
        <form action="process/process_login.php"  class="" method="post">
          <div class="col mt-3 p-2">
            <h4 class="mb-4 text-success">Log in FarmFoods</h4>
            <div class="row mb-3">
<?php 
			if(isset($_SESSION['farmerror'])){
				echo "<p class='alert alert-danger'>".$_SESSION['farmerror']."</p>";
				unset($_SESSION['farmerror']);
			}

      	if(isset($_SESSION['farmmessage'])){
				echo "<p class='alert alert-success'>".$_SESSION['farmmessage']."</p>";
				unset($_SESSION['farmmessage']);
			}
			
	?>
              <div class="col-sm-2">
                <label for="email" class="col-form-label">Email: </label>
              </div>
              <div class="col-sm-10">
                <input
                  type="email" name="email"
                  class="form-control "
                  id="email"
                  required
                />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-2">
                <label for="password" class="col-form-label">Password: </label>
              </div>
              <div class="col-sm-10">
                <input
                  type="password" name="password"
                  class="form-control"
                  id="password"
                  required
                />
              </div>
            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-3">Account:</legend>
              <div class="col-sm-8">
                <div class="form-check">
                  <input
                    class="form-check-input border border-success"
                    type="radio"
                    name="radio"
                    id="radios1"
                    value="farmer"
                  />
                  <label class="form-check-label" for="radios1"> Farmer </label>
                </div>
  
              </div>
            </fieldset>

            <div class="form-check mb-3">
              <input
                class="form-check-input bg-success"
                type="checkbox"
                id="checkbox"
              />
              <label class="form-check-label agree" for="checkbox">
                i agree with Terms and Conditions and Privacy Policy
              </label>
            </div>
            
              <button
                type="submit" name="btn"
                class="button col-8 offset-2 btn btn-success mb-4">
                Sign in
              </button>
          </div>
        </form>
        <div class="mb-3">
         <span>Not a Farmer? <a href="../User/login.php">click me to buy FarmFoods.</a></span>
        </div>
      </div>
      <hr />
      <br />
      <br />
	</div>
   </section>
  <div class="container-fluid">
    
															
  </div>
<?php require_once"partials/footer.php";?>
