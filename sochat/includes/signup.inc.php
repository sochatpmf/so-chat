<?php
/**
 * Created by PhpStorm.
 * User: malek
 * Date: 3/10/2018
 */

if(isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);


    // Error handler
    if(empty($firstName) || empty($lastName)  || empty($age) || empty($gender) || empty($username)|| empty($password) || empty($mail)) {
        header("Location: ../index.php?signup=empty");
        exit();

    } else {

        // Check if input is valid
        $sql1 = "select * from user where username='$username'";
        $sql2 = "select * from user where mail='$mail'";
        $result1 = mysqli_query($connection, $sql1);
        $result2 = mysqli_query($connection, $sql2);

        if(mysqli_num_rows(mysqli_query($connection, $sql1)) > 0) {
            header("Location: ../index.php?signup=usernametaken");
            exit();

        } else if(mysqli_num_rows(mysqli_query($connection, $sql2)) > 0) {
            header("Location: ../index.php?signup=mailtaken");
            exit();

        } else {

            // Hashing the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "insert into person (first_name, last_name, gender, age, country) values ('$firstName','$lastName','$gender',$age,'$country');";
            if(!mysqli_query($connection, $query)){
                header("Location: ../index.php?signup=failed");
                exit();
            }

            $last_id = mysqli_insert_id($connection);
            // Inserting user into the database
            $query = "insert into user (person, username, password, mail, phone, role) values ('$last_id','$username','$hashedPassword','$mail','$phone','1');";

            if(!mysqli_query($connection, $query)) {
                $query = "delete from person where id = '$last_id'";
                $lastUser = mysqli_query($connection, $query);
                header("Location: ../index.php?signup=failed");
                exit();

            } else {
                header("Location: ../successful.php?signup=success");
                exit();
            }
        }
    }

} else { // Vratimo korisnika nazad na signup stranicu
    header("Location: ../index.php");
    exit();
}