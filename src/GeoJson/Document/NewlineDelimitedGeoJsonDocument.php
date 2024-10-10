<?php

namespace Nemundo\Core\GeoJson\Document;

use Nemundo\Core\TextFile\Writer\TextFileWriter;

class NewlineDelimitedGeoJsonDocument extends AbstractGeoJsonDocument
{

    public $filename;

    protected function onWrite($fullFilename)
    {

        $file = new TextFileWriter($fullFilename);
        $file->overwriteExistingFile = $this->overwriteExistingFile;
        foreach ($this->featureList as $feature) {
            $file->addLine($feature->getJson());
        }
        $file->writeFile();

    }

}