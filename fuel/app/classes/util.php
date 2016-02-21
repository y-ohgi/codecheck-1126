<?php

class Util{

    /**
     * プロファイル用画像の生成
     *
     * @return {string|false} 画像の保存に成功した場合は画像のパスを, 失敗した場合はfalseを返す
     */
    public static function create_profileimage(){
        $width = 200;
        $height = 200;

        $rectmax_w = 150;
        $rectmin_w = $width - $rectmax_w;

        $rectmax_h = 150;
        $rectmin_h = $height - $rectmax_h;;

        $colornum = 3;
        $rectnum = 5;

        $img= imagecreatetruecolor($width, $height);

        $white = imagecolorallocate($img, 225, 225, 225);
        imagefilledrectangle($img, 0, 0, $width, $height, $white);

        for($i=0;$i<$colornum;$i++){
            $color[]= imagecolorallocate($img,rand(0, 255), rand(0, 255), rand(0, 255));
        }

        for($i=0;$i<$rectnum;$i++){

            $w = rand($rectmin_w, $rectmax_w);
            $h = rand($rectmin_h, $rectmax_h);
    
            $x = rand(25, $width-$w);
            $y = rand(25, $height-$h);
    
            imagefilledrectangle($img, $x, $y, $w, $h, $color[rand(0, $colornum-1)]);
        }

        $imgpath = DOCROOT. "upload/" . Str::random('unique') . ".png";
        $image = imagepng($img,  $imgpath);

        imagedestroy($img);

        return $image?$imgpath:false;
    }
        
}
