<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      a{
        text-decoration: none;
      }
      .nav{
        background-color: #ddd;
        padding-left: 80px;
        padding-right: 80px;
        padding-top: 8px;
        padding-bottom: 8px;
      }
      .outer{
        padding: 60px;
        margin-bottom: 20px;
      }
      .dropdown{
        float: right;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }
      .show {
        display: block;
      }
      .dropbtn {
        background-color: #ddd;
        color: black;
        padding: 4px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }

      * {
        box-sizing: border-box;
      }
      .tabs{
        width: 20%;
        float: left;
        padding-left: 96px;
        /* border-right: 3px solid #ddd; */
      }
      .tabs a{
        color: #8e8f99;
      }
      .tabs a:hover{
        color: #4db8ff;
      }
      #profile{
        color: #4db8ff;
      }
      .profile_body{
        width: 60%;
        float: left;
        padding: 24px;
        padding-left: 40px;
        margin-top: 32px;
      }
      .details{
        border-radius: 4px;
        border: 2px solid #eee;
      }
      .details p{
        background: #eee;
        padding: 8px;
        margin-top: 0px;
      }
      .profile_inner{
        margin: 24px;
      }
      input {
        width: 100%;
        padding: 4px 5px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .update_btn{
      background-color: #285feb;
      color: white;
      padding: 8px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 8px;
    }
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>

  <body>

    <?php
       $data = file_get_contents('G:\xampp\htdocs\Paid_Internship\profile.json');
       $array1 = json_decode($data, true);
     ?>

     <?php
        $array1["first_name"] = $_POST["first_name"];
        $array1["last_name"] = $_POST["last_name"];
        $array1["address"] = $_POST["address"];
        $array1["phone"] = $_POST["phone"];

        $newJsonString = json_encode($array1);
        file_put_contents('profile.json', $newJsonString);
      ?>


    <div class = "outer">

      <div class = "nav" >
        Advanced Security
        <div class="dropdown">
          <button class="dropbtn" onclick="drop_fun()">Welcome,<?php echo $array1["first_name"]; ?>
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content" id="myDropdown">
            <a href="profile.php" class = "fa fa-user" > My Profile</a>
            <a href="login.php" class = "fa fa-sign-out" > Logout</a>
          </div>
        </div>
      </div>

      <div class = "tabs">
        <br><br><a href = "main.php" class = "fa fa-home" >  Home</a>
        <br><br><a href = "profile.php" class = "fa fa-user " id = "profile">  My Profile</a>
        <br><br><a href = "#" class = "fas fa-users" >  Users</a>
        <br><br><a href = "#" class = "fas fa-user-tie" >  User Roles</a>
      </div>

      <div class = "profile_body">
        <div class = "details">
          <p>Your Details</p>
          <div class = "profile_inner">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              First Name<br>
              <input type="text" name="first_name" value = "<?php echo $array1["first_name"];?>" >
              <br><br>
              Last name<br>
              <input type="text" name="last_name" value = "<?php echo $array1["last_name"];?>" >
              <br><br>
              Address<br>
              <input type="text" name="address" value = "<?php echo $array1["address"];?>" >
              <br><br>
              Phone<br>
              <input type="text" name="phone" value = "<?php echo $array1["phone"];?>" >
              <br><br>
              <button type = "submit" class="update_btn" onclick="update_fun()" >
                Update
              </button>
            </form>
          </div>
        </div>
      </div>

    </div>

    <script>

      function drop_fun() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
          if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
          }
        }
      }
    </script>

  </body>

</html>
