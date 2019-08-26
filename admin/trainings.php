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

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Моите тренировки</title>

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


        .post-module {
            position: relative;
            z-index: 1;
            display: block;
            background: #FFFFFF;
            min-width: 270px;
            height: 800px;
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
        }

        .post-module:hover,
        .hover {
            -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
        }

        .post-module:hover .thumbnail img,
        .hover .thumbnail img {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            transform: scale(1.1);
            opacity: 0.6;
        }

        .post-module .thumbnail {
            background: #000000;
            height: 400px;
            overflow: hidden;
        }

        .post-module .thumbnail .date {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1;
            background: #e74c3c;
            width: 55px;
            height: 55px;
            padding: 12.5px 0;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            color: #FFFFFF;
            font-weight: 700;
            text-align: center;
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .post-module .thumbnail .date .day {
            font-size: 48px;
            line-height: 29px;
        }

        .post-module .thumbnail .date .month {
            font-size: 12px;
            text-transform: uppercase;
        }

        .post-module .thumbnail img {
            display: block;
            width: 120%;
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
        }

        .post-module .post-content {
            position: absolute;
            bottom: 0;
            background: #FFFFFF;
            width: 100%;
            padding: 30px;
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        }

        .post-module .post-content .category {
            position: absolute;
            top: -34px;
            left: 0;
            background: #e74c3c;
            padding: 10px 15px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .post-module .post-content .title {
            margin: 0;
            padding: 0 0 10px;
            color: #333333;
            font-size: 20px;
            font-weight: 700;
        }

        .post-module .post-content .sub_title {
            margin: 0;
            padding: 0 0 20px;
            color: #e74c3c;
            font-size: 20px;
            font-weight: 400;
        }

        .post-module .post-content .description {
            display: none;
            color: #666666;
            font-size: 14px;
            line-height: 1.8em;
        }

        .post-module .post-content .post-meta {
            margin: 30px 0 0;
            color: #999999;
        }

        .post-module .post-content .post-meta .timestamp {
            margin: 0 16px 0 0;
        }

        .post-module .post-content .post-meta a {
            color: #999999;
            text-decoration: none;
        }

        .hover .post-content .description {
            display: block !important;
            height: auto !important;
            opacity: 1 !important;
        }

        .container {
            max-width: 800px;
            min-width: 640px;
            margin: 0 auto;
        }

        .container:before,
        .container:after {
            content: '';
            display: block;
            clear: both;
        }

        .container .column {
            width: 50%;
            padding: 0 25px;
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            float: left;
        }

        .container .column .demo-title {
            margin: 0 0 15px;
            color: #666666;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .container .info {
            width: 300px;
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

        .container .info span {
            color: #666666;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #e74c3c;
        }

        .panel-default .panel-heading,
        .panel-default .panel-title,
        .panel-default .panel-footer {
            color: #98978b;
            font-size: initial;
        }

        .panel-default>.panel-heading {
            color: #ffffff;
            background-color: #e74c3c;
            border-color: #ffffff;
            text-align: center;
        }

        .column {
            width: 30%;
            display: inline-block;
    margin: 10px;
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
                        <h3 class="page-title">Моите тренировки</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">ИНФОРМАЦИЯ ОТНОСНО ТРЕНИРОВКИТЕ КОИТО СТЕ ПРОВЕЛИ НА БАЗА НА ПОПЪЛНЕНИЯ ОТ ВАС ДНЕВНИК
                                    </div>
                                    <div class="panel-body">
                                        <?php 
$reciver = $_GET['view'];
     
$sql = "SELECT * from  timeline where user_id = (:user_id) order by id DESC";
$query = $dbh -> prepare($sql);
$query-> bindParam(':user_id', $reciver, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{
foreach($results as $result)
    
{				
                                           
$ponedelnik = htmlentities($result->monday);
$vtornik = htmlentities($result->tuesday); 
$srqda = htmlentities($result->wednesday);     
$chetvurtuk = htmlentities($result->thursday);    
$petuk = htmlentities($result->friday);  
$subota = htmlentities($result->saturday);      
$nedelq = htmlentities($result->sunday);      
$imekuche = htmlentities($result->dogname);   
$otdata = htmlentities($result->fromdate);
$dodata = htmlentities($result->todate);            
$belejka = htmlentities($result->notes); 
$beshedobre = htmlentities($result->wasgood);
$nebeshedobre = htmlentities($result->wasnotgood);
    
if($ponedelnik == 1)
{
   $ponedelnik = "Да";
} 
else
{
$ponedelnik = "Не";
}
    
    
if($vtornik == 1)
{
   $vtornik = "Да";
} 
else
{
$vtornik = "Не";
}  

if($srqda == 1)
{
   $srqda = "Да";
} 
else
{
$srqda = "Не";
} 

if($chetvurtuk == 1)
{
   $chetvurtuk = "Да";
} 
else
{
$chetvurtuk = "Не";
}   

if($petuk == 1)
{
   $petuk = "Да";
} 
else
{
$petuk = "Не";
} 

if($subota == 1)
{
   $subota = "Да";
} 
else
{
$subota = "Не";
} 


if($nedelq == 1)
{
   $nedelq = "Да";
} 
else
{
$nedelq = "Не";
} 
?>




                                        <!-- Hover Demo-->
                                        <div class="column">
                                            <div class="demo-title"></div>
                                            <!-- Post-->
                                            <div class="post-module hover">
                                                <!-- Thumbnail-->
                                                <div class="thumbnail">
                                                    <div class="date">
                                                        <div class="day">🐶</div>
                                                    </div><img src="http://fanaru.com/doge/image/133919-doge-happy-dog.jpg" />
                                                </div>
                                                <!-- Post Content-->
                                                <div class="post-content">
                                                    <div class="category"><?php echo $imekuche;?></div>
                                                    <h2 class="title">Беше добре: <?php echo $beshedobre;?></h2>
                                                    <hr>
                                                    <h2 class="sub_title">Не беше добре : <?php echo $nebeshedobre;?></h2>
                                                    <hr>
                                                    <p class="description"><i>Бележка: <?php echo $belejka;?></i></p>
                                                    <hr>
                                                    <p>Присъствие: <br>Понеделник - <?php echo $ponedelnik;?> <br> Вторник - <?php echo $vtornik;?> <br> Сряда - <?php echo $srqda;?> <br> Четвъртък - <?php echo $chetvurtuk;?> <br> Петък - <?php echo $petuk;?> <br> Събота - <?php echo $subota;?> <br> Неделя - <?php echo $nedelq;?> </p>
                                                    <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-o"></i>&nbsp<b>От дата:</b> <?php echo $otdata;?></span><span class="comments"><i class="fa fa-clock-o"></i><a href="#">&nbsp<b>До дата:</b> <?php echo $dodata;?></a></span></div>
                                                </div>
                                            </div>
                                        </div>
                            

                                    <?php $cnt=$cnt+1; }} ?>
           </div>
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
        $(window).load(function() {
            $('.post-module').hover(function() {
                $(this).find('.description').stop().animate({
                    height: "toggle",
                    opacity: "toggle"
                }, 300);
            });
        });

    </script>
</body>

</html>
<?php } ?>
