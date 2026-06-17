<?php
    session_start();
    

        
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");
    include("classes/image.php");



$login = new Login();
$user_data = $login->check_login($_SESSION['osmos_userid']);
// For posting , starts here 

    if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            $post = new Post();
            $id = $_SESSION['osmos_userid'];
            $result = $post->create_post($id, $_POST, $_FILES);

            if($result == "")
                {
                    header("Location: profile.php");
                    die;
                }else{
                    echo "<div style = 'text-align:center;font-size:12px;color:white;background-color:grey;'>";
                    echo "The following errors occurred<br>";
                    echo $result;
                    echo "</div>";
                }
            
        }


        // collecting the posts

            $post = new Post();
            $id = $_SESSION['osmos_userid'];

            $posts = $post->get_post($id);

        // collecting friends

            $user = new User();
            $id = $_SESSION['osmos_userid'];

            $friends = $user->get_friends($id);

            $image_class = new Image();
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
            margin-top: -200px;
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
            background-color: #FFC10F;
            min-height: 400px;
            margin-top: 20px;
            color: #aaa;
            padding: 10px;
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
        <?php include("header.php") ?>

        <div>

       <!--cover area-->
        <div style="width: 800px; margin:auto; min-height: 400px;">
            <div style="background-color: white; text-align: center; color: #405d9b; ">


                <?php

                $image = "images/cover_image.JPG";
                if(file_exists($user_data['cover_image']))
                {
                    $image = $image_class ->get_thumb_cover ($user_data['cover_image']);

                }
                

                ?>

                <img src="<?php echo $image ?>"style="width:100%">
                <?php

                $image = "images/placeholder_male.jpg";
                if($user_data['gender']== "Female")
                    {
                        $image= "image/placeholder_female.jpg";
                    }
                if(file_exists($user_data['profile_image']))
                {
                    $image = $image_class ->get_thumb_profile ($user_data['profile_image']);

                }
                

                ?>

                <span style="font-size: 11px;">
                    <img id="profile_pic" src="<?php echo $image ?>"><br/>
                    <a style="text-decoration: none;color:£0ff;" href="change_profile_image.php?change=profile">Change Profile Image </a> |
                    <a style="text-decoration: none;color:£0ff;" href="change_profile_image.php?change=cover">Change Cover </a>

                </span>
                <br>
                    <div style="font-size: 20px;"><?php echo $user_data['first_name']. " " . $user_data['last_name'] ?></div>
                <br>
                <a href="index.php"> <div id="menu_buttons">Timeline</div> </a>
                <div id="menu_buttons">About</div>
                <div id="menu_buttons">Friends</div> 
                <div id="menu_buttons">Photos</div> 
                <div id="menu_buttons">Settings</div>
                
            </div>
       
            <!--Below the cover area-->

            <div style="display: flex;">
                        <!--Friends area-->
                <div style="min-height: 400px; flex: 1;">

                    <div id="friends_bar">
                        Friends<br>
                     <?php
                        if($friends)
                            {
                                foreach($friends as $FRIEND_ROW){
                                    
                                    include("user.php");
                                }
                            } 
                        ?> 

                    </div>

                </div>

                        <!--Posts area-->
                <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
                    <div style="border:solid thin #aaa; padding: 10px; background-color: white; overflow: hidden;">

                        <form method="post" enctype="multipart/form-data">
                        <textarea name="post" placeholder="What's on you're mind?"></textarea>

                        <input type = "file" name="file">
                        <input id="post_button" type="submit" value="Post">
                        <br>
                        </form>
                    </div>

                
                    <!--Posts -->
                    <div id ="posts_bar">
                        <!--Post 1 -->
                        <?php
                        if($posts)
                            {
                                foreach($posts as $ROW){
                                    $user = new User();
                                    $ROW_USER = $user->get_user($ROW['user_id']);
                                    include("post.php");
                                }
                            } 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>