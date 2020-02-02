<?php
namespace Green;

use Green\Transmitter\DomesticRail;
use Green\Transmitter\TransmitterInterface;

/**
 * Class Calculator
 * @package Green
 */
class Calculator
{
    const DISTANCE_ALTERNATIVE_THRESHOLD_IN_KM = 1500;

    /**
     * @var TransmitterInterface[]
     */
    private $transmitters = [];

    /**
     * @param TransmitterInterface $transmitter
     */
    public function addGreenhouseTransmitter(TransmitterInterface $transmitter):void
    {
        $this->transmitters[] = $transmitter;
    }

    /**
     * @return float
     */
    public function getGlobalEmission():float
    {
        $global = 0;
        foreach ($this->transmitters as $transmitter) {
            $global += $transmitter->getEmission();
        }
        return $global;
    }

    /**
     * @return array array of strings detailing every transmitter emissions
     */
    public function getDetailedEmissions():array
    {
        $detail = [];
        foreach ($this->transmitters as $transmitter) {
            $detail[] = sprintf(
                '%.2fg emitted using a %s on %.2fkm distance.',
                $transmitter->getEmission(),
                $transmitter::getTransmitterName(),
                $transmitter->getDistanceKm()
            );
        }
        return $detail;
    }

    /**
     * @return float
     */
    public function getAlternativeEmission():float
    {
        $global = 0;
        foreach ($this->transmitters as $transmitter) {
            $transmitter = $this->getAlternativeTransmitter($transmitter);
            $global += $transmitter->getEmission();
        }
        return $global;
    }

    /**
     * @return array array of strings detailing every transmitter emissions
     */
    public function getDetailedAlternativeEmissions():array
    {
        $detail = [];
        foreach ($this->transmitters as $transmitter) {
            $transmitter = $this->getAlternativeTransmitter($transmitter);
            $detail[] = sprintf(
                '%.2fg emitted using a %s on %.2fkm distance.',
                $transmitter->getEmission(),
                $transmitter::getTransmitterName(),
                $transmitter->getDistanceKm()
            );
        }
        return $detail;
    }

    /**
     * @param TransmitterInterface $transmitter
     * @return TransmitterInterface
     */
    protected function getAlternativeTransmitter(TransmitterInterface $transmitter):TransmitterInterface
    {
        if ($transmitter->getDistanceKm() <= self::DISTANCE_ALTERNATIVE_THRESHOLD_IN_KM) {
            $railAlternative = new DomesticRail();
            $railAlternative->setDistanceKm($transmitter->getDistanceKm());
            $railAlternative->hasTravelBack($transmitter->isTravelBack());
            return $railAlternative;
        }
        return $transmitter;
    }
}