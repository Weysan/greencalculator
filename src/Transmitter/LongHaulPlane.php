<?php
namespace Green\Transmitter;

/**
 * Class LongHaulPlane
 * @package Green\Transmitter
 */
class LongHaulPlane implements TransmitterInterface
{
    const GREENHOUSE_EMISSION_PER_KM_PER_PASSENGER_IN_G = '195';

    private $distanceKm = 0;

    private $hasTravelBack = false;

    /**
     * @param float $distanceKm
     */
    public function setDistanceKm(float $distanceKm): void
    {
        $this->distanceKm = $distanceKm;
    }

    /**
     * @return float
     */
    public function getDistanceKm(): float
    {
        return $this->distanceKm;
    }

    /**
     * @param bool $travelBack
     */
    public function hasTravelBack(bool $travelBack): void
    {
        $this->hasTravelBack = $travelBack;
    }

    /**
     * @return bool
     */
    public function isTravelBack(): bool
    {
        return $this->hasTravelBack;
    }

    /**
     * @return float
     */
    public function getEmission(): float
    {
        $distanceMultiplicator = 1;
        if ($this->hasTravelBack) {
            $distanceMultiplicator = 2;
        }
        return self::GREENHOUSE_EMISSION_PER_KM_PER_PASSENGER_IN_G * $this->distanceKm * $distanceMultiplicator;
    }

    /**
     * @return string
     */
    public static function getTransmitterName(): string
    {
        return 'Long Haul Plane';
    }
}
