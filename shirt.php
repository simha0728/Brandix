<?php
    $pcode = $_POST['pcode'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $edate = $_POST['edate'];
    $qty = $_POST['qty'];
    $oid = $_POST['oid'];

    //Database connection
    $conn = new mysqli('localhost','root','','brandix');
    if($conn->connect_error){
        die("Failed to conect : ".$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO shirt(pcode, pname, price, edate,qty,oid)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$pcode, $pname, $price, $edate,$qty,$oid);
        $stmt->execute();
        echo "You Have Ordered Successfully..!";
        $stmt->close();
        $conn->close();
    }
?>