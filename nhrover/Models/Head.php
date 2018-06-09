<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\PinInterface;
use NHRover\Contracts\RoverHead;
use NHRover\Contracts\ServoInterface;
use NHRover\Contracts\TiltingInterface;

/**
 * Class Head
 * This class is responsible for moving the head around to observe the surrounding
 * @package NHRover\Models
 */
class Head implements RoverHead
{

    /**
     * @var LoggerInterface
     */
    private $log;
    /**
     * @var ServoInterface
     */
    private $panning_servo;
    /**
     * @var ServoInterface
     */
    private $tilting_motor;
    /**
     * @var PinInterface
     */
    private $headlight;

    function __construct(
        LoggerInterface $logger,
        ServoInterface $panning_servo,
        TiltingInterface $tilt_motor,
        PinInterface $headlight
    ) {
        $this->log = $logger;
        $this->log->info("Attaching Head ...");
        $this->panning_servo = $panning_servo;
        $this->tilting_motor = $tilt_motor;
        $this->headlight = $headlight;
        $this->headlight->setMode('output');
    }

    public function lookStraight()
    {
        $this->log->info("Looking straight ...");

        $this->panning_servo->gotoMid();
    }

    public function lookUp()
    {
        $this->log->info("Looking up ...");

        $this->tilting_motor->tiltUp();
    }

    public function lookDown()
    {
        $this->log->info("Looking down...");

        $this->tilting_motor->tiltDown();
    }

    public function lookLeft()
    {
        $this->log->info("Looking left ...");

        $this->panning_servo->gotoMin();
    }

    public function lookRight()
    {
        $this->log->info("Looking right ...");

        $this->panning_servo->gotoMax();
    }

    public function turnOnHeadlight()
    {
        return $this->headlight->setValue(1);
    }

    public function turnOffHeadlight()
    {
        return $this->headlight->setValue(0);
    }

    public function toggleHeadlight()
    {
        $headlight = $this->headlight->getValue();

        if ($headlight) {
            return $this->turnOffHeadlight();
        }

        return $this->turnOnHeadlight();
    }
}