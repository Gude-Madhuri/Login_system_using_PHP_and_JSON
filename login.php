<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

      #login_outer{
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
      }
      #login{
        border-style: solid;
        border-color: #DCDCDC;
        padding: 20px;

      }
      input[type=text], input[type=password] {
        width: 280px;
        padding: 4px 5px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
      input[type=submit]{
        background-color: #4CAF50;
        color: white;
        padding: 6px 6px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 280px;
      }
      a{
        color: #4db8ff;
      }

      .fa {
        padding: 5px;
        font-size: 12px;
        width: 12px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
      }

      .fa:hover {
          opacity: 0.8;
      }

      .fa-facebook {
        background: #3B5998;
        color: white;
      }

      .fa-twitter {
        background: #55ACEE;
        color: white;
      }

      .fa-google {
        background: white;
        color: #dd4b39;
        font-size: 18px;
      }

      .error {color: #FF00FF;}
    </style>
  </head>

  <body>

    <?php

      $nameErr = $pwdErr = "";
      $name = $pwd = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
        }

        if (empty($_POST["pwd"])) {
          $pwdErr = "Password is required";
        } else {
          $pwd = test_input($_POST["pwd"]);
        }

      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    ?>
    <div id = "login_outer" >
      <h2>Advanced Security</h2>
      <div id="login" >
        <h4>LOGIN</h4>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          Name
          <br>
          <input type="text" name="name" value="<?php echo $name;?>">
          <span class="error"> <?php echo $nameErr;?></span>
          <br><br>
          Password
          <br>
          <input type="password" name="pwd">
          <span class="error"> <?php echo $pwdErr;?></span>
          <br>
          <a href = "#">Forgot Password?</a>
          <br><br><br>

          <input type="submit" name="submit" value = "login" onclick=" location.href:'main.php' ">
          <p><center>or connect with</center></p>

          <div>
            <center>
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-google"></a>
            </center>
          </div>

        </form>
      </div>
      <br>
      <center>Don't have an account ? <a href= "#" >Sign Up</a></center>
    </div>

    <?php

    if(isset($_POST['submit'])) {
        $file = "data.json";
        $arr = array(
            'name'     => $_POST['name'],
            'pwd'    => $_POST['pwd']
        );
        $json_string = json_encode($arr);
        file_put_contents($file, $json_string);
        // echo $json_string;
      }
     ?>

  </body>

</html>
