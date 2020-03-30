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
      #home{
        color: #4db8ff;
      }
      .comment_wall{
        width: 80%;
        float: left;
        padding: 20px;

      }
      .comment{
        border-left: 2px solid #ddd;
        padding-left: 8px;
      }
      .leave_comment{
        width: 80%;
        float: right;
        padding: 20px;

      }
      .txt_area:hover{
        border: 1px solid #06a0c7;
      }
      .fa-comment{
        color: white;
      }
      .cmt_btn{
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
    <!-- <?php
    echo "input is ";
    $name = $pwd = "";
      $name = $_SESSION["name"];
      $pwd = $_SESSION["pwd"];
      echo $name;
      echo $pwd;
     ?> -->

     <?php
        $data = file_get_contents('G:\xampp\htdocs\Paid_Internship\data.json');
        $array = json_decode($data, true);
      ?>

      <?php
         $cmt = "";
         $cmt = $_POST["text_area"];
       ?>
    <div class = "outer">

      <div class = "nav" >
        Advanced Security
        <div class="dropdown">
          <button class="dropbtn" onclick="drop_fun()">Welcome,<?php echo $array["name"]; ?>
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content" id="myDropdown">
            <a href="profile.php" class = "fa fa-user" > My Profile</a>
            <a href="login.php" class = "fa fa-sign-out" > Logout</a>
          </div>
        </div>
      </div>

      <div class = "tabs">
        <br><br><a href = "main.php" class = "fa fa-home" id = "home">  Home</a>
        <br><br><a href = "profile.php" class = "fa fa-user" >  My Profile</a>
        <br><br><a href = "#" class = "fas fa-users" >  Users</a>
        <br><br><a href = "#" class = "fas fa-user-tie" >  User Roles</a>
      </div>

      <div class = "comment_wall">
        <h1>Comments Wall </h1>
        <div class="comment">
          <p><?php echo $cmt ?></p>
          <p> <b>--<?php echo $array["name"]; ?> </b> <i> <?php echo " at " .date("Y-m-d")."  ".date("H:i:s") ; ?> </i> </p>
        </div>
        <div class="comment">
          <p>fjkdd</p>
          <p> <b>--<?php echo $array["name"]; ?></b> <i> at 2020-03-29 14:12:04</i> </p>
        </div>
        <div class="comment">
          <p>gm,dfnsgmf</p>
          <p> <b>--<?php echo $array["name"]; ?> </b> <i> at 2020-03-29 14:11:56</i> </p>
        </div>
        <div class="comment">
          <p>fdngkfdsj</p>
          <p> <b>--<?php echo $array["name"]; ?> </b> <i> at 2020-03-29 14:10:02</i>  </p>
        </div>
        <div class="comment">
          <p>cggdskgjf</p>
          <p> <b>--<?php echo $array["name"]; ?> </b> <i> at 2020-03-29 14:09:04</i>  </p>
        </div>
        <div class="comment">
          <p>gkdsgkf</p>
          <p> <b>--<?php echo $array["name"]; ?> </b> <i> at 2020-03-29 14:09:01</i>  </p>
        </div>


      </div>

      <div class = "leave_comment">
        <h2>Leave Comment</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <textarea class="txt_area" name="text_area" rows="4" cols="120"></textarea><br>
          <!-- <input type="submit" name="submit" value = "comment" > -->
          <button type = "submit" class="cmt_btn" >
            <i class="fas fa-comment"></i> Comment
          </button>
        </form>
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
