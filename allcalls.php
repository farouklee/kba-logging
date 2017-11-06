<?php
session_start();
error_reporting (0);
require_once("classes/DatabaseManager.php");
require_once("classes/Administrator.php");
require_once("classes/ps_pagination.php");
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
$admin->validateAdmin();
$loggedAdmin = $admin->details();

	$sql = "SELECT * FROM call_log ORDER BY id DESC";
	
if(isset($_POST['Query']))
{
	if(empty($_POST['location']) && empty($_POST['status']) && empty($_POST['schDate1']) && empty($_POST['schDate2']) && empty($_POST['pn']) && empty($_POST['name']) && empty($_POST['email']) && empty($_POST['severity']))
	{
		unset($_SESSION['sql6']); unset($_SESSION['check']);
		$_SESSION['sql5'] = "SELECT * FROM call_log ORDER BY id DESC";
		$_SESSION['check'] = 2;
	} else {
	$ini= 0;		
		if(!($_POST['schDate1']=="")){
			$date1 = explode("-",$_POST['schDate1']);
			$time1 = mktime(0,0,0,$date1[0],$date1[1],$date1[2]);
			$time11 = mktime(23,59,59,$date1[0],$date1[1],$date1[2]);
			echo $time1;
			if($ini==0){
				$sql_date1 = " date_created BETWEEN '$time1' AND '$time11'";
				$ini = 1;
			}else {
				$sql_date1 = " && date_created BETWEEN '$time1' AND '$time11'";
			}
		}
		if(!($_POST['schDate2']=="")){
			$date2 = explode("-",$_POST['schDate2']);
			$time2 = mktime(0,0,0,$date2[0],$date2[1],$date2[2]);
			$time22 = mktime(23,59,59,$date2[0],$date2[1],$date2[2]);
			if($ini==0){
				$sql_date2 = " date_closed BETWEEN '$time2' AND '$time22'";
				$ini = 1;
			}else {
				$sql_date2 = " && date_closed BETWEEN '$time2' AND '$time22'";
			}
		}
		if(!($_POST['status']=="")){
			if($ini==0){
				$sql_status = " status LIKE '%".$_POST['status']."%'";
				$ini = 1;
			}else {
				$sql_status = " && status LIKE '%".$_POST['status']."%'";
			}
		}
		if(!($_POST['pn']=="")){
			if($ini==0){
				$sql_pn = " phone LIKE '%".$_POST['pn']."%'";
				$ini = 1;
			}else {
				$sql_pn = " && phone LIKE '%".$_POST['pn']."%'";
			}
		}
		if(!($_POST['name']=="")){
			if($ini==0){
				$sql_name = " client='".$_POST['name']."'";
				$ini = 1;
			}else {
				$sql_name = " && client='".$_POST['name']."'";
			}
		}
		if(!($_POST['severity']=="")){
			if($ini==0){
				$sql_severity = " severity LIKE '%".$_POST['severity']."%'";
				$ini = 1;
			}else {
				$sql_severity = " && severity LIKE '%".$_POST['severity']."%'";
			}
		}
		if(!($_POST['location']=="")){
			if($ini==0){
				$sql_location = " location LIKE '%".$_POST['location']."%'";
				$ini = 1;
			}else {
				$sql_location = " && location LIKE '%".$_POST['location']."%'";
			}
		}		
		if(!($_POST['email']=="")){
			if($ini==0){
				$sql_email = " email='".$_POST['email']."'";
				$ini = 1;
			}else {
				$sql_email = " && email='".$_POST['email']."'";
			}
		}
		
		unset($_SESSION['sql5']);unset($_SESSION['check']);
		$_SESSION['sql6'] = "SELECT * FROM call_log WHERE".$sql_date1.$sql_date2.$sql_status.$sql_pn.$sql_name.$sql_severity.$sql_location.$sql_email." ORDER BY id DESC";
		$_SESSION['check'] = 2;
		
	}
	if(isset($_SESSION['sql5']))
{
	$sql = $_SESSION['sql5'];
	$_SESSION['check'] = 2;
}
if(isset($_SESSION['sql6']))
{
	$sql = $_SESSION['sql6'];
	$_SESSION['check'] = 2;
}
}
$query = mysqli_query($db->getConnection(), $sql);
$pager = new PS_Pagination($db->getConnection(),$sql,10,5);
$rs = $pager->paginate();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/datetimepicker_css.js"></script>
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="Suggest/js/script.js"></SCRIPT>
 <script src="js/Util.js" type="text/javascript"></script>
 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
  <link href="Suggest/css/style.css" rel="stylesheet" type="text/css">
<title>E-Logging System Portal</title>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="350px">
        <tr valign="top">
          <td width="16%" class="container"><?php include_once("links.php");?>&nbsp;</td>
          <td width="84%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
                <tr>
                   <td colspan="4" align="right" class="style1"><h4>Welcome Admin, <?php echo $loggedAdmin['surname'].' '.$loggedAdmin['firstName'].'  ';?>  </h4>  </td>
                </tr>
                 <tr>
                  <td colspan="4" class="views">View All Fault Calls</td>
                </tr>
                <tr>
                <tr>
              
				<form id="myForm" name="myForm" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
					  <tr>
                        <td width="15%"><h3>Date Logged</h3></td>
                        <td><input name="schDate1" type="text" id="schDate1" size="19" maxlength="23" />
                          <a href="javascript:NewCssCal('schDate1','mmddyyyy')"><img src="images/cal.gif"
		 alt="Pick a date" width="15" height="16" border="0" /></a></td>
                        <td><h3>Date Closed</h3></td>
                        <td><input name="schDate2" type="text" id="schDate2" size="20" maxlength="25" />
                          <a href="javascript:NewCssCal('schDate2','mmddyyyy')"><img src="images/cal.gif"
		 alt="Pick a date" width="15" height="16" border="0" /></td>
						<td width="5%"><h3>Status</h3></td>
						<td width="20%"><select name="status" id="status">
                          <option value="">--Status--</option>
                          <option value="Open">Open</option>
						  <option value="Closed">Closed</option>	
						  </select></td>
					  </tr>
					  <tr>
						<td width="14%"><h3>Phone Number</h3></td>
                          <td width="20%"><input type="text" name="pn" id="pn" /></td>
						 <td width="14%"><h3>Client</h3></td>
                          <td width="20%"><input type="text" name="name" id="name" /></td>
                          <td width="5%"><h3>Severity</h3></td>
						  <td colspan="20%"> <select name="severity" id="severity">
                          <option value="">--Severity--</option>
                          <option value="Normal">Normal</option>
						  <option value="Urgent">Urgent</option>
                          <option value="Critical">Critical</option>
						  </select></td>
						</tr>
                      <tr>
						<td width="14%"><h3>Location</h3></td>
                          <td width="20%"><input type="text" name="location" id="location" maxlength="19"/></td>
						 <td width="14%"><h3>Email</h3></td>
                          <td width="20%"><input type="text" name="email" id="email"  maxlength="19"/></td>
						<td>&nbsp;</td><td><h3><input type="submit" name="Query" id="Query" value=" Query " font="cursive" /></h3></td>
						

						</tr>
                    </table>
                  </form>
				  <hr>
				 
                  <form id="form2" name="form2" method="post" action="">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">    
                    <tr><td colspan="4"><font style="color:#03C; font-weight:bold;">ALL CLIENTS</font></td>
					</tr>
                    <tr>
                      <td width="4%"><strong><h3>S/N</strong></h3></td>
                      <td width="20%"><strong><h3>Client (Email Address)</h3></strong></td>
                      <td width="16%"><div align="center"><strong><h3>Phone number</h3></strong></div></td>
                      <td width="12%"><div align="center"><strong><h3>Edit Details</h3></strong></div></td>
                      <td width="12%"><div align="center"><strong><h3>Location</h3></strong></div></td>
                      <td width="8%"><div align="center"><strong><h3>Status</h3></strong></div></td>
                      <td width="8%"><div align="center"><strong><h3>Severity</h3></strong></div></td>
                      <td width="11%"><div align="center"><strong><h3>Date Logged</h3></strong></div></td>
			     	  <td width="11%"><div align="center"><strong><h3>Date Closed</h3></strong></div></td>
                      
					 </tr>
			<?php
            $i = 0;
			$count = mysqli_num_rows($query);
			if(!isset($_GET['page']))
				$_GET['page'] = 1;  
			if($_GET['page'] > ceil($count/5))
				$page = 1; 
			else
				$page = $_GET['page']; 
			while($row = $pager->fetchArray($rs)){
			  if($i%2 == 0) {
			  $class = "t1";
			  $i++;
			  }
			  else
			  {
			  	$class = "t2";
			  	$i++;
			  }?>

                <tr class="<?php echo $class;?>">
                <td><?php echo $row['id'];?></td>                       
                <td><?php echo $row['client']." (".$row['email'].")";?></td>
                <td><div align="center"><?php echo $row['phone'];?></div></td>
                <td><div align="center"><a href="editdetails.php?client=<?php echo base64_encode($row['client']);?>&phone=<?php echo base64_encode($row['phone']);?>&location=<?php echo base64_encode($row['location']);?>&id=<?php echo base64_encode($row['id']);?>"><img src="images/application_edit.png" width="14" height="14" /></a></div></td>
                <td><div align="center"><?php echo $row['location'];?></div></td>
                <td><div align="center"><?php echo $row['status'];?></div></td>
                <td><div align="center"><?php echo $row['severity'];?></div></td>
                <td><div align="center"><?php echo date("l jS M Y g:i:s a",$row['date_created']+3600);?></div></td>
                <td><div align="center"><?php if($row['date_closed']==0) echo "Still Open";  else echo date("l jS M Y g:i:s a",$row['date_closed']+3600);}?></div></td>
            </tr>
          </table>
          </form></td>
             
          </tr>
          <tr>
          	<td><span class="pagination">
            <?php  if($pager->countRows()>0){echo $pager->renderFullNav();}?></span></td>
          </tr> 
          </table></td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
          </table> 
          </td>
        </tr>
    </table>
      <table width="100%" height="50px" border="0" cellpadding="0" cellspacing="0" class="foot">
        <tr valign="top">
          <!--td><?php include_once("footer.php");?>&nbsp;</td-->
        </tr>
    </table></td>
  </tr>
</table>
<?php
$db->close();?>
</body>
</html>