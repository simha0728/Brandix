<?php
    $icode = $_POST['icode'];
    $country = $_POST['country'];
    $transport = $_POST['transport'];
    $payment = $_POST['payment'];
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];

    //Database connection
    $conn = new mysqli('localhost','root','','brandix');
    if($conn->connect_error){
        die("Failed to conect : ".$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO import(icode, country, transport, payment,quantity,id)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$icode, $country, $transport, $payment,$quantity,$id);
        $stmt->execute();
        echo "You Have Ordered Successfully..!";
        $stmt->close();
        $conn->close();
    }
?>