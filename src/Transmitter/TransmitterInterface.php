<?php
namespace Green\Transmitter;

/**
 * Interface TransmitterInterface
 * @package Green\Transmitter
 */
interface TransmitterInterface
{
    /**
     * @param float $distanceKm
     */
    public function setDistanceKm(float $distanceKm):void;

    /**
     * @return float
     */
    public function getDistanceKm():float;

    /**
     * @param bool $travelBack
     */
    public function hasTravelBack(bool $travelBack):void;

    /**
     * @return bool
     */
    public function isTravelBack():bool;

    /**
     * @return float
     */
    public function getEmission():float;

    /**
     * @return string
     */
    public static function getTransmitterName():string;
}
