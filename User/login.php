<?php
session_start();

   require_once"Partials/header.php";
?>
<style>
      .container {
        width: 60%;
      }

    
      /* h4 {
        color: #157347;
        font-weight: bold;
      } */

 
      form {
        background: linear-gradient(
          rgba(255, 255, 255, 0.8),
          rgba(255, 255, 255, 0.8)
        );
        backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0px 3px 3px rgba(255, 255, 255, 0.5);
      }

      .btn {
        color: #ffffff;
        border-radius: 10px;
        height: 50px;
        font-weight: bold; 
        border: 1px solid #157347;
		    box-shadow: 0px 8px 8px rgba(0,0,0,0.2);
        
      }

      .button:hover {
        border: 2px solid #7eae49;
        background-color: #7eae49;
        color: #ffffff;
       
        box-shadow: 0px 3px 3px 0px #00000022;
      }

      .agree {
        font-size: 12px;
      }

 
      /* div{
	border:1px solid black;
	} */

      @media only screen and (max-width: 768px) {
        .container {
          width: 90%;
        }
      }
</style>
  </head>
  <body>
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

      <div class="row mt-5 shadow rounded">
        <!--FORM -->
        <form action="process/process_login.php" method="post">
          <div class="col mt-3 p-2">
            <h4 class="mb-4 text-success">Log in BuyFarm</h4>
            <div class="row mb-3">
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
                    id="radios2"
                    value="buyer"
                  />
                  <label class="form-check-label" for="radios2"> Buyer </label>
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
                class="button col-12 btn btn-success mb-4">
                Sign in
              </button>
          </div>
        </form>
         <div class="mb-3">
         <span>Not a Buyer? <a href="../farmer/login.php">click me to sell FarmFoods.</a></span>
        </div>
      </div>
      <hr />
      <br />
      <br />
	</div>
   </section>
  <div class="container-fluid">
    
															
  </div>
<?php require_once"Partials/footer.php";?>
