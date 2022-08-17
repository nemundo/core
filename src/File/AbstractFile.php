<?phpnamespace Nemundo\Core\File;use Nemundo\Core\Base\AbstractBase;use Nemundo\Core\Log\LogMessage;use Nemundo\Core\Type\DateTime\DateTime;abstract class AbstractFile extends AbstractBase{    protected $filename;    public function __construct($filename)    {        $this->filename = $filename;    }    public function getFilename()    {        $filename = basename($this->filename);        return $filename;    }    public function getFullFilename()    {        return $this->filename;    }    public function getFileExtension()    {        //$filename = strtolower($this->filename);        $extensionList = explode('.', $this->filename);        $pointCount = count($extensionList) - 1;        $extension = $extensionList[$pointCount];        return $extension;    }    public function getFilenameWithoutFileExtension()    {        $filename = basename($this->filename, '.' . $this->getFileExtension());        return $filename;    }    public function fileExists()    {        $returnValue = false;        if ($this->isFile()) {            if (file_exists($this->filename)) {                $returnValue = true;            }        }        return $returnValue;    }    public function fileNotExists()    {        $value = !$this->fileExists();        return $value;    }    // getFileSizeInByte    public function getFileSize()    {        $filesize = filesize($this->filename);        return $filesize;    }    public function getFileSize2()    {        $fileSize = new FileSize($this->getFileSize());        return $fileSize;    }    public function getCreateDateTime()    {        $timestamp = filemtime($this->filename);        $dateTime = (new DateTime())->fromTimestamp($timestamp);        return $dateTime;    }    public function getModifyDateTime()    {    }    public function getPath()    {        $path = dirname($this->filename) . DIRECTORY_SEPARATOR;        return $path;    }    public function isFile()    {        $value = is_file($this->filename);        return $value;    }    // isPath    public function isDirectory()    {        $value = is_dir($this->filename);        return $value;    }    // saveFile    // copyFile    public function saveAs($filename)    {        /*         * soll beim Setup erstellt werden!        $directory = new Directory();        $directory->path = dirname($filename);        $directory->createDirectory();*/        if ($this->fileExists()) {            if (!@copy($this->getFullFilename(), $filename)) {                $error = error_get_last();                (new LogMessage())->writeError($error['type'] . $error['message']);            }        } else {            (new LogMessage())->writeError('Datei ' . $this->fullFilename . ' existiert nicht.');        }    }    public function deleteFile()    {        if ($this->fileExists()) {            if (!@unlink($this->filename)) {                (new LogMessage())->writeError(error_get_last()['message'] . ' Filename:' . $this->filename);            }        } else {            (new LogMessage())->writeError('Delete File Error. File does not exist. Filename:' . $this->filename);        }    }    // abstract getText()    // class TextFile    // class CsvFile    // class ImageFile}