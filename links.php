<table width="100%" border="0" cellspacing="5" cellpadding="5"> 
  <tr>
    <td width="17%"><img src="images/application_home.png" width="20" height="20"></td>
    <td width="83%"><a href="home.php"><h3>Home</h3></a></td>
  </tr>
  <?php
 	if($_SESSION['adminTypeId']==1){ ?>
      <tr>
        <td><img src="images/connect.png" width="25" height="25" /></td>
        <td><a href="reg_project.php"><h3>Register Project</h3></a></td>
      </tr>
      <tr>
        <td><img src="images/icons/user.png" width="25" height="25" /></td>
        <td><a href="reg_user.php"><h3>Register User</h3></a></td>
      </tr>
  <?php } ?>  
  <tr>
    <td><img src="images/connect.png" width="25" height="25" /></td>
    <td><a href="logcalls.php"><h3>Log fault Calls</h3></a></td>
  </tr>
  <tr>
    <td><img src="images/magnifier.png" width="25" height="25" /></td>
    <td><a href="allcalls.php"><h3>View Logs</a></h3></td>
  </tr>
  <tr>
    <td><img src="images/icons/user.png" width="25" height="25" /></td>
    <td><a href="updateprofile.php"><h3>Update Profile</a></h3></td>
  </tr> 
  <tr>
    <td><img src="images/icons/user.png" width="25" height="25" /></td>
    <td><a href="changepassword.php"><h3>Change Password</a></h3></td>
  </tr>  
  <tr>
    <td><img src="images/disconnect.png" width="25" height="25"></td>
    <td><a href="logout.php"><h3>Logout</a></h3></td>
  </tr>
</table>
