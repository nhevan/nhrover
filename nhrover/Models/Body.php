<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\RoverBody;

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

    function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
        $this->log->info("Attaching Body ...");
    }

    public function moveForward()
    {
        // TODO: Implement moveForward() method.
    }

    public function moveBackward()
    {
        // TODO: Implement moveBackward() method.
    }

    public function turnRight()
    {
        // TODO: Implement turnRight() method.
    }

    public function turnLeft()
    {
        // TODO: Implement turnLeft() method.
    }
}