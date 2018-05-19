<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\RoverHead;

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

    function __construct(LoggerInterface $logger)
    {
        $this->log = $logger;
        $this->log->info("Attaching Head ...");
    }

    public function lookStraight()
    {
        // TODO: Implement lookStraight() method.
    }

    public function lookUp()
    {
        // TODO: Implement lookUp() method.
    }

    public function lookDown()
    {
        // TODO: Implement lookDown() method.
    }

    public function lookLeft()
    {
        // TODO: Implement lookLeft() method.
    }

    public function lookRight()
    {
        // TODO: Implement lookRight() method.
    }
}