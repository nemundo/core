<?php


namespace Nemundo\Core\Http\Request\Get;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;

class GetRequestReader extends AbstractDataSource
{

    protected function loadData()
    {

        foreach ($_GET as $key => $value) {

             //(new Debug())->write("$key === $value");

            $getRequest = null;
            $getRequest[$key] = $value;
            $this->addItem($getRequest);
        }

        //       $url = $_SERVER['REQUEST_URI'];
        // temporäres GET Array
        //$this->get = $_GET;
        // muss aus parse_url ausgelesen werden!!!

        //   parse_str(parse_url($this->url, PHP_URL_QUERY), $this->requestList);


        // TODO: Implement loadData() method.
    }

}