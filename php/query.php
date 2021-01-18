<?php
include "./connection.php";






if (isset($_POST['signin'])) {

    $email = $_POST["email"];
    $password = $_POST["pwd"];


    $checkquery = "select * from user where email='$email' and password='$password'";


    $result = $conn->query($checkquery);



    if ($result->num_rows > 0) {

        //login success

        echo "<script> location.href='../dashboard.html'; </script>";
    } else {

        //login failed

        echo "<script>alert('login failed incorrect password or email');</script>";
        echo "<script> location.href='../index.html'; </script>";
    }
}



if (isset($_POST['signup'])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $dob = $_POST["dob"];
    $country = $_POST["country"];
    $phone = $_POST["contact"];




    $insertquery = "INSERT INTO user (fname, lname, email,password,dob,country,contact)VALUES ('$fname','$lname','$email','$password','$dob','$country','$phone')";




    if ($conn->query($insertquery) === TRUE) {


        echo "<script>alert('sign-up successfull');</script>";
        echo "<script> location.href='../index.html'; </script>";
    } else {


        echo "<script>alert('sign-up failed');</script>";
        echo "<script> location.href='../signup.html'; </script>";
    }

    $conn->close();
}
