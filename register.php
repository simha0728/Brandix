<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cnumber = $_POST['cnumber'];
    $cvv = $_POST['cvv'];
    $mail = $_POST['mail'];
    $password1 = $_POST['password1'];
    $dob = $_POST['dob'];
    $nicnumber = $_POST['nicnumber'];
    $tpno = $_POST['tpno'];
    $address = $_POST['address'];

    //Database connection
    $conn = new mysqli('localhost','root','','brandix');
    if($conn->connect_error){
        die("Failed to conect : ".$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO register(firstname, lastname, cnumber, cvv,mail,password1,dob,nicnumber,tpno,address)
        values(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssissssss",$firstname, $lastname, $cnumber, $cvv,$mail,$password1,$dob,$nicnumber,$tpno,$address);
        $stmt->execute();
        echo "Registration Successfull..!";
        $stmt->close();
        $conn->close();
    }
?>