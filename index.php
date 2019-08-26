<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$status='1';
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT email,password,id,dogname,image,name,designation FROM users WHERE email=:email and password=:password and status=(:status)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
    
{	
$id = $result->id;
$dogname = $result->dogname;
$image = $result->image;
$name = $result->name;
$description = $result->designation;
$_SESSION['user_id'] = $id;
$_SESSION['dogname'] = $dogname;
$_SESSION['image'] = $image;
$_SESSION['name'] = $name;
$_SESSION['description'] = $description;
}
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
} else{
  
  echo "<script>alert('Невалидни детайли или профила не е потвърден');</script>";

}

}

?>
<html>
<head>
    <meta charset="utf-8">
    <meta itemprop="name" content="Headway">
    <meta itemprop="description" content="Changelog as a service. Simple as that.">
    <meta property="og:title" content="Headway">
    <meta property="og:description" content="Changelog as a service. Simple as that.">
    <meta property="og:site_name" content="Headway">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0001, minimum-scale=1.0001, user-scalable=no">
    <!-- <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> -->
    <!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" media="screen" href="css/session-b08cd748.css">

    <title>ААtraining make it simple</title>
</head>

<body>
    <div id="body-cont">
        <aside>
   
<center>
               <h1 style="color:white;font-size: 50px;margin-top: 40px;">AAtraining</h1>
    </center>


        </aside>

        <main>
            <div class="mCont">
                <div class="notices">
                </div>

                <div class="signIn formHeading">
                    <h2><center>Вход за клиенти:</center></h2>
                </div>


                <form accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓">

                    <fieldset>
                        <div class="fieldCont">
                            <input required="required" type="email" name="username" id="user_email">
                            <label class="over">Вашият е-майл адрес</label>
                        </div>

                        <div class="fieldCont last">
                            <input autocomplete="off"  required="required" type="password" name="password" id="user_password">
                            <label class="over">Парола</label>
                        </div>

                    </fieldset>

                    <div class="formActions">
                        <div class="buttonCont">
                            <input type="submit" name="login" value="Вход" data-disable-with="Вход">
                        </div>
                    </div>
                </form>
                <div class="otherLinks">
                    <a href="/register.php">Регистрация</a>
                    <hr>
                    <p class="brag">AAtraining Powered by:<a href="http://borisov.eu">I.Borisov</a></p>
                </div>

            </div>
        </main>
    </div>



</body>

</html>
