<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\PinInterface;
use NHRover\Contracts\RoverHead;
use NHRover\Contracts\ServoInterface;

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
    private $tilting_servo;
    /**
     * @var PinInterface
     */
    private $headlight;

    function __construct(
        LoggerInterface $logger,
        ServoInterface $panning_servo,
        ServoInterface $tilting_servo,
        PinInterface $headlight
    ) {
        $this->log = $logger;
        $this->log->info("Attaching Head ...");
        $this->panning_servo = $panning_servo;
        $this->tilting_servo = $tilting_servo;
        $this->headlight = $headlight;
    }

    public function lookStraight()
    {
        $this->log->info("Looking straight ...");

        $this->panning_servo->gotoMid();
        $this->tilting_servo->gotoMid();
    }

    public function lookUp()
    {
        $this->log->info("Looking up ...");

        $this->tilting_servo->gotoMax();
    }

    public function lookDown()
    {
        $this->log->info("Looking down...");

        $this->tilting_servo->gotoMin();
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

    public function toggleHeadlight()
    {
        $headlight = $this->headlight->getValue();

        if ($headlight) return $this->headlight->setValue(0);

        return $this->headlight->setValue(1);
    }
}