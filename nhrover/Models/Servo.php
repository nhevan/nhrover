<?php


namespace NHRover\Models;


use NHRover\Contracts\ServoInterface;

class Servo implements ServoInterface
{

    private $pin;

    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    /**
     * @return mixed
     */
    public function gotoMax()
    {
        exec("sudo python3 nhrover/scripts/servo.py $this->pin 1");
    }

    /**
     * @return mixed
     */
    public function gotoMin()
    {
        exec("sudo python3 nhrover/scripts/servo.py $this->pin -1");
    }

    /**
     * @return mixed
     */
    public function gotoMid()
    {
        exec("sudo python3 nhrover/scripts/servo.py $this->pin 0");
    }
}