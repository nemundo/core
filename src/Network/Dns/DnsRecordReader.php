<?php

namespace Nemundo\Core\Network\Dns;

use Nemundo\Core\Base\DataSource\AbstractDataSource;

class DnsRecordReader extends AbstractDataSource
{

    public $domain;

    protected function loadData()
    {

        /*
[host] => luzern.com
[class] => IN
[ttl] => 300
[type] => NS
[target] => ns1.frey-net.ch
*/


        $recordList = dns_get_record($this->domain);

        foreach ($recordList as $record) {

            $dnsRecord = new DnsRecord();
            $dnsRecord->host = $record['host'];
            $dnsRecord->ttl = $record['ttl'];
            $dnsRecord->type = $record['type'];

            if (isset($record['target'])) {
            $dnsRecord->target = $record['target'];
            }
            $this->addItem($dnsRecord);


        }

        //print_r($result);

    }

}