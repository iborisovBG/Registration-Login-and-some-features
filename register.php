<?php
include('includes/config.php');
if(isset($_POST['submit']))
{
    
    
$card_id=$_POST['card_id']; 
     
		$sql = "SELECT * from cards where number = (:number);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':number', $card_id, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
    
if($result->number != $card_id)

{
    echo '<style>
    html,body{
    margin: 0;
    height: 100%;
    overflow: hidden;
    background: #00b1fd;
}
img {
    /* min-height: 100%; */
    /* min-width: 100%; */
    /* height: auto; */
    /* width: auto; */
    position: absolute;
    /* top: -100%; */
    /* bottom: -100%; */
    left: -100%;
    right: -100%;
    margin: auto;
}
    </style>';
 echo '<img src="img/nevaliden_card_id.jpg" alt="">';
    exit();
    
}
    

$file = $_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$folder="images/"; 
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$gender=$_POST['gender'];
$mobileno=$_POST['mobileno'];
$designation=$_POST['designation'];
$goal1=$_POST['goal1'];    
$goal2=$_POST['goal2'];
$goal3=$_POST['goal3'];
$goal4=$_POST['goal4']; 
$goal5=$_POST['goal5'];
$goal6=$_POST['goal6'];   
$card_id=$_POST['card_id'];       

if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$image=$final_file;
    }
$notitype='Създаване на профил';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,email, password, gender, mobile, designation, image,goal1,goal2,goal3,goal4,goal5,goal6,card_id) VALUES(:name, :email, :password, :gender, :mobileno, :designation, :image , :goal1, :goal2, :goal3, :goal4, :goal5, :goal6,:card_id)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
$query-> bindParam(':image', $image, PDO::PARAM_STR);
$query-> bindParam(':goal1', $goal1, PDO::PARAM_STR);
$query-> bindParam(':goal2', $goal2, PDO::PARAM_STR);
$query-> bindParam(':goal3', $goal3, PDO::PARAM_STR);
$query-> bindParam(':goal4', $goal4, PDO::PARAM_STR); 
$query-> bindParam(':goal5', $goal5, PDO::PARAM_STR); 
$query-> bindParam(':goal6', $goal6, PDO::PARAM_STR);  
$query-> bindParam(':card_id', $card_id, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Регистрацията е успешна!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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


    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function validate() {
            var extensions = new Array("jpg", "jpeg");
            var image_file = document.regform.image.value;
            var image_length = document.regform.image.value.length;
            var pos = image_file.lastIndexOf('.') + 1;
            var ext = image_file.substring(pos, image_length);
            var final_ext = ext.toLowerCase();
            for (i = 0; i < extensions.length; i++) {
                if (extensions[i] == final_ext) {
                    return true;

                }
            }
            alert("Изображението е невалидно (Използвай Jpg,jpeg)");
            return false;
        }

    </script>
</head>

<body>
    <div class="login-page bk-img">
        <div class="form-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-bold mt-2x">Регистрация</h1>
                        <div class="hr-dashed"></div>
                        <div class="well row pt-2x pb-3x bk-light text-center">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Име<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <label class="col-sm-1 control-label">Мейл<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Парола<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <label class="col-sm-1 control-label">Описание<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="designation" class="form-control" required>
                                    </div>
                                    
<label class="col-sm-1 control-label">Card ID<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" name="card_id" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Пол<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <select name="gender" class="form-control" required>
                                            <option value="">Избери</option>
                                            <option value="Male">Мъж</option>
                                            <option value="Female">Жена</option>
                                            <option value="Other">Друго</option>
                                        </select>
                                    </div>

                                    <label class="col-sm-1 control-label">Телефон<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" name="mobileno" class="form-control" required>
                                    </div>
                                </div>
                                <center>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Изображение<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <div><input type="file" name="image" class="form-control"></div>
                                        </div>
                                    </div>
                                </center>


                                <center>
                                    <h2>ГЛАВНИ ЦЕЛИ</h2>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">1<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">2<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal2" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">3<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal3" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">4<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal4" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">5<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal5" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">6<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="goal6" class="form-control" required>
                                        </div>
                                    </div>
                                    <br><br>
                                </center>

                                <br>
                                <br>
                                <button class="btn btn-primary" name="submit" type="submit">Регистрация</button>
                            </form>
                            <br>
                            <br>
                            <p>Вече имаш профил? <a href="index.php">Логни се</a></p>
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
