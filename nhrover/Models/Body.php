<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\PinInterface;
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
    /**
     * @var PinInterface
     */
    private $motor_power;

    function __construct(LoggerInterface $logger, WheelInterface $left_wheel, WheelInterface $right_wheel, PinInterface $motor_power)
    {
        $this->log = $logger;
        $this->log->info("Attaching Body ...");

        $this->left_side = $left_wheel;
        $this->right_side = $right_wheel;
        $this->motor_power = $motor_power;
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

    public function stop()
    {
        $this->log->info("Stopping all motor movements ...");

        $this->left_side->stop();
        $this->right_side->stop();
    }

    /**
     * Turns on the motor controller board
     */
    public function powerUp()
    {
        $this->motor_power->setValue(1);
    }

    /**
     * Cuts the power to motor controller board
     */
    public function powerDown()
    {
        $this->motor_power->setValue(0);
    }
}