<?php
$username = $_REQUEST["username"];
$password= $_REQUEST["password"];
function Add($user,$pass){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym_shop";


    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "$user";
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO user (account, password) VALUES (:account, :password)");
        $stmt->bindParam(':account', $user);
        $pass=md5($pass);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        echo "Tao tai khoan thanh cong";
        echo"<a href='index.php'>Ve Trang Dang Nhap</a>";
    } catch(PDOException $e) {
        echo"Dang ki khong thanh cong";
        echo"<a href='index.php'>Ve Trang Dang Nhap</a>";
    }
    $conn = null;
}

if($username=null or $password=null){
    echo"Please fill in the form";
}
else {
    Add($username, $password);
}
