<?php include_once("htmlParts/header.php");?>
      <div>
        <h1>WELCOME IN LEVEL 4</h1>
        <p>Do you know password?</p>
        <img src="../images/meme1.jpg">
      </div>
        <script>
            var a = 1+'1';
            var b = 11-'1';
            var password = a+b;           
        </script>
      <div>
           <form class="mui-form--inline" action= "../index.php" method="GET">
              <div class="mui-textfield">
              <input type="password" name="pass">
            </div>
            <br>
            <br>
            <input class="mui-btn mui-btn--flat" type="submit" value="Confirm">
        </form>
        <br><br>
      </div>
<?php include_once("htmlParts/footer.php");?>
 