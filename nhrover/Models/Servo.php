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
        exec("sudo python3 nhrover/scripts/servo.py $this->pin -1");
    }

    /**
     * @return mixed
     */
    public function gotoMin()
    {
        exec("sudo python3 nhrover/scripts/servo.py $this->pin 1");
    }

    /**
     * @return mixed
     */
    public function gotoMid()
    {
        exec("sudo python3 nhrover/scripts/servo.py $this->pin 0");
    }
}