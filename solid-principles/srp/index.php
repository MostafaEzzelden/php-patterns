<?php

/**
 * Single Responsibility Principle
 * This states that a class should have a single responsibility, but more than that,
 * a class should only have one reason to change.
 */

interface SalesOutputInterface
{
    public function output($data);
}

class SalesOutputHTML implements SalesOutputInterface
{
    public function output($data)
    {
        return "<h1>Sales: $data</h1>";
    }
}

class SalesOutputJSON implements SalesOutputInterface
{
    public function output($data)
    {
        return json_encode(['sales' => $data]);
    }
}

class SalesOutputXML implements SalesOutputInterface
{
    public function output($data)
    {
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $xml->addChild('sales',  $data);
        return $xml->asXML();
    }
}

interface SalesRepositoryInterface
{
    public function between($startDate, $endDate);
}
class SalesRepository implements SalesRepositoryInterface
{
    public function between($startDate, $endDate)
    {
        // connect to db and return results.
        return "Charge from {$startDate} to {$endDate} is 48.7";
    }
}

class SalesReporter
{
    private $repo;

    public function __construct(SalesRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formatter)
    {
        $sales = $this->repo->between($startDate, $endDate);
        return $formatter->output($sales);
    }
}

// Client Code...
$salesReport = new SalesReporter(new SalesRepository);
$startDate = date('Y-m-d');
$endDate = date('Y-m-d', strtotime('-3 Months'));

$salesReportToHTML = $salesReport->between($startDate, $endDate, new SalesOutputHTML);
$salesReportToJSON = $salesReport->between($startDate, $endDate, new SalesOutputJSON);
$salesReportToXML = $salesReport->between($startDate, $endDate, new SalesOutputXML);

var_dump($salesReportToHTML);
var_dump($salesReportToJSON);
var_dump($salesReportToXML);
