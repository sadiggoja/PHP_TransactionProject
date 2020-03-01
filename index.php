<?php
require 'connection.php';
if(isset($_POST['submit'])){
  $transactionAmount=mysqli_real_escape_string($mysql, $_POST['amount']);
  $transactionDate=mysqli_real_escape_string($mysql, $_POST['date']);
  $idCategory=mysqli_real_escape_string($mysql, $_POST['cat']);
  $idPayment=mysqli_real_escape_string($mysql, $_POST['pay']);

  $query= "INSERT INTO transactions(transactionAmount,transactionDate,idCategory,idPayment) VALUES ('$transactionAmount','$transactionDate','$idCategory','$idPayment')"  ;
  $result = $mysql->query($query);
  header("Location: addtransaction.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/index2.css">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>


</head>
<body>
  <div class="form-style-8">
    <h2>ADD  TRANSACTION</h2>
    <form action="index.php" method="POST">
      
      <input type="number" name="amount" placeholder="Amount please..." />
      <input type="date" name="date"/>
        <?php  
          require 'connection.php';
          $query_ak='SELECT  idCategory,category FROM categories';
          $result = $mysql->query($query_ak);
       ?>
      <select name="cat">
          <?php
            while ($r =  $result->fetch_assoc()){
              echo '<option value="'.$r['idCategory'].'">'.$r['category'].'</option>';
            }
          ?> 
          <?php
            $query_a='SELECT  idPayment,paymentMethod FROM payments';
            $resulr = $mysql->query($query_a);
          ?>
      </select>
      <select name="pay">
        <?php
           while ($m = $resulr->fetch_assoc()){
             echo '<option value="'.$m['idPayment'].'">'.$m['paymentMethod'].'</option>';
           }
        ?>
      </select>
      <input type="submit" name="submit" value="ADD" />

      <a href="addtransaction.php">see table</a>
    </form>
  </div>
  <script type="text/javascript">
  //auto expand textarea
  function adjust_textarea(h) {
      h.style.height = "20px";
      h.style.height = (h.scrollHeight)+"px";
  }
  </script>
</body>
</html>