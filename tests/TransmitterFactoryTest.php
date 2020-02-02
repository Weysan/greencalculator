<?php
namespace Green\Tests;

use Green\TransmitterFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class TransmitterFactoryTest
 * @package Green\Tests
 */
class TransmitterFactoryTest extends TestCase
{
    public function testNoFileExists()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('file_doesnt_exists.yml does not exist. Create file_doesnt_exists.yml file.');
        TransmitterFactory::getTransmittersFromFile('file_doesnt_exists.yml');
    }
}
