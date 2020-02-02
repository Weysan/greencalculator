<?php
use Green\TransmitterFactory;

require __DIR__ . '/../vendor/autoload.php';

$calculator = new \Green\Calculator();


$file = __DIR__ . '/transmitter.yaml';
try {
    $collection = TransmitterFactory::getTransmittersFromFile($file);
} catch (Exception $exception) {
    print sprintf('WARNING: %s', $exception->getMessage()) . "\n";
    exit;
}

foreach ($collection as $transmitter) {
    $calculator->addGreenhouseTransmitter($transmitter);
}

$emission = $calculator->getGlobalEmission(); //in gram per passenger

print sprintf('%.2ft Greenhouse gas emitted in total for 2019', $emission / 1000000) . "\n";
print "\n" . '-- DETAILS --' . "\n";
print join("\n", $calculator->getDetailedEmissions()) . "\n";

print "\n" . sprintf(
    '%.2ft Greenhouse gas emitted by using alternative transportation',
    $calculator->getAlternativeEmission() / 1000000
    ) . "\n";

print "\n" . '-- DETAILS ALTERNATIVE TRANSPORT --' . "\n";
print join("\n", $calculator->getDetailedAlternativeEmissions()) . "\n";