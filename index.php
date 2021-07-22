<!DOCTYPE html>
<html>
<head>
    <title>Form site</title>
</head>

<h1> 醫院管理系統 </h1> <br>

<body>

<a href="http://localhost:8888/txt.php">
  <button>input sql</button>
</a>
<br><br>

<form method="post" >

  <h3> 查詢 男性/女性 醫生資料 </h3> <br> 
  <form method="post">
    <select name="select_from">
        <option value="m">male</option>
        <option value="f">female</option>
    </select>
    <input type="submit" name="submit" value="select"/>


</form>
<br>

<?php
  if(isset($_POST['select_from'])){
      $sex = $_POST['select_from'];
      
      if($sex == 'm') $sql = "SELECT * FROM doctor where sex = 'm'";
      else $sql = "SELECT * FROM doctor where sex = 'f'";
  //    echo $sql;
      //connect
      $conn = new mysqli('localhost:8889', 'root','root', 'test');
    
  //    $sql = "SELECT * FROM doctor";
      $data = mysqli_query($conn, $sql);
  
      if($result=mysqli_fetch_array($data)){
        ?>
        <table>
          <tr>
            <td>id</td>
            <td>name</td>
            <td>age</td>
            <td>sex</td>
          </tr>
        <?php
        mysqli_data_seek($data, 0);
        while($result = mysqli_fetch_assoc($data)){
        //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
          echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['dname']."</td>
                <td>".$result['age']."</td>
                <td>".$result['sex']."</td>
              </tr>";
        }
      }
      else{
        echo "nothing";
      }
  }
?>
</table>

<form method="post">
  <h3> 新增、刪除、更新 病人資料 </h3> <br>
    Patient ID : <input type="text" name="username"><br><br>
    Patient Name : <input type="text" name="password"><br><br>
    Patient Sex: <input type="text" name="age"> (please input 'f' or 'm')<br><br>

      <input type="submit" name="delete"
      class="button" value="delete" />

      <input type="submit" name="insert"
      class="button" value="insert" />

      <input type="submit" name="update"
      class="button" value="update" />
      <br>

      <?php
      $pid = filter_input(INPUT_POST, 'username');
      $pname = filter_input(INPUT_POST, 'password');
      $psex = filter_input(INPUT_POST, 'age');
      
      //delete
      if(array_key_exists('delete', $_POST)) {
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        $sql = "DELETE FROM patient WHERE patient.`pid` = '$pid' ";
        $result = mysqli_query($conn, $sql);

        if ($conn->query($sql)){
            echo "New record is deleted successfully";
        }
        else{
             echo "Error: ". $sql ."
             ". $conn->error;
         }
        $conn->close();
      }

      //insert
      if(array_key_exists('insert', $_POST)) {
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        //echo "This is Button2 that is selected";
        $sql = "INSERT INTO patient (pid, pname, psex)
                values ('$pid','$pname', '$psex')";
        
        if ($conn->query($sql)){
            echo "New record is inserted successfully";
        }
        else{
            echo "Error: ". $sql ."
            ". $conn->error;
        }
        $conn->close();
      }

        //update
        if(array_key_exists('update', $_POST)) {
          
          $conn = new mysqli('localhost:8889', 'root','root', 'test');
          
          echo '$pname';
          $sql = "UPDATE patient SET pname = '$pname', psex = '$psex' 
                      WHERE patient.`pid` = '$pid'";
          $result = mysqli_query($conn, $sql);
          
          if ($conn->query($sql)){
              echo "New record is updated successfully";
          }
          else{
              echo "Error: ". $sql ."
              ". $conn->error;
          }
          $conn->close();
        }

      ?>
      <br><br>

</form>


<h3> 查詢 各科(非各科) 醫生資料 (IN, NOT IN) </h3> 
<form method="post" >
    <select name="in">
        <option value="眼科">眼科</option>
        <option value="外科">外科</option>
        <option value="內科">內科</option>
        <option value="皮膚科">皮膚科</option>
        <option value="心臟科">心臟科</option>
        <option value="大腸科">大腸科</option>
        <option value="家醫科">家醫科</option>
        <option value="骨科">骨科</option>
        <option value="神經科">神經科</option>
        <option value="小兒科">小兒科</option>
    </select>
    <br>
     <!-- <input type="submit" name="ins" value="in"/><br>  -->
    <!-- <input type="submit" name="submit" value="not-in"/>  -->
    
    <!-- <input type="submit" name="ins"
      class="button" value="in" /><br> -->
      <input type="submit" name="ins"
      class="button" value="in" /><br>

      <input type="submit" name="notin"
      class="button" value="not-in" /><br>

<?php
      $name = filter_input(INPUT_POST, 'in');
      //in
      if(array_key_exists('ins', $_POST)) {
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        echo "You choose $name";
        $sql = "SELECT * FROM doctor
                WHERE dnum IN (SELECT department.id
                              FROM department
                              WHERE name = '$name' ) ";
        $data = mysqli_query($conn, $sql);
    
        if($result=mysqli_fetch_array($data)){
          ?>
          <br><br>
          <table>
            <tr>
              <td>id</td>
              <td>name</td>
              <td>age</td>
              <td>sex</td>
            </tr>
          <?php
          mysqli_data_seek($data, 0);
          while($result = mysqli_fetch_assoc($data)){
          //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
            echo "<tr>
                  <td>".$result['id']."</td>
                  <td>".$result['dname']."</td>
                  <td>".$result['age']."</td>
                  <td>".$result['sex']."</td>
                </tr>";
          }
        }
        else{
          echo "nothing";
        }
    }
  
    //not in 
  //  $name = filter_input(INPUT_POST, 'notin');
    if(array_key_exists('notin', $_POST)) {
      $conn = new mysqli('localhost:8889', 'root','root', 'test');
      echo "You choose not $name";
      $sql = "SELECT *
            FROM doctor
            WHERE dnum NOt IN (SELECT department.id
                          FROM department
                          WHERE name = '$name' )";
    //  $sql = "SELECT * FROM doctor";
      $data = mysqli_query($conn, $sql);
  
      if($result=mysqli_fetch_array($data)){
        ?>
        <br><br>
        <table>
          <tr>
            <td>id</td>
            <td>name</td>
            <td>age</td>
            <td>sex</td>
          </tr>
        <?php
        mysqli_data_seek($data, 0);
        while($result = mysqli_fetch_assoc($data)){
        //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
          echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['dname']."</td>
                <td>".$result['age']."</td>
                <td>".$result['sex']."</td>
              </tr>";
        }
      }
      else{
        echo "nothing";
      }
      
  }
  ?>
</table>

</form>


<h3> 查詢 有(無)住院的病人資料 (Exist, NOT NOT Exist) </h3> 
<form method="post" >
    <select name="stay">
        <option value="yes">有住院</option>
        <option value="no">沒住院</option>
    </select>
    <br>
      <input type="submit" name="exist"
      class="button" value="exist" /><br>

      <input type="submit" name="notexist"
      class="button" value="not exist" /><br>


<?php
      $name = filter_input(INPUT_POST, 'stay');
      //in
      if(array_key_exists('exist', $_POST)) {
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        
        
        if($name == 'yes'){
          echo "You choose 有住院病人";
          $sql = "SELECT * FROM patient
          WHERE EXISTS
          (SELECT * FROM room WHERE room.pnum = patient.pid)" ;
        }
        else{
          echo "You choose 沒住院病人";
          $sql = "SELECT * FROM patient
          WHERE NOT EXISTS
          (SELECT * FROM room WHERE room.pnum = patient.pid)" ;
        }
        $data = mysqli_query($conn, $sql);
    
        if($result=mysqli_fetch_array($data)){
          ?>
          <br><br>
          <table>
            <tr>
              <td>id</td>
              <td>name</td>
              <!-- <td>age</td> -->
              <td>sex</td>
            </tr>
          <?php
          mysqli_data_seek($data, 0);
          while($result = mysqli_fetch_assoc($data)){
          //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
            echo "<tr>
                  <td>".$result['pid']."</td>
                  <td>".$result['pname']."</td>
                  <td>".$result['psex']."</td>
                </tr>";
          }
        }
        else{
          echo "nothing";
        }
    }

  ?>
</table>
<?php
if(array_key_exists('notexist', $_POST)) {
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        
        
        if($name == 'yes'){
          echo "You choose 有住院病人";
          $sql = "SELECT * FROM patient
          WHERE EXISTS
          (SELECT * FROM room WHERE room.pnum = patient.pid)" ;
        }
        else{
          echo "You choose 沒住院病人";
          $sql = "SELECT * FROM patient
          WHERE NOT EXISTS
          (SELECT * FROM room WHERE room.pnum = patient.pid)" ;
        }
        $data = mysqli_query($conn, $sql);
    
        if($result=mysqli_fetch_array($data)){
          ?>
          <br><br>
          <table>
            <tr>
              <td>id</td>
              <td>name</td>
              <!-- <td>age</td> -->
              <td>sex</td>
            </tr>
          <?php
          mysqli_data_seek($data, 0);
          while($result = mysqli_fetch_assoc($data)){
          //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
            echo "<tr>
                  <td>".$result['pid']."</td>
                  <td>".$result['pname']."</td>
                  <td>".$result['psex']."</td>
                </tr>";
          }
        }
        else{
          echo "nothing";
        }
    }

  ?>
</table>
</form>


<h3> 查詢 病人、醫生 數量 </h3> <br>  
<form method="post">
    <select name="who"> 
        <option value="doctor">doctor</option>
        <option value="patient">patient</option>
    </select>
    <br><br>

    <input type="submit" name="count"
      class="button" value="Count" /><br>

<?php
     $getwho = filter_input(INPUT_POST,'who');
     
      if(array_key_exists('count', $_POST)) {
      //  echo $getwho;        
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        $sql = "SELECT COUNT(*) as 'count' FROM $getwho ";
        $result = mysqli_query($conn, $sql);
       
        $row = $result->fetch_assoc();
        mysqli_close($con);
        echo $row["count"];    
        }
        mysqli_close($con);
?>
</form>
<br>

  
<h3> 查詢 病人、醫生、護士年齡 </h3> <br>
<form method="post">
    <select name="who"> 
        <option value="doctor">doctor</option>
        <option value="patient">patient</option>
    </select>
    <br><br>

    <input type="submit" name="button1"
      class="button" value="Sum" /><br><br>
      <?php
      if(array_key_exists('button1', $_POST)) {
        // Create connection
        $getwho = filter_input(INPUT_POST,'who');
      
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else{
            
            $sql = "SELECT Sum(age) as 'sum' from $getwho";
            
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);

            echo "Sum of age: ".$data['sum'];
            
        }
      }
      ?>
      <br><br>

    <input type="submit" name="button2"
      class="button" value="Max" /><br><br>
      <?php
      if(array_key_exists('button2', $_POST)) {
        $getwho = filter_input(INPUT_POST,'who');
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        //echo "This is Button2 that is selected";
        $sql = "SELECT Max(age) as 'sum' from $getwho";
          
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        echo "Max of age: ".$data['sum'];
      }
      ?>
      <br><br>

    <input type="submit" name="button3"
      class="button" value="Min" /><br><br>
      <?php
      if(array_key_exists('button3', $_POST)) {
        $getwho = filter_input(INPUT_POST,'who');
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        //echo "This is Button2 that is selected";
        $sql = "SELECT Min(age) as 'sum' from $getwho";
          
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        echo "Min of age: ".$data['sum'];
      }
      ?>
      <br><br>

    <input type="submit" name="button4"
      class="button" value="Avg" /><br><br>
      <?php
      if(array_key_exists('button4', $_POST)) {
        $getwho = filter_input(INPUT_POST,'who');
        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        //echo "This is Button2 that is selected";
        $sql = "SELECT Avg(age) as 'sum' from $getwho";
          
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        echo "Avg of age: ".$data['sum'];
      }
      ?>
      <br><br>

    
</form>



<h3> 查詢 超過幾位醫生 的部門</h3>
<form method="post">
    <select name="who"> 
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <br><br>
    <input type="submit" name="having"
      class="button" value="having" /><br><br>
      
      <?php
      if(array_key_exists('having', $_POST)) {
        // Create connection
        $getwho = filter_input(INPUT_POST,'who');
        echo "超過$getwho";

        $conn = new mysqli('localhost:8889', 'root','root', 'test');
        if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else{
            $sql =  " SELECT COUNT(d.id), dnum
                      FROM doctor d
                      GROUP BY dnum
                      HAVING COUNT(d.id) > 1";

            $data = mysqli_query($conn, $sql);
            if($result=mysqli_fetch_array($data)){
              ?>
              <table>
                <tr>
                  <td>幾位醫生</td>
                  <td>部門ID</td>
                    
                </tr>
              <?php
              mysqli_data_seek($data, 0);
              while($result = mysqli_fetch_assoc($data)){
              //  echo $result['id']." ".$result['dname']." ".$result['age']."</br>";
                echo "<tr>
                      <td>".$result['COUNT(d.id)']."</td>
                      <td>".$result['dnum']."</td>       
                    </tr>";
              }
            }
            else{
              echo "nothing";
            }
        }
      }
      ?>
<form>
<table>


</body>

</html>