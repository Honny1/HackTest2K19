<?php

   include('../controlDatabase/connectDatabase.php');
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // user_name, password and email sent from form 
      
      $user_name = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $email = mysqli_real_escape_string($db,$_POST['email']);  
      
   
      $sql = "SELECT COUNT( * ) count FROM `user` GROUP BY name HAVING name = '$user_name'";
      $result = mysqli_query($db,$sql);
      $data= mysqli_fetch_array($result);
      $count =$data['count'];

      // If result not matches $user_name, table row must be 0 row

      if($count == 0) {
         $sql = "INSERT INTO user (name,pass,email) VALUES ('$user_name','$password','$email')";
         if ($db->query($sql) === TRUE) {
             header("location: ../index.php");
         } else {
            echo "Error: " . $sql . "<br>" . $db->error;
         }
      }else {
         $error = "Your Login Name is used";
         }
      mysqli_close($db);
      }
?>
<html>

<head>
   <title>HACK_TEST_2020</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../css/mui.min.css" rel="stylesheet" type="text/css" />
   <script src="../js/mui.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />
</head>

<body>
   <h1>WELCOME TO THE REGISTRATION FOR HACK_TEST</h1>
   <br/>
   <div align="center">
      <div style="width:300px; border: solid 1px #ffffff;" align="left">
         <div style="background-color:#ffffff; color:#000000; padding:3px;"><b>Register</b></div>
         <div style="margin:30px">
            <p style="color:#ff0000;" align="center">POZOR!!!<br /> Použij skutečný email a heslo/a které nepoužíváš
               normálně(neco jako 1234 je ideál) :D</p>
            <form class="mui-form--inline" action="" method="post">
               <label>UserName:</label>
               <div class="mui-textfield"><input type="text" name="username" class="box" required /></div><br /><br />
               <label>Password:</label>
               <div class="mui-textfield"><input type="password" name="password" class="box" required /></div>
               <br /><br />
               <label>Email:</label>
               <div class="mui-textfield"><input type="email" name="email" class="box" required /></div><br /><br />
               <input class="mui-btn mui-btn--raised" type="submit" value="Confirm" /><br />
            </form>
            <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
   <br />
   <a href="http://purkiada.sspbrno.cz/Matrix10/">BACK TO /HOME</a>
   <br />
   <a href="../index.php">LOGIN</a>
   <p>By: Hony</p>
</body>

</html>