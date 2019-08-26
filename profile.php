<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
  {	
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder="images/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobileno=$_POST['mobile'];
	$designation=$_POST['designation'];
	$idedit=$_POST['editid'];
	$image=$_POST['image'];
    $goal1 = $_POST['goal1'];
    $goal2 = $_POST['goal2'];
    $goal3 = $_POST['goal3'];
    $goal4 = $_POST['goal4'];
    $goal5 = $_POST['goal5'];
    $goal6 = $_POST['goal6'];
    $dogname = $_POST['dogname'];
	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$image=$final_file;
		}

	$sql="UPDATE users SET name=(:name), email=(:email), mobile=(:mobileno), designation=(:designation), Image=(:image),goal1=(:goal1),goal2=(:goal2),goal3=(:goal3),goal4=(:goal4),goal5=(:goal5),goal6=(:goal6),dogname=(:dogname) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
	$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
	$query-> bindParam(':image', $image, PDO::PARAM_STR);
	$query-> bindParam(':goal1', $goal1, PDO::PARAM_STR);
	$query-> bindParam(':goal2', $goal2, PDO::PARAM_STR);
	$query-> bindParam(':goal3', $goal3, PDO::PARAM_STR);
	$query-> bindParam(':goal4', $goal4, PDO::PARAM_STR);
	$query-> bindParam(':goal5', $goal5, PDO::PARAM_STR);
	$query-> bindParam(':goal6', $goal6, PDO::PARAM_STR);
	$query-> bindParam(':dogname', $dogname, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg="Информацията е обновена успешно";
}    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Промяна на профил</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
<?php
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><?php echo htmlentities($_SESSION['alogin']); ?></div>
<?php if($error){?><div class="errorWrap"><strong>Грешка</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Браво: </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4 text-center">
		<img src="images/<?php echo htmlentities($result->image);?>" style="width:200px; border-radius:50%; margin:10px;">
		<input type="file" name="image" class="form-control">
		<input type="hidden" name="image" class="form-control" value="<?php echo htmlentities($result->image);?>">
	</div>
	<div class="col-sm-4">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Име<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name);?>">
	</div>

	<label class="col-sm-2 control-label">Мейл<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="email" name="email" class="form-control" required value="<?php echo htmlentities($result->email);?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Телефон<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="mobile" class="form-control" required value="<?php echo htmlentities($result->mobile);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Описание<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="designation" class="form-control" required value="<?php echo htmlentities($result->designation);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 1<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal1" class="form-control" required value="<?php echo htmlentities($result->goal1);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 2<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal2" class="form-control" required value="<?php echo htmlentities($result->goal2);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 3<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal3" class="form-control" required value="<?php echo htmlentities($result->goal3);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 4<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal4" class="form-control" required value="<?php echo htmlentities($result->goal4);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 5<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal5" class="form-control" required value="<?php echo htmlentities($result->goal5);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Цел 6<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="goal6" class="form-control" required value="<?php echo htmlentities($result->goal6);?>">
	</div>
<br>
<br>
	<label class="col-sm-2 control-label">Име на кучето<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<input type="text" name="dogname" class="form-control" required value="<?php echo htmlentities($result->dogname);?>">
	</div>
</div>
<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Запази промените</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>
</html>
<?php } ?>