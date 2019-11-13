<?php

namespace Nemundo\Core\Xml\Response;

use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\File\Directory;
use Nemundo\Core\Type\File\File;
use Nemundo\Web\Http\Response\ContentType;
use Nemundo\Web\Http\Response\HttpResponse;


class XmlDocument extends AbstractDocument
{

    /**
     * @var bool
     */
    public $formatOutput = false;

    /**
     * @var \DOMDocument
     */
    private $doc;

    /**
     * @var XmlItem[]
     */
    private $itemList = array();


    public function addItem(XmlItem $item)
    {
        $this->itemList[] = $item;
    }


    private function createElement(XmlItem $item, $document)
    {

        $domElement = $this->doc->createElement($item->tagName, htmlspecialchars($item->value));

        // Attribute hinzufügen
        foreach ($item->getAttributeList() as $attributeName => $attributeValue) {
            $domAttribute = $this->doc->createAttribute($attributeName);
            $domAttribute->value = htmlspecialchars($attributeValue);
            $domElement->appendChild($domAttribute);
        }

        $document->appendChild($domElement);

        foreach ($item->getData() as $childElement) {
            $this->createElement($childElement, $domElement);
        }


    }


    protected function createXml()
    {

        $this->doc = new \DOMDocument();
        $this->doc->formatOutput = $this->formatOutput;

        foreach ($this->itemList as $element) {
            $this->createElement($element, $this->doc);
        }

    }


    public function getXml()
    {

        $this->createXml();
        return $this->doc->saveXML();

    }


    public function saveFile()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }

        $this->createXml();

        $path = (new File($this->filename))->getPath();

        if (!(new File($path))->fileExists()) {
            (new Directory($path))->createDirectory();
        }

        $this->doc->xmlStandalone = true;
        $this->doc->save($this->filename);

    }


    public function render()
    {

        $response = new HttpResponse();
        $response->contentType = ContentType::XML;
        $response->content = $this->getXml();

    }

}