<?php

// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");

if(Session::getUID()=="") {
$user = $_POST['mail'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
	$username = $r['name'];
	$userlastname = $r['lastname'];
	$user_username = $r['username'];
	$usercreated = $r['created_at'];
}

if($found==true) {
//	print $userid;
	$_SESSION['user_id']=$userid ;
	$_SESSION['user_name']=$username ;
	$_SESSION['user_lastname']=$userlastname ;
	$_SESSION['user_username']=$user_username ;
	$_SESSION['user_created']=$usercreated ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}
?>