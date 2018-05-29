<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\RoverBody;
use NHRover\Contracts\WheelInterface;

/**
 * Class Body
 * This class is responsible for moving around
 * @package NHRover\Models
 */
class Body implements RoverBody
{
    /**
     * @var LoggerInterface
     */
    private $log;
    /**
     * @var WheelInterface
     */
    private $left_side;
    /**
     * @var WheelInterface
     */
    private $right_side;

    function __construct(LoggerInterface $logger, WheelInterface $left_wheel, WheelInterface $right_wheel)
    {
        $this->log = $logger;
        $this->log->info("Attaching Body ...");

        $this->left_side = $left_wheel;
        $this->right_side = $right_wheel;
    }

    public function moveForward()
    {
        $this->log->info("Moving forward ...");

        $this->left_side->rotateCW();
        $this->right_side->rotateCW();
    }

    public function moveBackward()
    {
        $this->log->info("Moving backward ...");

        $this->left_side->rotateCCW();
        $this->right_side->rotateCCW();
    }

    public function turnRight()
    {
        $this->log->info("Moving right ...");

        $this->left_side->rotateCW();
        $this->right_side->rotateCCW();
    }

    public function turnLeft()
    {
        $this->log->info("Moving left ...");

        $this->left_side->rotateCCW();
        $this->right_side->rotateCW();
    }
}