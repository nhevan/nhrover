<?php


namespace NHRover\Models;


use NHRover\Contracts\PinInterface;
use NHRover\Contracts\WheelInterface;

/**
 * Class Wheel
 * @package NHRover\Models
 */
class WheelL293d implements WheelInterface
{
    /**
     * @var
     */
    private $forward_pin;
    /**
     * @var
     */
    private $backward_pin;

    /**
     * Wheel constructor.
     * @param $forward_pin
     * @param $backward_pin
     */
    public function __construct(PinInterface $forward_pin, PinInterface $backward_pin)
    {
        $this->forward_pin = $forward_pin;
        $this->backward_pin = $backward_pin;

        $this->forward_pin->setMode('output');
        $this->backward_pin->setMode('output');
    }

    /**
     * @return mixed
     */
    public function rotateCW()
    {
        $this->forward_pin->setValue(true);
    }

    /**
     * @return mixed
     */
    public function rotateCCW()
    {
        $this->backward_pin->setValue(true);
    }

    /**
     * Stops the rotation of the wheel
     * @return mixed
     */
    public function stop()
    {
        $this->forward_pin->setValue(false);
        $this->backward_pin->setValue(false);
    }
}