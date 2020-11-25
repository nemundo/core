<?php

namespace Nemundo\Core\Image\Exif;


use Nemundo\Core\Image\AbstractImage;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Geo\GeoCoordinate;


// ExifReader
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

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;

    public function __construct($imageFilename)
    {
        parent::__construct($imageFilename);
        $this->readExif($imageFilename);
    }


    public function hasCoordinate()
    {

        $value = false;
        if ($this->geoCoordinate !== null) {
            $value = true;
        }

        return $value;

    }


    private function readExif($imageFilename)
    {

        getimagesize($imageFilename, $info);

        if (isset($info['APP13'])) {
            $iptc = iptcparse($info['APP13']);
            if (isset($iptc['2#005'][0])) {
                $this->title = $iptc['2#005'][0];
            }
        }

        $keywords = '';
        if (isset($info['APP13'])) {
            $iptc = iptcparse($info['APP13']);
            if (isset($iptc['2#025'][0])) {
                $keywords = $iptc['2#025'][0];
            }
        }
        $gps['keywords'] = $keywords;

        if (exif_imagetype($imageFilename) == IMAGETYPE_JPEG) {
            $exif = @exif_read_data($imageFilename);
        }

        if (isset($exif['ImageDescription'])) {
            $this->description = $exif['ImageDescription'];
        }

        $gpsDateTime = '0000-00-00 00:00:00';
        if (isset($exif['DateTimeOriginal'])) {
            $gpsDateTime = $exif['DateTimeOriginal'];
            $gpsDateTime = substr_replace($gpsDateTime, '-', 4, 1);
            $gpsDateTime = substr_replace($gpsDateTime, '-', 7, 1);
        }
        $gps['datetime'] = $gpsDateTime;
        $this->dateTime = new DateTime($gpsDateTime);

        $camera = '';
        if (isset($exif['Make'])) {
            $camera = $exif['Make'];
        }

        if (isset($exif['Model'])) {
            $camera = $camera . ' ' . $exif['Model'];
        }
        $this->camera = $camera;

        $orientation = 0;
        if (isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
        }
        $this->orientation = $orientation;

        $gps['lat'] = -1;
        $gps['lon'] = -1;
        if (isset($exif['GPSLatitude'])) {

            $lon = $this->getGps($exif['GPSLongitude'], $exif['GPSLongitudeRef']);
            $lat = $this->getGps($exif['GPSLatitude'], $exif['GPSLatitudeRef']);

            $this->geoCoordinate = new GeoCoordinate();
            $this->geoCoordinate->longitude = $lon;
            $this->geoCoordinate->latitude = $lat;

        }

    }


    private function getGps($exifCoord, $hemi)
    {

        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

    }

    private function gps2Num($coordPart)
    {

        $parts = explode('/', $coordPart);

        if (count($parts) <= 0)
            return 0;

        if (count($parts) == 1)
            return $parts[0];

        return floatval($parts[0]) / floatval($parts[1]);

    }

}