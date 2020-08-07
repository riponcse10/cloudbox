<html>
<head>
<style type="text/css">
.upload-wrap{
    width: 450px;
    margin: 60px auto;
    padding: 30px;
    background-color: #F3F3F3;
    overflow: hidden;
    border: 1px solid #ddd;
    text-align: center;
}
</style>
</head>

<body>
<div class="upload-wrap">
<img src="cloudbox.png" width="150" height="135"/> 
</br>
</br>
<form action="login.php" method="POST">
  <label> User Name </label>&nbsp;&nbsp;<input type="text" name="username" maxlength="20" size="30"/></br></br>
  <label> Password   </label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" maxlength="20" size="30"/></br></br>
  </br></br>
  <input type="submit" value="Login"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" value="Don't have account? Register" formaction="userregister.php"/>
          <input type="hidden" name="source" value="web" />

</form>
<?php
    session_start();
    $_SESSION['registerfailed'] = "";
    echo  $_SESSION['loginfail'];
?>
</div>
</body>

</html>

