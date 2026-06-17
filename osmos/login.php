<?php
session_start();

    include("classes/connect.php");
    include("classes/login.php");

    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $login = new Login();
        $result=$login->evaluate($_POST);

        if($result != "")
        {
            echo "<div style = 'text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "The following errors occurred<br>";
            echo $result;
            echo "</div>";

        }else
        {
            header("Location: profile.php");
            die;
        }

            $email = $_POST['email'] ;
            $password = $_POST['password'] ;

    }

 

?>
 

<html>
    <head>
        <title>Osmos | Log in </title>
    </head>
    <style>
        #bar{height:100px;
            background-color: FFC10F;
            color: 000000;
            padding: 4px;
            }
        #signup_button{
            background-color: #800000;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right;
            color: white;
        }

        #login_bar{
            background-color: white;
            width:800px;
            margin: auto;
            margin-top: 50px;
            padding:10px;
            text-align: center;
            padding-top: 50px;
            font-weight: bold;

        }

        #text{
          height : 40px;
          width : 300px;
          border-radius:4px;
          border:solid 1px #aaa;
          padding: 4px;
          font-size: 14px;  
        }

        #button{
            width: 300px;
            height: 40px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            background-color: #800000;
            color: white; 

        }
    </style>
    <body style ="font-family: tahoma;background-color : #e9ebee;">
        <div id="bar">

            <div style="font-size: 40px;">Osmos</div>
            <div id="signup_button" >Signup</div>

        </div>

        <div>

            <div id="login_bar">

                <form method="post">
                Log in to Osmos <br><br>

                <input name="email" value="<?php echo $email ?>" type="text" id="text" placeholder="Email"><br><br>
                <input name="password" value="<?php echo $password ?>" type="password" id="text" placeholder="Password"><br><br>

                <input type="submit" id="button" value ="Login"><br>
                <br><br>
                </form> 

        </div>
    </body>
</html>