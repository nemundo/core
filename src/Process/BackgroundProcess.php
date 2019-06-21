<?php

namespace Nemundo\Core\Process;


class BackgroundProcess extends Process
{


    public function run()
    {


        $pid = exec($this->command . ' > '.$this->outputFilename.' & echo $!', $output);


        //echo 'pid: '.$pid;
        /*if (posix_getpgid($pid)) {
            echo 'process is running';
        }*/


        return $pid;


    }

}