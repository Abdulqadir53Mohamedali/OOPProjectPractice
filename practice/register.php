<?php
include_once "../classes/registerClass.php";

$errorResults = ['errors'=> []];  // array to store error messages
$validationResult = null;

if(isset($_POST['submitBtn'])){
    $TC = isset($_POST['TC']) ? $_POST['TC'] : '';
    $register = new register($_POST['email'],$_POST['password'],$_POST['confirmPassword'],$_POST['lastName'],$_POST['firstName'],$TC);
    $formValidation = $register;    
    $validationResult = $formValidation->validation();
} else{
    $register = new register('', '', '', '', '', '');
    $formValidation = $register;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href = "/styles/register.css">
    
</head>
<body class = " d-flex min-vh-100 flex-column">
    <?php include "navbar.php";?>
    <!-- Register form -->
    <div id = "registerFormContainer" style = "background-color:#FAEDE0;" class = "container mx-auto  mt-auto mb-auto p-3  border border-danger-subtle rounded border-5 col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5" >
        <h1 class = "d-flex justify-content-center" style = "color:#000000;">Register</h1>
        <hr>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "POST" novalidate>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input  name = "email" type="email" class="form-control <?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"email")?>" value = "<?php echo $formValidation->keepText("email")?>" id="email" aria-describedby="emailHelp">
                <div class="invalid-feedback">
                    <?php echo $formValidation->errorMessageDisplay($validationResult, "email"); ?>
                </div>
            </div>
            <div class="mb-3">
                <label  class="form-label">First Name</label>
                <input name = "firstName"type="text" class="form-control <?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"firstName")?>" value = "<?php echo $formValidation->keepText("firstName")?>" id="firtsName">
                <div class="invalid-feedback">
                    <?php echo $formValidation->errorMessageDisplay($validationResult, "firstName"); ?>
                </div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Last Name</label>
                <input name = "lastName"type="text" class="form-control <?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"lastName")?>" value = "<?php echo $formValidation->keepText("lastName")?>" id="lastName">
                <div class="invalid-feedback">
                    <?php echo $formValidation->errorMessageDisplay($validationResult, "lastName"); ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name = "password" type="password" class="form-control <?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"password")?>" value = "<?php echo $formValidation->keepText("password")?>" id="password">
                <div class="invalid-feedback">
                    <?php echo $formValidation->errorMessageDisplay($validationResult, "password"); ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input name = "confirmPassword"type="password" class="form-control <?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"confirmPassword")?>" value = "<?php echo $formValidation->keepText("confirmPassword")?>" id="confirmPassword">
                <div class="invalid-feedback">
                    <?php echo $formValidation->errorMessageDisplay($validationResult, "confirmPassword"); ?>
                </div>
            </div>
            
            <div class = " d-flex justify-content-center" style = "margin-right:120px;" >
            <!-- T&C chekcboxx and modal button -->
                        <div class = "float-start">
                            <input value = "1"name = "TC" type = "checkbox" class = "<?php if(isset($_POST['submitBtn'])) echo  $formValidation->isInvalid($validationResult,"TC")?>" value = "<?php echo $formValidation->keepText("TC")?>" >          
                            <button style = "background-color:#471F3A;" type="button" class="me-5 btn btn-primary  " data-bs-toggle="modal" data-bs-target="#termsModal">
                            T&C
                            </button>
                            <div class="invalid-feedback">
                                 <?php echo $formValidation->errorMessageDisplay($validationResult, "TC"); ?>
                            </div>
                        </div>
            <!-- Submit form button -->
                <button style = "color :#fff;background-color:#471F3A;"class ="btn btn p-3 w-50"type="submit" name = "submitBtn">Submit</button>
            </div>
        </form>



        <!-- Terms and conditions modal -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:400px; overflow-y: scroll;">
                <p>
                Welcome to Our Zoo and Safari Park Website.<br>
                <br>
                By accessing our website, you agree to these terms and conditions. Please read them carefully.<br>
                <br>
                <strong>Use of the Website:</strong><br>
                This website is provided for your personal and non-commercial use. Unauthorized use of this website may give rise to a claim for damages.<br>
                <br>
                <strong>Account Registration:</strong><br>
                You may be required to register an account to access certain features of the website. You agree to provide accurate information and to update this information as necessary.<br>
                <br>
                <strong>Booking Terms:</strong><br>
                All bookings made through the website are subject to acceptance and availability. Prices and availability of services are subject to change without notice.<br>
                <br>
                <strong>Intellectual Property:</strong><br>
                The content, layout, design, data, databases and graphics on this website are protected by intellectual property laws and are owned by [Your Company Name] or its licensors.<br>
                <br>
                <strong>Privacy Policy:</strong><br>
                Our Privacy Policy, which sets out how we will use your information, can be found at [Link to Privacy Policy]. By using this website, you consent to the processing described therein and warrant that all data provided by you is accurate.<br>
                <br>
                <strong>Governing Law:</strong><br>
                These terms and conditions are governed by and construed in accordance with the laws of the UK.<br>
                <br>
                Thank you for visiting our website.
            </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>


        <!--Account already exists -->
        <div class="text-center my-3">
            <div class="row">
                <div class="col">
                </div>
                <div class="col-auto">
                <span class="px-2">Already have an account ? <a href = "/practice/login.php">Log in</a></span>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <!-- or seperator -->
        
        <div class="text-center my-3">
            <div class="row">
                <!-- A column that automatically takes up equal space in the row which contains a horizontal line -->
                <div class="col">
                <!-- does the top and bottom margin for spacing  -->
                <hr class="my-2">
                </div>
                <!-- col auto ensures that the column take only as much space as the content within -->
                <div class="col-auto">
                <span class="px-2">Or</span>
                </div>
                <div class="col">
                <hr class="my-2">
                </div>
            </div>
        </div>

        <!-- Alternate register options -->
            <div class = "d-flex justify-content-center" id = "AltRegister">
                <button type="button" class="btn btn-primary rounded w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"></path>
                    </svg>
                </button>
                <button style = "background-color:#4267B2;" type="button" class="btn btn-primary rounded w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                    </svg>
                </button>
                <button style = "background-color:#000000;" type="button" class="btn btn-primary rounded w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                </button>
            </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/64e743ec68.js" crossorigin="anonymous"></script>
</body>
</html>

<!-- 
 1. Will use form from bootsrapp for the base layout 
 2. will esnure buttons are made fro register, google account,already signed in , facebook etc
 3. a checkbox fro the T&C and privacy policy page stuff in which we will sue the model 
    element from bootsrap to display it if the user clicks on the T&C wording 


 -->






