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
    $messageReport = $admin->logCalls();
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
<title>E_Logging Portal</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.pagination {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="300px">
        <tr valign="top">
          <td width="16%" class="container"><?php include_once("links.php");?>&nbsp;</td>
          <td width="84%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
            	  <td align="right" class="style1">Welcome Admin <?php echo $loggedAdmin['surname'].' '.$loggedAdmin['firstName'];?></td>
                </tr>
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
                <tr>
                  <td class="views">Log Fault Calls</td>
                </tr>
                <tr>
                  <td><form id="form2" name="form2" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <?php if(isset($messageReport)){?>
						<tr>
							<td colspan="2"><?php echo $messageReport ;?></td>
						</tr><?php } ?>		                      			
                      <tr id="st">
                        <td width="50%"><h3>Name of Client </h3></td>
                        <td width="50%"><input name="cl" type="text" class="widths" id="cl" /></td>
                      </tr>
                      <tr>
                        <td><h3>Project Code</h3></td>
                        <td><input name="pc" type="text" class="widths" id="pc" /></td>
                      </tr>					  
                      <tr>
                        <td><h3>Email Address</h3></td>
                        <td><input name="email" type="text" class="widths" id="email" /></td>
                      </tr>
                      <tr>
                        <td><h3>Phone Number</h3></td>
                        <td><input name="phone" type="text" class="widths" id="phone" pattern="[0-9]{11,}" maxlength="11" placeholder="e.g 080xxxxxxxx" /></td>
                      </tr>
                      <tr>
                        <td><h3>Description of Fault Call</h3></td>
                        <td><textarea name="desc" id="desc" rows="10" cols="50"></textarea></td>
                      </tr>  
                      <tr>
                        <td><h3>Location</h3></td>
                        <td><input name="location" class="widths" id="location" /></td>
                      </tr>                                            			  
                       <tr>
					  <td ><h3>Status</h3></td>
						<td width="20%"><select name="status" id="status">
                          <option value="">--Status--</option>
                          <option value="Open">Open</option>
						  <option value="Closed">Closed</option>					  
						</select></td>
                      </tr>
                      <tr>
					  <td ><b>Severity</b></td>
						<td width="20%"><select name="severity" id="severity">
                          <option value="">--Severity--</option>
                          <option value="Normal">Normal</option>
						  <option value="Urgent">Urgent</option>
                          <option value="Critical">Critical</option>					  
						</select></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><b><input type="submit" name="Submit" id="Submit" value="Register" /></b></td>
                      </tr>
					  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>					  
                    </table>
                  </form></td>
                </tr>
              </table></td>
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