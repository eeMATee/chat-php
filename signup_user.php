<?php 
    require_once("include/connection.php");


    if(isset($_POST['sign_up'])) {

        $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
        $rand = rand(1, 2);

        // sprawdzanie username
        if($name == '') {
            echo"<script>alert('We can not verify your name')</script>";
        }

        // sprawdzanie dlugosci hasla
        if(strlen($pass) < 8) {
            echo"<script>alert('Password is to short, minimum 8 characters')</script>";
            exit();
        }


 
        

        // zapytanie do bazy danych SQLi
        $check_email = "select * from users where user_email='$email'";
        // przeslyanie zapytania do bazy danych
        $run_email = mysqli_query($con, $check_email);


        // zwraca ilosc pasujacych email z bazy danych
        $check = mysqli_num_rows($run_email);

        if($check == 1) {
            echo"<script>alert('Email already exist!')</script>";
            echo"<script>window.open('signup.php', '_self')</script>";
            exit();
        }





        if($rand == 1) {
            $profile_pic = "images/default_pic1.jpg";
        } 
        else if ($rand == 2) {
            $profile_pic = "images/default_pic2.jpg";
        }

        // tresc zapytania do mysqli
        $insert = "insert into users (user_name, user_pass, user_email, user_profile, user_country, user_gender) values('$name', '$pass', '$email', '$profile_pic', '$country', '$gender')";

        $query = mysqli_query($con, $insert);

        if($query) {

            echo"<script>alert('Congratulations $name, your account has been created successfully')</script>";

            echo"<script>window.open('signing.php')</script>";
        } else {

            echo"<script>alert('Registration failed, try again!')</script>";
            echo"<script>window.open('signup.php, _self')</script>";

        }

    }


?>