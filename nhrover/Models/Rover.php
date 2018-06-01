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
        while ($steps) {
            $this->logger->info("Initiating Stepping ahead ...");
            $this->body->moveForward();
            usleep(100000);
            $this->body->stop();

            $steps--;
        }
    }

    /**
     * @param int $steps
     */
    public function stepBack($steps = 1)
    {
        while ($steps) {
            $this->logger->info("Initiating Stepping back ...");
            $this->body->moveBackward();
            usleep(100000);
            $this->body->stop();

            $steps--;
        }
    }

    /**
     * @param int $steps
     */
    public function turnLeft($steps = 1)
    {
        while ($steps) {
            $this->logger->info("Initiating turn left command ...");
            $this->body->turnLeft();
            usleep(100000);
            $this->body->stop();

            $steps--;
        }
    }

    /**
     * @param int $steps
     */
    public function turnRight($steps = 1)
    {
        while ($steps) {
            $this->logger->info("Initiating turn right command ...");
            $this->body->turnRight();
            usleep(100000);
            $this->body->stop();

            $steps--;
        }
    }

    /**
     *
     */
    public function lookRight()
    {
        $this->logger->info("Looking right ...");

        $this->head->lookRight();
    }

    /**
     *
     */
    public function lookLeft()
    {
        $this->logger->info("Looking left ...");

        $this->head->lookLeft();
    }

    /**
     *
     */
    public function lookUp()
    {
        $this->logger->info("Looking up ...");

        $this->head->lookUp();
    }

    /**
     *
     */
    public function lookDown()
    {
        $this->logger->info("Looking down ...");

        $this->head->lookDown();
    }

    /**
     *
     */
    public function lookStraight()
    {
        $this->logger->info("Looking straight ...");

        $this->head->lookStraight();
    }

    public function drive(){
        $mappings = require __DIR__."/keyboard_mapping.php";

        system('stty cbreak -echo');
        $stdin = fopen('php://stdin', 'r');

        while (true) {
            $c = ord(fgetc($stdin));

            if (isset($mappings[$c])) {
                $mapping = $mappings[$c];

                if ($mapping == "Forward") $this->stepAhead();
                if ($mapping == "Backward") $this->stepBack();
                if ($mapping == "Left") $this->turnLeft();
                if ($mapping == "Right") $this->turnRight();
            }
        }
    }

    /**
     * Takes the rover to a test drive where it checks both body and head functionalities
     */
    public function testDrive()
    {
        $this->logger->info("Initiating a test drive ...");
        $this->stepAhead(2);
        usleep(100000);
        $this->turnRight(2);
        usleep(100000);
        $this->stepAhead();
        $this->testHead();
    }

    /**
     * Tests the head pan and tilt functionality
     */
    public function testHead()
    {
        $this->head->lookRight();
        usleep(500000);
        $this->head->lookLeft();
        usleep(500000);
        $this->head->lookUp();
        usleep(500000);
        $this->head->lookRight();
        usleep(500000);
        $this->head->lookDown();
        usleep(500000);
        $this->head->lookStraight();
    }
}