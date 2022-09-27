<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Base\AbstractBase;


class Authentication extends AbstractBase
{

    /**
     * @var bool
     */
    public $authenticate = false;

    public $username;

    public $password;


}