<?php

namespace Nemundo\Core\Debug;


use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Table\Table;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Validation\UrlValidation;

class DebugTable extends AbstractBase
{


    public function writeTable($list)
    {

        $table = new Table();
        $table->border = 1;

        $count = 0;

        foreach ($list as $row) {

            // Header
            if ($count == 0) {

                $header = $row;

                $thead = new TableHeader($table);

                if (is_object($row)) {
                    $header = get_object_vars($row);
                }
                $header = array_keys($header);

                foreach ($header as $value) {
                    $thead->addText($value);
                }


            } else {

                if (is_object($row)) {
                    $row = get_object_vars($row);
                }

                $tableRow = new TableRow($table);

                foreach ($row as $item) {

                    if ((new UrlValidation())->isUrl($item)) {
                        $link = new Hyperlink($tableRow);
                        $link->content = $item;
                        $link->href = $item;
                        //$link->openNewWindow = true;

                    } else {
                        $tableRow->addText($item);
                    }

                }

            }

            $count++;

        }

        echo $table->getContent();

    }


}