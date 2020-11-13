<?php

namespace Nemundo\Core\Image\Exif;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Image\AbstractImage;
use Nemundo\Core\Type\DateTime\DateTime;


class Exif extends AbstractImage
{

    public $title;

    public $description;

    /**
     * @var string
     */
    public $camera;

    public $orientation;

    /**
     * @var DateTime
     */
    public $dateTime;


    public function __construct($imageFilename)
    {
        parent::__construct($imageFilename);
        $this->readExif($imageFilename);
    }



/*
PHP Notice: getimagesize(): Read error! in /srv/web/dev_nemundo_com/lib/core/src/Image/Exif/Exif.php on line 44
PHP Notice: exif_imagetype(): Read error! in /srv/web/dev_nemundo_com/lib/core/src/Image/Exif/Exif.php on line 79
  */

    private function readExif($imageFilename)
    {

        // Title, Keyword auslesen
        //$size = getimagesize($imageFilename, $info);
        getimagesize($imageFilename, $info);


        //(new Debug())->write($info);


        // Title
        //$title = '';
        if (isset($info['APP13'])) {
            $iptc = iptcparse($info['APP13']);
            if (isset($iptc['2#005'][0])) {
                $this->title = $iptc['2#005'][0];
            }
        }


        //$gps['title'] = $title;

        // Keywords
        $keywords = "";
        if (isset($info['APP13'])) {
            $iptc = iptcparse($info['APP13']);
            if (isset($iptc['2#025'][0])) {
                $keywords = $iptc['2#025'][0];
            }
        }
        $gps['keywords'] = $keywords;


        //print_r($iptc);
        //exit;


       // $gps_int = array(-1, -1);*/

      if (exif_imagetype($imageFilename) == IMAGETYPE_JPEG) {
            $exif = @exif_read_data($imageFilename);
        }

        // Description
        $description = "";
        if (isset($exif['ImageDescription'])) {
            $this->description = $exif['ImageDescription'];
        }

        //$gps['description'] = $description;

        // DateTime
        $gpsDateTime = "0000-00-00 00:00:00";
        if (isset($exif['DateTimeOriginal'])) {
            $gpsDateTime = $exif['DateTimeOriginal'];
            $gpsDateTime = substr_replace($gpsDateTime, "-", 4, 1);
            $gpsDateTime = substr_replace($gpsDateTime, "-", 7, 1);
        }
        $gps['datetime'] = $gpsDateTime;
        $this->dateTime=new DateTime($gpsDateTime);


        // Camera (Make)
        $camera = '';
        if (isset($exif['Make'])) {
            $camera = $exif['Make'];
        }

        // Camera (Make)
        if (isset($exif['Model'])) {
            $camera = $camera .' ' . $exif['Model'];
        }

        $this->camera = $camera;

        //$gps['camera'] = $camera;

        // Orientation
        $orientation = 0;
        if (isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
        }
        $this->orientation = $orientation;

        //$gps['orientation'] = $orientation;

        // GPS
        /*$gps['lat'] = -1;
        $gps['lon'] = -1;
        if (isset($exif['GPSLatitude'])) {

            $lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
            $lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);

            $gps_int = array($lat, $lon);
            $gps['lat'] = $lat;
            $gps['lon'] = $lon;
        }*/


        //return $gps;

    }


    function getGps($exifCoord, $hemi)
    {

        $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    function gps2Num($coordPart)
    {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);
    }


}