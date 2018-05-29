<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\PinInterface;

/**
 * Class Pin
 * @package NHRover\Models
 */
class Pin implements PinInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var
     */
    private $bcim_pin_number;

    /**
     * Pin constructor.
     * @param $bcim_pin_number
     * @param LoggerInterface $logger
     */
    public function __construct($bcim_pin_number, LoggerInterface $logger = null)
    {
        $this->logger = $logger ? $logger : new OnScreenLogger();
        $this->bcim_pin_number = $bcim_pin_number;
    }

    /**
     * @param string $mode
     * @return mixed
     */
    public function setMode($mode = 'output')
    {
        $this->logger->info("Setting BCIM pin $this->bcim_pin_number mode to $mode ...");
    }

    /**
     * @param bool $value
     * @return mixed
     */
    public function setValue($value = true)
    {
        $this->logger->info("Setting BCIM pin $this->bcim_pin_number value to $value ...");
    }
}