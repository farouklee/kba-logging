<?php
session_start();
require_once("classes/DatabaseManager.php");
require_once("classes/Administrator.php");
require_once("classes/FaultCalls.php");
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
$faultcalls = new FaultCalls($db->getConnection());
$admin->validateAdmin();
$loggedAdmin = $admin->details();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Logging Portal</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style1 {color: #f00; text-decoration:none;
font-size:12px}
</style>
</head>
<body id='newer'>
<table width="100%" height="500px" border="0" cellpadding="0" cellspacing="0" class="container">
  <tr valign="top">
    <td><table width="100%" height="100px" border="3" cellpadding="0" cellspacing="0" class="head">
      <tr>
        <td><?php include_once("header.php");?></td>
      </tr>
    </table-->
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="350px">
        <tr valign="top">
          <td width="16%" class="container"><?php include_once("links.php");?>&nbsp;</td>
          <td width="84%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            	<td align="right" class="style1">Welcome Admin <?php echo $loggedAdmin['surname'].' '.$loggedAdmin['firstName'];?></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellpadding="3" cellspacing="3" class="container">
                <tr>
                  <td colspan="4" class="views">Overview of <strong> <em>Fault Calls</em></strong> on E-Logging portal</td>
                  </tr>
                <tr>
                  <td width="36%"><h3>Total Number of Fault Calls Received</h3></td>
                  <td width="16%"><h3><?php echo $faultcalls->getTotalFaultCalls();?></h3></td>
                  <td><h3>Total Number of Closed Calls</h3></td>
                  <td><h3><?php echo $faultcalls->closedCalls();?></h3>&nbsp;</td>
                </tr>
                <tr>
                  <td><h3>Total Number of Fault Calls Received Today</h3></td>
                  <td><h3><?php echo $faultcalls->callsReceivedToday();?></h3></td>
				  <td><h3>Total Number of Open Calls</h3></td>
                  <td><h3><?php echo $faultcalls->openCalls()?></h3></td>
                </tr>                
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="3">&nbsp;</td>
                </tr>
              </table></td>
            </tr>           
          <tr>
              <td width="84%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr><td height="30px"><p>&nbsp;</p></td></tr>
                                         
            
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>            <p>&nbsp;</p></td>
            </tr>
          </table>
          </td>
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