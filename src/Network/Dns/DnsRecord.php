<?php

namespace Nemundo\Core\Network\Dns;

use Nemundo\Core\Base\AbstractBase;

class DnsRecord extends AbstractBase
{

    public $host;

    public $class;

    public $ttl;

    public $type;

    public $target;

    public $txt;

    /*
[host] => luzern.com
[class] => IN
[ttl] => 300
[type] => NS
[target] => ns1.frey-net.ch
*/

}