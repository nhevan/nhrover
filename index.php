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
            new WheelL293d(new Pin(23),new Pin(24)),
            new WheelL293d(new Pin(17),new Pin(27))
        );
$head = new Head(
            $logger,
            new Servo(new Pin(18)),
            new Servo(new Pin(4))
        );
$nhrover = new Rover($body, $head, $logger);

$nhrover->drive();

return $nhrover;