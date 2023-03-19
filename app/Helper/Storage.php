<?php

namespace App\Helper;

use App\Helper\Uuid;

class Storage
{
    public static function uploadImageProperties($fileImage)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = UUid::createNameForImage($ext);
      $fileImage->move(base_path("public/assets/img/properties"), $name);

      return $name;
    }

    public static function uploadImageAgent($fileImage)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = UUid::createNameForImage($ext);
      $fileImage->move(base_path("public/assets/img/agent"), $name);

      return $name;
    }

    public static function uploadImageMessage($fileImage)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = UUid::createNameForImage($ext);
      $fileImage->move(base_path("public/assets/img/message"), $name);

      return $name;
    }

    public static function uploadImageBooking($fileImage)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = UUid::createNameForImage($ext);
      $fileImage->move(base_path("public/assets/img/booking"), $name);

      return $name;
    }
}
