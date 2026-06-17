<?php

class Image 
{

    public function generate_filename($length)
    {   
        $array = array(0,1,2,3,4,5,6,7,8,9,'a', 'A',
                                            'b', 'B',
                                            'c', 'C',
                                            'd', 'D',
                                            'e', 'E',
                                            'f', 'F',
                                            'g', 'G',
                                            'h', 'H',
                                            'i', 'I',
                                            'j', 'J',
                                            'k', 'K',
                                            'l', 'L',
                                            'm', 'M',
                                            'n', 'N',
                                            'o', 'O',
                                            'p', 'P',
                                            'q', 'Q',
                                            'r', 'R',
                                            's', 'S',
                                            't', 'T',
                                            'u', 'U',
                                            'v', 'V',
                                            'w', 'W',
                                            'x', 'X',
                                            'y', 'Y',
                                            'z', 'Z');
        $text = "";

        for($x= 0; $x < $length ; $x++)
            {
                $random = rand(0, 61);
                $text .= $array[$random];
            }
        return $text;
    }

    public function crop_image($original_file_name, $cropped_file_name, $max_width, $max_height)
    {   
        if(file_exists($original_file_name))
        {
            $original_image = imagecreatefromjpeg($original_file_name);

            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            
            $original_aspect = $original_width / $original_height;
            $max_aspect = $max_width / $max_height;

            if ($original_aspect >= $max_aspect) {

            $new_height = $max_height;
                $new_width = $original_width * ($max_height / $original_height);
            } else {
                $new_width = $max_width;
                $new_height = $original_height * ($max_width / $original_width);
            }

            $new_image = imagecreatetruecolor($new_width, $new_height);
            
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

            imagedestroy($original_image);

            
            $x = round(($new_width - $max_width) / 2);
            $y = round(($new_height - $max_height) / 2);

            $new_cropped_image = imagecreatetruecolor($max_width, $max_height);
            
            imagecopyresampled($new_cropped_image, $new_image, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);

            imagedestroy($new_image);

            imagejpeg($new_cropped_image, $cropped_file_name, 90);

            imagedestroy($new_cropped_image);
        }
    }

    public function resize_image($original_file_name, $resized_file_name, $max_width, $max_height)
    {   
        if(file_exists($original_file_name))
        {
            $original_image = imagecreatefromjpeg($original_file_name);

            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            
            $original_aspect = $original_width / $original_height;
            $max_aspect = $max_width / $max_height;

            if ($original_aspect >= $max_aspect) {

            $new_height = $max_height;
                $new_width = $original_width * ($max_height / $original_height);
            } else {
                $new_width = $max_width;
                $new_height = $original_height * ($max_width / $original_width);
            }

            $new_image = imagecreatetruecolor($new_width, $new_height);
            
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

            imagedestroy($original_image);

            
            $x = round(($new_width - $max_width) / 2);
            $y = round(($new_height - $max_height) / 2);

        


            imagejpeg($new_image, $resized_file_name, 90);

            imagedestroy($new_image);
        }
    }

    public function get_thumb_cover($filename) 
    {
        $thumbnail = $filename . "_cover_thumb_.jpg";
        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }
        $this->crop_image($filename, $thumbnail, 1366, 488);

        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }else
            {
                return $filename;
            }
    }

    public function get_thumb_profile($filename) 
    {
        $thumbnail = $filename . "_profile_thumb.jpg";
        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }
        $this->crop_image($filename, $thumbnail, 600, 600);

        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }else
            {
                return $filename;
            }
    }

    public function get_thumb_post($filename) 
    {
        $thumbnail = $filename . "_post_thumb_.jpg";
        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }
        $this->crop_image($filename, $thumbnail, 600, 600);

        if(file_exists($thumbnail))
            {
                return $thumbnail;
            }else
            {
                return $filename;
            }
    }

}