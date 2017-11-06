<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Logging System Portal</title>


<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel ="stylesheet" href="bootstrap-3.3.0/dist/css/bootsrap.min.css">
<script src="bootsrap-3.3.0/dist/js/bootsrap.min.js"></script>
<link href="css/css.css" rel="stylesheet" type="text/css" />

<style>

#button{
	width: 10em;
	border: 2px solid green;
	background: #ffe;
	border-radius: 5px;
	position: absolute;
	top:50%;
	margin-left: 70%;
	margin-top:-50px 



}

a{
	display: block;
	width: 100%;
	text-align: center;
	text-decoration: none;
	border-radius: 5px;
}

a:hover{
	color: red;
	background: #eff;
}

#button1{
	width: 10em;
	border: 2px solid green;
	background: #ffe;
	border-radius: 5px;
	position: fixed;
	top:50%;
	margin-left: 30%;
	margin-top:-50px ;



}

a{
	display: block;
	width: 100%;
	text-align: center;
	text-decoration: none;
	border-radius: 5px;
}

a:hover{
	color: red;
	background: #eff;
}

#lander{
	background-color: #dde;
	/*background-image: url("images/oyafix.jpg");
	background-repeat: no-repeat;*/
}

#line{
	width: 100%;
	height: 10em;
	top: 20%;
	/*background: #ffe;*/
	border-radius: 5px;
	position: absolute;
	
}

#texter{
	text-align: center;
	font-family: cursive;
	font-size: 25;
	color: rgb(244,23,123);
}


</style>
</head>

<body id="lander">

<div id="line"><h1 id='texter'>Hi, Please choose your preferred mode of authentication</h1></div>
<div id="button"><a href="index2.php"><h3>Knowledge Based Authentication</h3></div>

<div id="button1"><a href="index.php"><h3>Username and Password</h3></div>
</body>

</html>