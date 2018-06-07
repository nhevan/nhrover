<?php

use NHRover\Models\Body;
use NHRover\Models\Head;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\Rover;
use NHRover\Models\Servo;
use NHRover\Models\WheelL293d;

require "bootstrap.php";

$logger = new OnScreenLogger();
$body = new Body(
            $logger,
            new WheelL293d(new Pin(11),new Pin(5)),
            new WheelL293d(new Pin(6),new Pin(13)),
            new Pin(2, $logger)
        );
$head = new Head(
            $logger,
            new Servo(new Pin(18)),
            new Servo(new Pin(4)),
            new Pin(4, $logger)
        );
$nhrover = new Rover($body, $head, $logger);

$nhrover->drive();

return $nhrover;