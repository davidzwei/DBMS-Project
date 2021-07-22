<html>

<body>


<?php
// Create connection
$conn = new mysqli('localhost:8889', 'root','root', 'test');
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "INSERT INTO `patient` (`pid`, `pname`, `psex`) VALUES ('4', 'p2', 'f')";
    $sql = "    UPDATE `patient` SET `pname` = 'Sam' WHERE `patient`.`pid` = 1";
    
    $sql = "SELECT FNAME,LNAME,ADDRESS
      FROM EMPLOYEE
      WHERE DNO IN (SELECT DNUMBER
                            屬於 FROM DEPARTMENT
                                     WHERE DNAME = ‘Research’ ";

     $result = mysqli_query($conn, $sql);

    if ($conn->query($sql)){
        echo "New record is inserted sucessfully";
        echo $result;
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
    $conn->close();
}

?>


</body>
</html>