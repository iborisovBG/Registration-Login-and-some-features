<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

if(isset($_POST['submit']))
{

$task1=$_POST['task1'];
$task2=$_POST['task2'];
$task3=$_POST['task3'];       
$task4 = $_POST['task4'];
$idedit=$_POST['idedit'];

if(isset($_GET['view']))
{
$editid=$_GET['view'];
}

if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$image=$final_file;
    }


$previous_week = strtotime("-1 week +1 day");

$start_week = strtotime("last saturday midnight",$previous_week);
$end_week = strtotime("next saturday",$start_week);

$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);

$notitype='Създаване на Седмични задания: за куче : '.$dog.' и собственик: '.$name.' ';
$reciver='Admin';
$sender="Admin";

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql="insert into weektasks (task1,task2,task3,task4,fromdate,todate,user_id) values (:task1,:task2,:task3,:task4,:fromdate,:todate,:user_id)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':task1', $task1, PDO::PARAM_STR);
$query-> bindParam(':task2', $task2, PDO::PARAM_STR);    
$query-> bindParam(':task3', $task3, PDO::PARAM_STR);
$query-> bindParam(':task4', $task4, PDO::PARAM_STR);
$query-> bindParam(':fromdate', $start_week, PDO::PARAM_STR);
$query-> bindParam(':todate', $end_week, PDO::PARAM_STR);
$query-> bindParam(':user_id', $editid, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Успешно добавени задачи!');</script>";
echo "<script type='text/javascript'> document.location = '/admin/weektasks.php?view=$editid'; </script>";
}
else 
{
$error="Нещо се обърка моля опитайте отново!";
}

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

    <title>AATraining Админ Табло</title>

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
</head>

<body>


    <?php
		$sql = "SELECT * from users where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
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

                        <h2 class="page-title">Добавяне на Добавяне на седмични цели</h2>
                        <div class="well row pt-2x pb-3x bk-light text-center">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Задача 1<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="task1" class="form-control" required>
                                    </div>
                                    <label class="col-sm-1 control-label">Задача 2<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="task2" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Задача 3<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="task3" class="form-control" id="password" required>
                                    </div>

                                    <label class="col-sm-1 control-label">Задача 4<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="task4" class="form-control" id="password" required>
                                    </div>
                                    <br>
                                    <br>
                                </div>

   <div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >
</div>
</div>
                                <button class="btn btn-primary" name="submit" type="submit">Добави</button>
                            </form>
                            <br>
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

</body>

</html>
