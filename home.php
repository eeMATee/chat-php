<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/home.css">
    <title>My Chat - Home</title>
</head>

<body>

    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <span><a href="include/find_friends.php"></a>
                            <button class="btn btn-default search-icon"
                                name="search_user" type="submit">Add new user</button></span>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <!-- ADDS <LI></LI>  TO UNORDER LIST-->
                         <?php
                          include("include/get_users_data.php")  
                         ?>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                        <!-- getting the user information who is logged ind -->
                        <?php
                            $user = $_SESSION['user_email'];
                            $get_user = "SELECT * FROM users WHERE user_email='$user'";
                            $run_user = mysqli_query($con, $get_user);
                            $row = mysqli_fetch_array($run_user);

                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];

                        ?>

                        <!-- getting the user data on which user click  -->
                        <?php

                                if(isset($_GET['user_name'])) {
                                    global $con;

                                    $get_username = $_GET['user_name'];
                                    $get_user = "SELECT * FROM users WHERE user_name='$get_username'";

                                    $run_user = mysqli_query($con, $get_user);

                                    $row_user = mysqli_fetch_array($run_user);

                                    $username = $row_user['user_name'];
                                    $user_profile_image = $row_user['user_profile'];


                                }


                                $total_messages = "SELECT * FROM users_chat WHERE (sender_username= '$user_name' AND reciver_username='$username') OR (reciver_username='$user_name' AND sender_username='$username'";

                                $run_messages = mysqli_query($con, $totalmessages);

                                $total = mysqli_num_rows($run_messages);

                        ?>
                        <div class="col-md-12 right-header">
                            <div class="right-header-img">
                                <img src="<?php echo"$user_profile_image";  ?>" alt="profile image">
                            </div>
                                <div class="right-header-detail">
                                    <form action="" method="post">
                                        <p><?php echo "$username";  ?></p>
                                        <span><?php  echo $total; ?> messages</span>&nbsp &nbsp
                                        <button type="submit" name="logout" class="btn btn-danger"></button>
                                    </form>
                                    <?php  
                                        if(isset($_POST['logout'])) {
                                            $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                            header("Location: logout.php");
                                            exit();
                                        }
                                    ?>
                                </div>
                        </div>
                    </div>

                          <div class="row">
                              <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">

                              <?php  
                                $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND reciver_username='$user_name'");

                                        $sel_msg = "SELECT * FROM users_chat WHERE (sender_username='$user_name' AND reciver_username='$username' OR (reciver_username='$user_name' AND sender_username='$username') ORDER BY 1 ASC";

                                        $run_msg = mysqli_query($con, $sel_msg);

                                        while($row = mysqli_fetch_array($run_msg)) {

                                            $sender_username = $row['sender_username'];
                                            $reciver_username = $row['reciver_username'];
                                            $msg_content = $row['msg_content'];
                                            $msg_date = $row['msg_date'];
                              ?>
                                    
                                        <ul>
                                        <?php  
                                            if($user_name == $sender_username AND $username == $reciver_username) {

                                                echo "
                                                
                                                    <li>
                                                        <div class='rightside-chat'>
                                                        <span>$username <small> $msg_date</small></span>
                                                        <p>$msg_content</p>
                                                        </div>
                                                    </li>
                                               
                                                ";
                                            }

                                            else if($user_name == $reciver_username AND $username == $sender_username) {

                                                echo "
                                                
                                                    <li>
                                                        <div class='rightside-chat'>
                                                        <span>$username <small> $msg_date</small></span>
                                                        <p>$msg_content</p>
                                                        </div>
                                                    </li>
                                               
                                                ";
                                            }
                                        ?>
                                        </ul>
<!-- closing while loop -->
                                        <?php
                                        }
                                        ?>

                              </div>
                          </div>              


                          <div class="row">
                              <div class="col-md-12 right-chat-textbox">
                                  <form action="" method="post">
                                      <input type="text" name="msg_content" autocomplete="off" placeholder="write a message">
                                      <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                  </form>
                              </div>
                          </div>
                </div>
            </div>
        </div>
    </div>




<?php 

    if(isset($_POST['submit'])) {

        $msg = htmlentities($_POST['msg_content']);

        if($msg == "" ) {
            echo "
                <div class='alert alert-danger'>
                    <strong> Message was unable to send </strong>
                </div>
            
            ";
        }

        else if (strlen($msg) > 100) {

            echo "
            <div class='alert alert-danger'>
                <strong> Message too long. Use only 100 characters! </strong>
            </div>
        
        ";

        }
        else {

            $insert = "INSERT INTO users_chat(sender_username, reciver_username, msg_content, msg_status, msg_date) VALUES ('$user_name', '$username', '$msg', 'uread', NOW())";
    
    
            $run_insert = mysqli_query($con, $insert);
        }

    } 


?>










</body>

</html>