<?php


namespace NHRover\Models;


use NHRover\Contracts\PinInterface;
use NHRover\Contracts\ServoInterface;

class Servo implements ServoInterface
{

    private $pin;

    /**
     * Servo constructor.
     * @param PinInterface $pin
     */
    public function __construct(PinInterface $pin)
    {
        $this->pin = $pin;
        $this->pin->setMode("output");
    }

    /**
     * @return mixed
     */
    public function gotoMax()
    {
        exec("pigs SERVO $this->pin 1000");
    }

    /**
     * @return mixed
     */
    public function gotoMin()
    {
        exec("pigs SERVO $this->pin 2000");
    }

    /**
     * @return mixed
     */
    public function gotoMid()
    {
        exec("pigs SERVO $this->pin 1500");
    }
}