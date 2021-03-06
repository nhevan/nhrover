<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\PinInterface;
use PiPHP\GPIO\GPIO;

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
     * @var \PiPHP\GPIO\Pin\OutputPin|\PiPHP\GPIO\Pin\OutputPinInterface
     */
    private $pin;

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
        $this->logger->dump("Setting BCIM pin $this->bcim_pin_number mode to $mode ...");

        $gpio = new GPIO();
        $this->pin = $gpio->getOutputPin($this->bcim_pin_number);
    }

    /**
     * @param bool|int $value
     * @return mixed
     */
    public function setValue($value = 1)
    {
        $this->logger->dump("Setting BCIM pin $this->bcim_pin_number value to $value ...");

        $this->pin->setValue($value);
    }

    /**
     * @return int
     */
    public function getValue(){
        $this->logger->dump("Getting value of BCIM pin $this->bcim_pin_number ...");

        return $this->pin->getValue();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string) $this->bcim_pin_number;
    }
}