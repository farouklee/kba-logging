<?php
session_start();
require_once("classes/DatabaseManager.php");
require_once("classes/Administrator.php");
if(isset($_SESSION['transport']))
{
    $message =$_SESSION['transport'];
    unset($_SESSION['transport']);
}
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
   
if(isset($_POST['login']))
{
    $message = $admin->login(); 
    $admin->get();
}
?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Logging System Portal</title>


<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel ="stylesheet" href="bootstrap-3.3.0/dist/css/bootsrap.min.css">
<script src="bootsrap-3.3.0/dist/js/bootsrap.min.js"></script>


<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" height="500px" border="0" cellpadding="0" cellspacing="0" class="container">
  <tr valign="top">
    <td><table width="100%" height="100px" border="0" cellpadding="0" cellspacing="0" class="head">
      <tr>
        <td><?php //include_once("header.php");?></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" height="350px">
        <tr valign="top">
          <td width="2%">&nbsp;</td>
          <td width="98%"><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <!-------------------------------------------here-->

          <!--form>
            <div class= 'form-group'>
              <label for ='username'>User Name:</label>
              <input type='text' class='form-control' id='username'>
            </div>
            <div class ='form-group'>
              <label for 'pwd'>Password:</label>
              <input type= 'password' class='form-control' id='pwd'>
            </div>
            <button type='submit' class='ntm btn-default'>Submit</button>
          </form-->

           <form id="form1" name="form1" method="post" action="">
            <div>
              <table width="35%" border="0" align="center" cellpadding="5" cellspacing="5" class="tableHeaders">
                <?php
               if(isset($message)){
                   ?>
                <tr>
                  <td colspan="2"><?php echo $message;?></td> 
                </tr>
                <?php }?>
                <tr>
                  <td width="40%"><h3>Username</h3></td>
                  <td width="40%"><input name="username" type="text" class="widths" id="username" autocomplete='off'/></td>
                </tr>
                <tr>
                  <td><h3>Password</h3></td>
                  <td><input name="password" type="password" class="widths" id="password" autocomplete='off'/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="login" value="Login" /></td>
                </tr>
              </table>
            </div>
          </form>
         


          <p>&nbsp;</p></td>
        </tr>
    </table>
      <table width="100%" height="50px" border="0" cellpadding="0" cellspacing="0" class="foot">
        <tr valign="top">
          <td><?php //include_once("footer.php");?>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<?php
$db->close();?>
</body>
</html>