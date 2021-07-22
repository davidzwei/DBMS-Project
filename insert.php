
<!-- <?php
    echo("hello world");
    // conn.php 檔

    
    $conn = new mysqli('localhost:8889', 'root','root', 'test');
    // conn 為 connection 的簡寫，第一個參數是 server 名稱，第二個是帳號，第三個是密碼，第四個是 database
    if ($conn->connect_error) { // 物件存取屬性是用 -> 來表示
        die('資料庫連線錯誤:' . $conn->connect_error);
    }
    else{
        echo("connect");
    }

    //連線完要加上下面這兩行，編碼跟時區比較不會有問題
    $conn->query('SET NAMES UTF8'); // 設定編碼
    $conn->query('SET time_zone = "+8:00"'); // 設定台灣時間
    ?> -->


<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
if (!empty($password)){

// Create connection
$conn = new mysqli('localhost:8889', 'root','root', 'test');
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "INSERT INTO account (username, password)
    values ('$username','$password')";
    
    if ($conn->query($sql)){
        echo "New record is inserted sucessfully";
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
    $conn->close();
}
}
else{
    echo "Password should not be empty";
    die();
}
}
else{
    echo "Username should not be empty";
    die();
}
?>