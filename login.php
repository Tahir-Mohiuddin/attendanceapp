<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>LoginPage</title>
</head>
<body>
   <div class="loginform">
      <div class="inputgroup">
         <input type="text" id="txtusername" required>
         <label for="txtusername":id="lbusername" >Username</label>
      </div>

      <div class="inputgroup topmargin">
         <input type="password" id="txtpassword" required>
         <label for="txtpassword":id="lbpassword">password</label>
      </div>

      <div class="divecallforeaction">
        <button class="btnlogin inactivecolor" id="btnLogin">Login</button>
      </div>
   </div>
   <script src="js/jquery.js"></script>
   <script src="js/login.js"></script>
</body>
</html>