<?php
namespace Green;

use Green\Transmitter\LongHaulPlane;
use Green\Transmitter\TransmitterInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Class TransmitterFactory
 * @package Green
 */
class TransmitterFactory
{
    const COLLECTION_ITEMS_KEY_YAML = 'items';

    /**
     * @param string $ymlFile
     * @return TransmitterInterface[]
     * @throws \Exception
     */
    public static function getTransmittersFromFile(string $ymlFile):array
    {
        if (!file_exists($ymlFile)) {
            throw new \Exception(sprintf('%s does not exist. Create %s file.', $ymlFile, $ymlFile));
        }
        $collection = [];
        $parsedFileItems = Yaml::parseFile($ymlFile);
        foreach ($parsedFileItems[self::COLLECTION_ITEMS_KEY_YAML] as $parsedFileItem) {
            $collection[] = self::getTransmitterFromParsedItem($parsedFileItem);
        }
        return $collection;
    }

    /**
     * @param array $item
     * @return TransmitterInterface
     * @throws \Exception
     */
    private static function getTransmitterFromParsedItem(array $item):TransmitterInterface
    {
        switch ($item['type']) {
            case "long_haul_plane":
                $transmitter = new LongHaulPlane();
                break;
            default:
                throw new \Exception(sprintf('%s does not exist', $item['type']));
                break;
        }
        $transmitter->setDistanceKm($item['distance_km']);
        $transmitter->hasTravelBack($item['has_travel_back']);
        return $transmitter;
    }
}