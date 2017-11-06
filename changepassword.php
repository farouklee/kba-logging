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
	$message = $admin->changePassword();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/script.js"></SCRIPT>
 <script src="js/Util.js" type="text/javascript"></script>
  <link href="Suggest/css/style.css" rel="stylesheet" type="text/css">
<title>E_logging Portal</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #f00; text-decoration:none;
font-size:12px}
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
            	<td align="right" class="style1">Welcome Admin <?php echo $loggedAdmin['surname'].' '.$loggedAdmin['firstName'];?></td>
             </tr>
                <tr>
                  <td class="views">Change Password</td>
                  </tr>
                <tr>
                  <td><form id="form1" name="form1" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr>
                        <td colspan="2"><?php if (isset($message))echo $message;?></td>
                        </tr>
                      <tr>
                        <td width="35%"><h3>Old Password</h3></td>
                        <td width="65%"><input name="oldPassword" type="password" class="widths" id="oldPassword" /></td>
                      </tr>
                      <tr>
                        <td><h3>New Password</h3></td>
                        <td><input name="newPassword" type="password" class="widths" id="newPassword" /></td>
                      </tr>
                      <tr>
                        <td><h3>Re-type new Password</h3></td>
                        <td><input name="newPassword2" type="password" class="widths" id="newPassword2" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" id="Submit" value="Change Password" /></td>
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
              <td>&nbsp;</td>
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