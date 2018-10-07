<?php
namespace PauSabe\CBCN\utils;

class ImageFile{

    private $file;

    public function __construct($file){
        $this->file = $file;
    }

    public function generateFullImage($destination){
        $imagick = new \Imagick($this->file);
        if($imagick->getImageWidth() > 1080 && !$imagick->resizeImage(1080, 0, \Imagick::FILTER_QUADRATIC, .6)){
            return false;
        }
        return file_put_contents($destination, $imagick->getImageBlob());
    }

    public function generateThumbnail($destination){
        $imagick = new \Imagick($this->file);
        if(!$imagick->resizeImage(20, 0, \Imagick::FILTER_POINT, 1)) return false;
        return file_put_contents($destination, $imagick->getImageBlob());
    }

    public static function getImageUrl($image_name){
        return "/static/imgs/".$image_name;
    }

}
