<?php

    session_start();
     
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['osmos_userid']);

?>
<!DOCTYPE html> 


<html> 
    <head>
        <title>Profile | Osmos</title>
    </head>
    <style type="text/css">
        #orange_bar{
            height: 50px;
            background-color: #FFC10F;
            color: #000000;
            padding: 4px;
        }

        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 4px;
            border: none;
            padding: 4px;
            font-size: 14px;
            background-image: url(SearchIcon.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 10% 100%;

        }

        #profile_pic{
            width: 150px;
            border-radius: 50%;
            border: solid 2px white;
        }

        #menu_buttons{
            width: 100px;
            display: inline-block;
            margin: 2px;

        }

        #friends_img{
            width: 75px;
            float: left;
            margin: 8px;
        }

        #friends_bar{
            min-height: 400px;
            margin-top: 20px;
            color: #405d9b;
            padding: 10px;
            text-align: center;
            font-size: 20px;
        }

        #friends{
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: #405d9b;
        }

        textarea{
            width: 100%;
            border: none;
            font-family: tahoma;
            font-size: 14px;
            height: 60px;
        }

        #post_button{
            float: right;
            background-color: #FFC10F;
            color: black;
            border: none;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            margin-top: 10px;
            width: 50px;
        }

        #posts_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }

        #post{
            display: flex;
            padding: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
    <body style="font-family: tahoma;" style="background-color: #d0d8e4;">
        <br>
        <!--top bar-->
        <?php include("header.php") ?>

        <div>

        <!--cover area-->
        <div style="width: 800px; margin:auto; min-height: 400px;">

       
            <!--Below the cover area-->

            <div style="display: flex;">
                        <!--Friends area-->
                <div style="min-height: 400px; flex: 1;">

                    <div id="friends_bar">
                        <img id="profile_pic" src="profilePic.jpeg"><br>
                        <a href="profile.php" style="text-decoration: none;">
                            <?php echo $user_data['first_name'] . " <br>" . $user_data['last_name'] ?>
                        </a>
                    </div>

                </div>

                        <!--Posts area-->
                <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
                    <div style="border:solid thin #aaa; padding: 10px; background-color: white; overflow: hidden;">

                        <textarea placeholder="What's on you're mind?"></textarea>
                        <br>
                        <input id="post_button" type="submit" value="Post">
                        <br>
                    </div>

                
                    <!--Posts -->
                    <div id ="posts_bar">
                        <!--Post 1 -->
                        <div  id="post">
                            <div>
                                <img src="user1.jpeg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">Jane Doe</div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <br><br>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="color:#999;">1 hour ago</span>
                            </div>
                        </div> 
                        
                        

                        <!--Post 2 -->
                        <div  id="post">
                            <div>
                                <img src="user2.jpeg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">Alex Morgan</div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <br><br>
                                <a href="">Like</a> . <a href="">Comment</a> . <span style="color:#999;">1 hour ago</span>
                            </div>

                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
