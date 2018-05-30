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

    public function stepAhead($steps = 1)
    {

    }

    public function stepBack($steps = 1)
    {
        // TODO: Implement stepBack() method.
    }
}