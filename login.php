<?php 
extract($_POST);

if(isset($fpwd))
{
	
	$result=mysqli_query($conn,"select * from user where email='$e'");

	if($row=mysqli_fetch_array($result))
	{
			$pwd=$row['pass'];
		echo "<script>alert('Your Password: $pwd');</script>";
	}
	else
		echo "<script>alert('Error: User not Found');</script>";
}


if(isset($save))
{

	if($e=="" || $p=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
//$pass=md5($p);	
$pass=($p);	

$sql=mysqli_query($conn,"select * from user where email='$e' and pass='$pass'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$_SESSION['user']=$e;
header('location:user');
}

else
{

$err="<font color='red'>Invalid login details select * from user where email='$e' and pass='$pass'</font>";

}
}
}

?>
<h2>Login Form</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4">Enter Your Email</div>
		<div class="col-sm-5">
		<input type="email" name="e" class="form-control"/></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">Enter Your Password</div>
		<div class="col-sm-5">
		<input type="password" name="p" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-success"/>
		<input type="submit" value="Forget Password" name="fpwd" class="btn btn-warning"/>
		</div>
	</div>
</form>	