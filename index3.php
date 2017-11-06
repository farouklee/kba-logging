<?php
session_start();
//echo $_SERVER['HTTP_REFERER'];
require_once("classes/DatabaseManager.php");
require_once("classes/Administrator.php");
if(isset($_SESSION['transport']))
{
    $message =$_SESSION['transport'];
    unset($_SESSION['transport']);
}
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
$admin->validate();

if(isset($_POST['login']))
{
    $message = $admin->log2();
    //$message = $admin->login(); 
    //$admin->get();
}
$number = 4;
$questions = $admin->getQuestions($number);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Logging System Portal</title>
<body>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
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
                  <td width="50%"><h3>SSN</h3></td>
                  <td width="50%"><input name="ssn" type="text" class="widthss" id="ssn" value="<?php echo $_SESSION['email']; ?>" readonly/></td>
                </tr>
                
                <tr>
                  <td><h3><?php echo $questions[0]['questions'] ?>
                  </h3></td>
                  <td><input name="q0" type="text" class="widthss" id="q0" autocomplete='off'/></td>
                </tr>
                <tr>
                  <td><h3><?php echo $questions[1]['questions'] ?>
                  </h3></td>
                  <td><input name="q1" type="text" class="widthss" id="q1"autocomplete='off'/></td>
                </tr>
                <tr>
                  <td><h3><?php echo $questions[2]['questions'] ?>
                  </h3></td>
                  <td><input name="q2" type="text" class="widthss" id="q2"autocomplete='off'/></td>
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