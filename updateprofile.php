<?php
session_start();
require_once("classes/DatabaseManager.php");
require_once("classes/Administrator.php");
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
$admin->validateAdmin();
$loggedAdmin = $admin->details();
if(isset($_POST['Submit']))
{
	$message = $admin->updateProfileDetails();
}
$edit = $admin->getProfileEdit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/script.js"></SCRIPT>
 <script src="js/Util.js" type="text/javascript"></script>
  <link href="Suggest/css/style.css" rel="stylesheet" type="text/css">
<title>E-logging Portal</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.pagination {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>

<body>
<table width="100%" height="500px" border="0" cellpadding="0" cellspacing="0" class="container">
  <tr valign="top">
    <td><table width="100%" height="100px" border="0" cellpadding="0" cellspacing="0" class="head">
      <tr>
        <td><?php include_once("header.php");?></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="350px">
        <tr valign="top">
          <td width="16%" class="container"><?php include_once("links.php");?>&nbsp;</td>
          <td width="84%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
                <tr>
                  <td class="views">Edit Details of <?php echo " ". $loggedAdmin['surname']." ". $loggedAdmin['firstName']." ( ".  $loggedAdmin['phone']." )";?></td>
                  </tr>
                <tr>
                  <td><form id="form1" name="form1" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr>
                        <td colspan="2"><?php if (isset($message))echo $message;?></td>
                      </tr>
                      <tr>
                        <td width="37%"><h3>Surname</h3></td>
                        <td width="63%"><input name="sname" type="text" class="widths" id="sname" value="<?php echo $edit['surname'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%"><h3>First Name</h3></td>
                        <td width="63%"><input name="fname" type="text" class="widths" id="fname" value="<?php echo $edit['firstName'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%"><h3>Email</h3></td>
                        <td width="63%"><input name="email" type="text" class="widths" id="email" value="<?php echo $edit['email'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%"><h3>Phone Number</h3></td>
                        <td width="63%"><input name="phone" type="text" class="widths" id="phone" value="<?php echo $edit['phone'];?>" /></td>
                      </tr>
                      <tr>
                        <td width="37%"><h3>Username</h3></td>
                        <td width="63%"><input name="username" type="text" class="widths" id="username" value="<?php echo $edit['username'];?>" /></td>
                      </tr>
                      <tr>
					  <td ><h3>Location</h3></td>
						<td width="20%"><select name="location" id="location" value="<?php echo $edit['location'];?>" />                        
                          <option value="<?php echo $edit['location'];?>"><?php echo $edit['location'];?></option>
                          <option value="In House">In House</option>
						  <option value="V.I">V.I</option>
                          <option value="Port Harcourt">Port Harcourt</option>						  
						</select></td>
                      </tr>
                      <tr>
					  <td ><h3>Role</h3></td>
						<td width="20%"><select name="role" id="role"value="<?php echo $edit['roleId'];?>" />                         
                          <option value="<?php echo $edit['roleId'];?>"><?php if ($edit['roleId'] == 1) echo 'Engineer'; else echo 'Project manager';?></option>
                          <option value="1">Engineer</option>
						  <option value="2">project manager</option>					  
						</select></td>
                      </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td><input name="pn" type="hidden" id="pn"  />
                         <input type="submit" name="Submit" id="Submit" value="Edit" /></td>
                      </tr>
                    </table>
                  </form></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left" id="loading"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>            <p>&nbsp;</p></td>
        </tr>
    </table>
      <table width="100%" height="50px" border="0" cellpadding="0" cellspacing="0" class="foot">
        <tr valign="top">
          <td><?php include_once("footer.php");?>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<?php
$db->close();?>
</body>
</html>