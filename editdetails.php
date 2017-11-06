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
	$message = $admin->updateDetails();
}
$edit = $admin->getDetailsEdit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/script.js"></SCRIPT>
 <script src="js/Util.js" type="text/javascript"></script>
  <link href="Suggest/css/style.css" rel="stylesheet" type="text/css">
<title>Homespike Administrator Portal</title>
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
                  <td class="views">Edit Details of Call from<?php echo " ". base64_decode($_GET['client']). " ( ".  base64_decode($_GET['phone'])." )"." From ".base64_decode($_GET['location']);?></td>
                  </tr>
                <tr>
                  <td><form id="form1" name="form1" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr>
                        <td colspan="2"><?php if (isset($message))echo $message;?></td>
                      </tr>
                      <tr>
                        <td width="37%">Client</td>
                        <td width="63%"><input name="cl" type="text" class="widths" id="cl" value="<?php echo $edit['client'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%">Project Code</td>
                        <td width="63%"><input name="pc" type="text" class="widths" id="pc" value="<?php echo $edit['project_code'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%">Email</td>
                        <td width="63%"><input name="email" type="text" class="widths" id="email" value="<?php echo $edit['email'];?>" /></td>
                      </tr>
					  <tr>
                        <td width="37%">Phone Number</td>
                        <td width="63%"><input name="phone" type="text" class="widths" id="phone" pattern="[0-9]{11,}" maxlength="11" value="<?php echo $edit['phone'];?>" /></td>
                      </tr>
                      <tr>
                        <td width="37%">Description of Fault calls</td>
                        <td width="63%"><input name="desc" type="tex" class="widths" id="desc" value="<?php echo $edit['call_description'];?>" /></td>
                      </tr>
                      <tr>
                        <td width="37%">Location</td>
                        <td width="63%"><input name="location" type="text" class="widths" id="location" value="<?php echo $edit['location'];?>" /></td>
                      </tr>
                      <td >Status</td>
						<td width="20%"><select name="status" id="status" value="<?php echo $edit['status'];?>" />
                          <option value="<?php echo $edit['status'];?>"><?php echo $edit['status'];?></option>
                          <option value="Open">Open</option>
						  <option value="Closed">Closed</option>					  
						</select></td>
                      </tr>
                      <tr>
					  <td >Severity</td>
						<td width="20%"><select name="severity" id="severity" value="<?php echo $edit['severity'];?>" />
                          <option value="<?php echo $edit['severity'];?>"><?php echo $edit['severity'];?></option>
                          <option value="Normal">Normal</option>
						  <option value="Urgent">Urgent</option>
                          <option value="Critical">Critical</option>					  
						</select></td>
                      </tr>                      
					  <tr>
                        <td>&nbsp;</td>
                        <td><input name="pn" type="hidden" id="pn" value="<?php echo $_GET['phone'];?>" />
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