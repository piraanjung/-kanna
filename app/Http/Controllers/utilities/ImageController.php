<?php

namespace App\Http\Controllers\utilities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function getImagesUrl($results, $path, $index='image')
    {
      foreach ($results as $key => $value) {
        $image = $this->getImageUrl($value[$index], $path);
        $results[$key][$index.'_url'] = $image;
      }
  
      return $results;
    }
  
    public function getImageUrl($image, $path)
    {
      $image = $this->verifyImage($image, $path);
      if ($image =='thumbnail.png') {
        $image_url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/refuze-api/public/preview_images/'.$image;
      }else {
        $image_url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/refuze-api/public/'.$path.$image;
      }
      
      return $image_url;
    }
  
    private function verifyImage($image, $path)
    {
      $path_url = $_SERVER['DOCUMENT_ROOT'].'/refuze-api/public/'.$path.$image;
      if (!file_exists($path_url) || $image == NULL) $image = 'thumbnail.png';
      return $image;
    }
}
