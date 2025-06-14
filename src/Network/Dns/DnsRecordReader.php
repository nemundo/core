<?php

namespace Nemundo\Core\Network\Dns;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;

class DnsRecordReader extends AbstractDataSource
{

    public $domain;

    protected function loadData()
    {

        $recordList = dns_get_record($this->domain, DNS_ALL);

        foreach ($recordList as $record) {

            $dnsRecord = new DnsRecord();
            $dnsRecord->host = $record['host'];
            $dnsRecord->ttl = $record['ttl'];
            $dnsRecord->type = $record['type'];

            if (isset($record['txt'])) {
                $dnsRecord->txt = $record['txt'];
            }

            if (isset($record['target'])) {
                $dnsRecord->target = $record['target'];
            }
            $this->addItem($dnsRecord);

            //(new Debug())->write($record);

        }

    }

}