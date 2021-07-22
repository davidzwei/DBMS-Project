<!DOCTYPE html>
<html>
<head>
    <title>input txt</title>
</head>

<h1> 醫院管理系統 </h1> <br>
<h2> Input SQL Instruction!</h2> <br>

<body>

<a href="http://localhost:8888/index.php">
  <button>home</button>
</a>

<h3> Input Select-from-where!</h3>
<form  method="POST">
  <textarea name="text" rows="4" cols="100"></textarea>
  <br>
  <input type="submit" name="select"
      class="button" value="select" />
  <br>

  <?php
  if(array_key_exists('select', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
    
      $data = mysqli_query($conn, $sql);
  //    $row = mysqli_num_rows($data);
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
}
  ?>
  </table>
</form>

<h3> Delete!</h3>
<form  method="POST">
  <textarea name="text" rows="4" cols="100"></textarea>
  <br>
  <input type="submit" name="delete"
      class="button" value="delete" />

  <?php
  if(array_key_exists('delete', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      echo $sql;
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
  }
}
  ?>  
</form>

<h3> Insert!</h3>
<form  method="POST">
  <textarea name="text" rows="4" cols="100"></textarea>
  <br>
  <input type="submit" name="insert"
      class="button" value="insert" />

  <?php
  if(array_key_exists('insert', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
      echo "insert successfully";
  }
}
  ?>  
</form>

<h3> Update!</h3>
<form  method="POST">
  <textarea name="text" rows="4" cols="100"></textarea>
  <br>
  <input type="submit" name="update"
      class="button" value="update" />

  <?php
  if(array_key_exists('update', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
  }
}
  ?>  
</form>



<h3> In!</h3>
<form  method="POST">
  <textarea name="text" rows="5" cols="100"></textarea>
  <br>
  <input type="submit" name="in"
      class="button" value="in" />

  <?php
  if(array_key_exists('in', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      echo $sql;
      
      $result = mysqli_query($conn, $sql);
      // $data = mysqli_fetch_assoc($result);
      
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
  }

  ?>  
</form>
<table>


<h3> Not In!</h3>
<form  method="POST">
  <textarea name="text" rows="5" cols="100"></textarea>
  <br>
  <input type="submit" name="notin"
      class="button" value="notin" />

  <?php
  if(array_key_exists('notin', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      
      $result = mysqli_query($conn, $sql);
      // $data = mysqli_fetch_assoc($result);
      
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
  }
  ?>
  <table>  
</form>

<h3> Exist!</h3>
<form  method="POST">
  <textarea name="text" rows="5" cols="100"></textarea>
  <br>
  <input type="submit" name="exist"
      class="button" value="exist" />

  <?php
  if(array_key_exists('exist', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"];
      
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
}
?>
</table>
</form>


<h3> Not Exist!</h3>
<form  method="POST">
  <textarea name="text" rows="5" cols="100"></textarea>
  <br>
  <input type="submit" name="notexist"
      class="button" value="not exist" />

  <?php
  if(array_key_exists('notexist', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      
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
}
?>
</table>
</form>


<h3> Count!</h3>
<form  method="POST">
  <textarea name="text" rows="3" cols="100"></textarea>
  <br>
  <input type="submit" name="count"
      class="button" value="count" />

  <?php
  if(array_key_exists('count', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      echo "<br>";
      $result = mysqli_query($conn, $sql);
      
      $row = $result->fetch_assoc();
      mysqli_close($con);
      echo $row["count"];    
      
      mysqli_close($con);
  }
}
?>
</form>

<h3> Sum!</h3>
<form  method="POST">
  <textarea name="text" rows="3" cols="100"></textarea>
  <br>
  <input type="submit" name="sum"
      class="button" value="sum" />

  <?php
  if(array_key_exists('sum', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      echo "<br>";
      $result = mysqli_query($conn, $sql);
      
      $row = $result->fetch_assoc();
      mysqli_close($con);
      echo $row["sum"];    
      
      mysqli_close($con);
  }
}
?>
</form>

<h3> Max!</h3>
<form  method="POST">
  <textarea name="text" rows="3" cols="100"></textarea>
  <br>
  <input type="submit" name="max"
      class="button" value="max" />

  <?php
  if(array_key_exists('max', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      echo "<br>";
      $result = mysqli_query($conn, $sql);
      
      $row = $result->fetch_assoc();
      mysqli_close($con);
      echo $row["max"];    
      
      mysqli_close($con);
  }
}
?>
</form>

<h3> Min!</h3>
<form  method="POST">
  <textarea name="text" rows="3" cols="100"></textarea>
  <br>
  <input type="submit" name="min"
      class="button" value="min" />

  <?php
  if(array_key_exists('min', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      echo "<br>";
      $result = mysqli_query($conn, $sql);
      
      $row = $result->fetch_assoc();
      mysqli_close($con);
      echo $row["min"];    
      
      mysqli_close($con);
  }
}
?>
</form>

<h3> Avg!</h3>
<form  method="POST">
  <textarea name="text" rows="3" cols="100"></textarea>
  <br>
  <input type="submit" name="min"
      class="button" value="min" />

  <?php
  if(array_key_exists('min', $_POST)) {
  
  $conn = new mysqli('localhost:8889', 'root','root', 'test');
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $sql = $_POST["text"]; //get input
      echo "<br>";
      $result = mysqli_query($conn, $sql);
      
      $row = $result->fetch_assoc();
      mysqli_close($con);
      echo $row["avg"];    
      
      mysqli_close($con);
  }
}
?>
</form>


</form>
<h3> Having!</h3>
<form  method="POST">
  <textarea name="text" rows="5" cols="100"></textarea>
  <br>
  <input type="submit" name="having"
      class="button" value="having" />

  <?php
  if(array_key_exists('having', $_POST)) {
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
        
        $sql = $_POST["text"]; //get input
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