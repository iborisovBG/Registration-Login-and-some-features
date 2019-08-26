<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {
	
	$name=$_POST['name'];
	$number=$_POST['number'];
	$dog=$_POST['dog'];
	$idedit=$_POST['idedit'];

	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$image=$final_file;
		}

	$sql="UPDATE cards SET name=(:name), number=(:number), dog=(:dog) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':number', $number, PDO::PARAM_STR);
	$query-> bindParam(':dog', $dog, PDO::PARAM_STR);
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

    <title>AATraining Редактиране на Card ID</title>

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

    <script type="text/javascript" src="../vendor/countries.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #dd3d36;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #5cb85c;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

    </style>
</head>

<body>
    <?php
		$sql = "SELECT * from cards where id = :editid";
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
                        <h3 class="page-title">Редактиране на : <?php echo htmlentities($result->name); ?></h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Редактиране на Card ID</div>
                                    <?php if($error){?><div class="errorWrap"><strong>ГРЕШКА</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Успешно</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Име<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name);?>">
                                                </div>
                                                <label class="col-sm-2 control-label">Номер<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="number" class="form-control" required value="<?php echo htmlentities($result->number);?>">
                                                </div>
                                            </div>

                                            

                                            <div class="form-group">
                                            

                                                <label class="col-sm-2 control-label">Име на куче<span style="color:red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="dog" class="form-control" required value="<?php echo htmlentities($result->dog);?>">
                                                </div>
                                            </div>

                                        <div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >
</div>
</div>

                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn btn-primary" name="submit" type="submit">Запази</button>
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
        $(document).ready(function() {
            setTimeout(function() {
                $('.succWrap').slideUp("slow");
            }, 3000);
        });

    </script>

</body>

</html>
<?php } ?>
