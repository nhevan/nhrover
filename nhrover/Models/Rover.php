<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\RoverBody;
use NHRover\Contracts\RoverHead;
use NHRover\Contracts\RoverInterface;

/**
 * Class Rover
 * @package NHRover\Models
 */
class Rover implements RoverInterface
{
    /**
     * @var RoverBody|Body|null
     */
    private $body;
    /**
     * @var RoverHead|Head|null
     */
    private $head;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Rover constructor.
     * @param RoverBody|Body|null $body
     * @param RoverHead|Head|null $head
     * @param LoggerInterface $logger
     * @internal param LoggerInterface $log
     */
    function __construct(RoverBody $body, RoverHead $head, LoggerInterface $logger)
    {
        $this->body = $body;
        $this->head = $head;
        $this->logger = $logger;

        $this->powerUp();
    }

    /**
     *
     */
    private function powerUp()
    {
        $this->logger->info("Powering up rover ...");
    }

    /**
     * The rover moves forward for x seconds and stops
     * @param int $steps
     */
    public function stepAhead($steps = 1)
    {
        $this->logger->info("Initiating Stepping ahead ...");
        $this->body->moveForward();
        sleep(1);
        $this->body->stop();
    }

    /**
     * @param int $steps
     */
    public function stepBack($steps = 1)
    {
        $this->logger->info("Initiating Stepping back ...");
        $this->body->moveBackward();
        sleep(1);
        $this->body->stop();
    }

    /**
     * @param int $steps
     */
    public function turnLeft($steps = 1)
    {
        $this->logger->info("Initiating turn left command ...");
        $this->body->turnLeft();
        usleep(500000);
        $this->body->stop();
    }

    public function turnRight($steps = 1){
        $this->logger->info("Initiating turn right command ...");
        $this->body->turnRight();
        usleep(500000);
        $this->body->stop();
    }

    public function testDrive(){
        $this->logger->info("Initiating a test drive ...");
        $this->stepAhead();
        $this->stepAhead();
        $this->stepBack();
        $this->turnRight();
    }
}