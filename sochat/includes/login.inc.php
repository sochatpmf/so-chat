<?php
/**
 * Created by PhpStorm.
 * User: malek
 * Date: 3/11/2018
 */

session_start();

// Checking if the submit button in the form was pressed
if(isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    // mysqli_real_escape_string makes sure that there will be no code input in the username and password fields (security wise)
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Here we check if username and password fields are left blank
    if(empty($username) || empty($password)) {
        header("Location: ../index.php?login=empty");
        exit();

    } else {

        $query = "select * from user where username='$username'";
        $result = mysqli_query($connection, $query);

        // If there are no results matching the input we redirect the user from this page and exit the php script
        if(mysqli_num_rows($result) != 1) {
            header("Location: ../index.php?login=error");
            exit();

        } else {

            // $row variable is an associative array that holds the query result values
            if($row = mysqli_fetch_assoc($result)) {

                // Checking if entered password is correct
                if(!password_verify($password, $row['password'])) {
                    header("Location: ../index.php?login=error");
                    exit();

                // Defining session variables
                } else {
                    $_SESSION['s_id'] = $row['id'];
                    $_SESSION['s_username'] = $row['username'];
                    $_SESSION['s_password'] = $row['password'];
                    $_SESSION['s_mail'] = $row['mail'];

                    header("Location: ../index.php?login=success");
                    exit();
                }

            }
        }

    }

} else {
    header("Location: ../index.php?login=error");
    exit();
}