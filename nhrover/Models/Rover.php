<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;
use NHRover\Contracts\RoverBody;
use NHRover\Contracts\RoverHead;

class Rover
{
    private $body;
    private $head;

    /**
     * Rover constructor.
     * @param RoverBody|Body|null $body
     * @param RoverHead|Head|null $head
     * @param LoggerInterface $logger
     * @internal param LoggerInterface $log
     */
    function __construct(RoverBody $body = null, RoverHead $head = null, LoggerInterface $logger)
    {
        $this->body = $body ?: new Body($logger);
        $this->head = $head ?: new Head($logger);

        $this->powerUp();
    }

    public function powerUp()
    {
        dump("Powering up rover ...");
    }
}