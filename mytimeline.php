<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{   
?>
<?php
$user_id = $_SESSION['user_id'];
$ponedelnik = $_POST['ponedelnik'];

$vtornik = $_POST['vtornik'];

$srqda = $_POST['srqda'];

$chetvurtuk = $_POST['chetvurtuk'];

$petuk = $_POST['petuk'];
   
$subota = $_POST['subota'];

$nedelq = $_POST['nedelq'];

$minadobre = $_POST['minadobre'];
 
$neminadobre = $_POST['neminadobre'];

$belejki = $_POST['belejki'];



if(empty($ponedelnik))
{
$ponedelnik = 0;
}

if(empty($vtornik))
{
$vtornik = 0;
}

if(empty($srqda))
{
$srqda = 0;
}

if(empty($chetvurtuk))
{
$chetvurtuk = 0;
}

if(empty($petuk))
{
$petuk = 0;
}


if(empty($subota))
{
$subota = 0;
}

if(empty($nedelq))
{
$nedelq = 0;
}

$previous_week = strtotime("-1 week +1 day");

$start_week = strtotime("last saturday midnight",$previous_week);
$end_week = strtotime("next saturday",$start_week);

$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);
$dogname = $_SESSION['dogname'];

if(isset($_POST['submit']))
{



$notitype='Създаване на Freed в мойте тренировки';
$reciver='Admin';
$sender=$_SESSION['name'];

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$notitype='Създаване на Freed в мойте тренировки';
$reciver='Admin';
$sender=$_SESSION['name'];

$sql="insert into timeline (user_id,wasgood,wasnotgood,notes,fromdate,todate,dogname,monday,tuesday,wednesday,thursday,friday,saturday, sunday) values (:user_id,:wasgood,:wasnotgood, :notes, :fromdate, :todate,:dogname , :monday, :tuesday,:wednesday, :thursday, :friday, :saturday, :sunday)";
$query = $dbh->prepare($sql);
$query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
$query-> bindParam(':wasgood',$minadobre, PDO::PARAM_STR);
$query-> bindParam(':wasnotgood', $neminadobre, PDO::PARAM_STR);
$query-> bindParam(':notes', $belejki, PDO::PARAM_STR);
$query-> bindParam(':fromdate', $start_week, PDO::PARAM_STR);
$query-> bindParam(':todate', $end_week, PDO::PARAM_STR);
$query-> bindParam(':dogname', $dogname, PDO::PARAM_STR);
$query-> bindParam(':monday', $ponedelnik, PDO::PARAM_STR);
$query-> bindParam(':tuesday', $vtornik, PDO::PARAM_STR);
$query-> bindParam(':wednesday', $srqda, PDO::PARAM_STR);
$query-> bindParam(':thursday', $chetvurtuk, PDO::PARAM_STR);
$query-> bindParam(':friday', $petuk, PDO::PARAM_STR);
$query-> bindParam(':saturday', $subota, PDO::PARAM_STR);
$query-> bindParam(':sunday', $nedelq, PDO::PARAM_STR);
$query->execute();    

$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Добавянето на тренировка е успешно!');</script>";
//echo "<script type='text/javascript'> document.location = 'mytimeline.php'; </script>";
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

    <title>Тренировъчна седмица</title>

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

        .form-horizontal .radio,
        .form-horizontal .checkbox {
            min-height: 33px;
            margin: 0px 8px 12px 10px;
            background: grey;
            padding: 13px;
        }

        @media (min-width: 768px) .col-sm-5 {
            width: 41.66666667%;
            display: inline-flex;
            margin: 4px 0px 2px 2px;
        }

        .form-horizontal .radio,
        .form-horizontal .checkbox {
            min-height: 33px;
            margin: 0px 8px;
            margin: 0px 8px 12px 10px;
            background: grey;
            padding: 12px;
            color: white;
            font-family: sans-serif;
            display: inline-block;
        }

        @media (min-width: 768px) .col-sm-5 {
            width: 60.666667%;
        }



        .rightdog {
            float: right;
            margin: -147px 20px 20px 21px;
            width: 70%;
        }

        @media only screen and (max-width: 700px) {
            .rightdog {
                float: right;
                margin: 0px 0px 0px 0px;
                width: 80%;
            }
        }

        @media only screen and (max-width: 1200px) {
            .rightdog {
                float: right;
                margin: 0px 0px 0px 0px;
                width: 100%;
            }


            .form-horizontal .control-label {
                text-align: right;
                margin-bottom: 0;
                padding-top: 25px;
                font-size: 22px;
            }
        }

        .panel-default>.panel-heading {
            color: #3e3f3a;
            background-color: #FFEB3B;
            border-color: #dfd7ca;
        }

        .panel-default .panel-heading,
        .panel-default .panel-title,
        .panel-default .panel-footer {
            color: #98978b;
            font-size: initial;
        }

        .btn {
            font-family: sans-serif;
            font-size: 23px;
        }

        .form-horizontal .control-label {
            text-align: right;
            margin-bottom: 0;
            padding-top: 25px;
            font-size: 22px;
        }

        textarea.form-control {
            height: auto;
            margin: 0px -871.181px 0px 0px;
            width: 100%;
            height: 156px;
        }
        @media (min-width: 768px){
.col-sm-5 {
    width: 80.66666667%;
}
.col-sm-4 {
    width: 80%;
}
        }
    </style>


</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">
                            <center><b>Тренировъчна седмица</b></center>
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <center>Преглед на вашата седмица и ревизия на вашите цели <br> бъдете (и останете) вдъхновени</center>
                                    </div>
                                    <div class="panel-body">



    <?php
        $previous_week = strtotime("-1 week +1 day");

        $start_week = strtotime("last saturday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);

        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

		$sql = "SELECT * from weektasks where id = :editid AND fromdate = :fromdate AND todate = :todate";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$user_id,PDO::PARAM_INT);
        $query->bindParam(':fromdate',$start_week,PDO::PARAM_INT);
        $query->bindParam(':todate',$end_week,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>

<h1>Вашите 
<b style="margin-left: 85px;">
<b style="color:#FFD700;">1 :</b> <?php echo htmlentities($result->task1);?></b>
<br> Седмични <b style="margin-left: 40px;"><b style="color:#FFD700;">2 :</b> <?php echo htmlentities($result->task2);?></b>
<br> Цели <b style="margin-left: 126px;"><b style="color:#FFD700;">3 :</b> <?php echo htmlentities($result->task3);?></b>
 <br>AATRAINING <b style="margin-left: 4px;"><b style="color:#FFD700;">4 :</b> <?php echo htmlentities($result->task4);?></b>
<div class="rightdog"><img src="/images/<?php echo $_SESSION['image'];?>" style=" width: 120px; margin: 0 auto; display: inline; float: right; border-radius: 100%; ">
</div>
</h1>
<hr>
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data" role="form">

                                            <div class="form-group">
                                                <label for="Email1msg" class="col-sm-2 control-label">Направени ?</label>
                                                <div class="col-sm-5">
                                                    <p style="line-height: 25px;margin-top: 30px;font-size: 18px;"><b>СЕДМИЧЕН ПЛАН</b> [Следвахте ли своят седмичен план и постигнахте ли целите си ?]</p>
                                                    <div class="checkbox checkbox-success">
                                                        <input id="ponedelnik" name="ponedelnik" class="styled" type="checkbox" value="1">>
                                                        <label for="ponedelnik">
                                                            Понеделник
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger">
                                                        <input id="vtornik" name="vtornik" class="styled" type="checkbox" value="1">>
                                                        <label for="vtornik">
                                                            Вторник
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-success">
                                                        <input id="srqda" name="srqda" class="styled" type="checkbox" value="1">
                                                        <label for="srqda">
                                                            Сряда
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger">
                                                        <input id="chetvurtuk" name="chetvurtuk" class="styled" type="checkbox" value="1">>
                                                        <label for="chetvurtuk">
                                                            Четвъртък
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-success">
                                                        <input id="petuk" name="petuk" class="styled" type="checkbox" value="1">>
                                                        <label for="petuk">
                                                            Петък
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger">
                                                        <input id="subota" name="subota" class="styled" type="checkbox" value="1">>
                                                        <label for="subota">
                                                            Събота
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-success">
                                                        <input id="nedelq" name="nedelq" class="styled" type="checkbox" value="1">>
                                                        <label for="nedelq">
                                                            Неделя
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <?php
    
/*
echo 'Понеделник:'.$ponedelnik;
echo "<br>";

echo 'Вторник:'.$vtornik;
echo "<br>";

echo 'Сряда:'.$srqda;
echo "<br>";

echo 'Четвъртък:'.$chetvurtuk;
echo "<br>";

echo 'Петък:'.$petuk;
echo "<br>";

echo 'Събота:'.$subota;
echo "<br>";

echo 'Неделя:'.$nedelq;
echo "<br>";



echo 'Мина добре:'.$minadobre;
echo "<br>";

echo 'Не Мина добре:'.$neminadobrem;
echo "<br>";

echo 'Бележки:'.$belejki;
echo "<br>";
    //echo $nedelq.'<- Неделя'.$subota.'<- Събота'.$petuk.'<- Петък'.$chetvurtuk.'<- Четвъртък'.$srqda.'<- Сряда'.$vtornik.'<- Вторник'.$ponedelnik.'<- Понеделник';

*/
?>

                                            <hr>
                                            <div class="form-group">
                                                <label for="name1" class="col-sm-2 control-label">МИНА ДОБРЕ ?</label>
                                                <div class="col-sm-4">
                                                    <p style="line-height: 25px;margin-top: 30px;font-size: 18px;">[Позитивни бележки - какво мина добре ?]</p>
                                                    <textarea type="email" name="minadobre" class="form-control inputstl" id="name1" placeholder="[Позитивни бележки - какво мина добре ?]"></textarea>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label for="address1" class="col-sm-2 control-label">НЕ МИНА ДОБРЕ ?</label>
                                                <div class="col-sm-5">
                                                    <p style="line-height: 25px;margin-top: 30px;font-size: 18px;">[Запишете какво не успяхте да направите както искахте ?]</p>
                                                    <textarea type="text" name="neminadobre" class="form-control inputstl" id="address1" placeholder="[Запишете какво не успяхте да направите както искахте ?]"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="address1" class="col-sm-2 control-label">БЕЛЕЖКИ !</label>
                                                <div class="col-sm-5">
                                                    <p style="line-height: 25px;margin-top: 30px;font-size: 18px;">[Запишете,неща които бихте искали да коментираме на тренировка]</p>
                                                    <textarea type="text" name="belejki" class="form-control inputstl" id="address1" placeholder="[Запишете,неща които бихте искали да коментираме на тренировка]"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-4">
                                                    <button type="submit" name="submit" class="btn btn-lg btn-block btn-danger">Добави Седмично Ревю</button>
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
