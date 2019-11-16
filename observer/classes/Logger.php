<?php

/**
 * This Concrete Component logs any events it's subscribed to.
 */
class Logger implements \SplObserver
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        if (!file_exists($this->filename)) {
            $fp = fopen($this->filename, 'w');
            fwrite($fp, "");
            fclose($fp);
            chmod($this->filename, 0777);
        }
    }

    public function update(\SplSubject $repository, string $event = null, $data = null): void
    {
        $entry = date("Y-m-d H:i:s") . ": '$event' with data '" . json_encode($data) . "'\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        echo "Logger: I've written '$event' entry to the log.</br>";
    }
}
