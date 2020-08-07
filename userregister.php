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
</br></br>
<form action="register.php" method="POST">
  <label>First Name</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="firstname" maxlength="20" size="30"/></br></br>
  <label>Last Name</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lastname" maxlength="20" size="30"/></br></br>
  <label>User Name</label>&nbsp;&nbsp;<input type="text" name="username" maxlength="20" size="30"/></br></br>
  <label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" maxlength="20" size="30"/></br></br>
  <label>Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" maxlength="20" size="30"/></br></br>
</br>	 
 <input type="hidden" name="source" value="web" />
          <input type="submit" value="Register"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="submit" value="Already have account? Login" formaction="userlogin.php"/>
</form>
<?php
    session_start();
    $_SESSION['loginfail'] = "";
    echo  $_SESSION['registerfailed'];
?>
</div>
</body>

</html>

