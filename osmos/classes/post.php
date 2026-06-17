<?php
class Post 
{       

    private $error = "";

    public function create_post($user_id, $data, $files)
    {
        if(!empty($data['post']) || !empty($files['file']['name']))
        {
            $myimage = "";
            $has_image = 0;
            $is_cover_image = 0;
            $is_profile_image = 0;
            

            if(isset($data['is_profile_image']) || isset($data['is_cover_image']))
            {
                $myimage= $files;
                $has_image = 1;
                 if(isset($data['is_cover_image']))
                {
                    $is_cover_image = 1;
                }

                if(isset($data['is_profile_image']))
                {
                    $is_profile_image = 1;
                }
            }else
            { 

                if(!empty($files['file']['name']))
                {
                    $image_class = new Image();
                    $folder = "uploads/" . $userid . "/";

                            if(!file_exists($folder))
                                {
                                    mkdir($folder, 0777, true);
                                }

                            $image_class = new Image();

                            $myimage = $folder . $image_class->generate_filename(15);
                            move_uploaded_file($_FILES['file']['tmp_name'],   $myimage);

                            $image_class->resize_image($myimage,$myimage, 1500, 1500);
                    
                    $has_image = 1;
                }
            }

            $post="";
            if(isset($data['post']))
                {
                    $post = addslashes($data['post']);
                }

            
            $post_id = $this->create_postid();

            $query = "insert into posts (post_id, user_id, post, image, has_image, is_cover_image , is_profile_image) values ('$post_id', '$user_id', '$post' ,'$myimage', '$has_image','$is_cover_image' , '$is_profile_image')";

            $DB= new Database();
            $DB->save($query);

        }else
        {
            $this->$error .= "Please type something to post! <br>";
        }

    return $this->error;
    }

    public function get_post($id){

            $query = "select * from posts where user_id = '$id'order by id desc limit 10";

            $DB= new Database();
            $result = $DB->read($query);

            if($result)
                {
                    return $result;
                }else{
                    return false;
                }
    }


    private function create_postid()
    {
        $length = rand(4,19);
        $number = "";
        for($i = 0; $i < $length; $i++)
        {
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }
        return $number;
    }

}