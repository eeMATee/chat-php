<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
    <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/signup.css">
    <title>Create New Account</title>
</head>
<body>
    
    <div class="signup-form">
    
    <form action="" method="post">

        <div class="form-header">
            <h2>Sing Up</h2>
            <p>Only this form to fill up and you're ready to start chatting with your friends</p>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="user_name" placeholder="Your username" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="">Email Address</label>
            <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="">Country</label>
            <select class="form-control" name="user_country" id="" required>
                <option disabled="">Select a Country</option>
                <option value="USA">USA</option>
                <option value="Poland">Poland</option>
                <option value="Holland">Holland</option>
                <option value="Germany">Germany</option>
                <option value="Belgium">Belgium</option>
                <option value="France">France</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Gender</label>
            <select class="form-control" name="user_gender" id="" required>
                <option disabled="">Select your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="" class="checkbox-inline">
                <input type="checkbox" name="" id="" required> I accept the <a href="#">Therms of Use</a> &amp; <a href="#">Privacy Policy</a>
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
        </div>
        
        <?php
            require_once("signup_user.php");
        ?>  

    </form>
    <div class="text-center small" style="color: #fff;">Already have an account <a href="signup.php">Create one</a></div>
    
    </div>



</body>
</html>