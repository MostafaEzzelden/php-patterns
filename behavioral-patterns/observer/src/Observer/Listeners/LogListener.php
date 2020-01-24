<?php

namespace App\Observer\Listeners;

use App\Observer\ObserverInterface;
use App\Observer\Listeners\ListenersInterface;

/**
 * This Concrete Component logs any events it's subscribed to.
 */
class LogListener implements ListenersInterface
{
    private $filename;

    public function __construct(string $filename = null)
    {
        $this->filename = $filename ?: __DIR__ . "/../../data/logs/info.txt";

        if (!file_exists($this->filename)) {
            $fp = fopen($this->filename, 'w');
            fwrite($fp, "");
            fclose($fp);
            chmod($this->filename, 0777);
        }
    }

    public function handle(ObserverInterface $handler, string $event = null, $data = null)
    {
        $entry = date("Y-m-d H:i:s") . ": '$event' with data '" . json_encode($data) . "'\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);
        echo "LogHandler: I've written '$event' entry to the log.\n";
    }
}
