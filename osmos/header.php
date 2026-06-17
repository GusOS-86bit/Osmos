      <?php
        
        $corner_image = "images/placeholder_male.jpg";
        if(isset($user_data))
            {
                $corner_image = $user_data['profile_image'];
            }

      ?> 
       
       <div id ="orange_bar">
            <div style="width: 800px; margin: auto; font-size: 30px; ">

                <a href="index.php" style="color:black; text-decoration: none;"> Osmos </a>
                
                &nbsp &nbsp <input = "text" id="search_box" placeholder="Search for people and posts">

                <a href="profile.php">

                    <img src="<?php echo $corner_image  ?>" style="width: 50px;float: right;">
                </a>
                <a href="logout.php">
                <span style="font-size:11px;float:right;margin:10px;color:black;">Logout</span>
                </a>
            </div>
        </div>