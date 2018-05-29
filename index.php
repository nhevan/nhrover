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
            new WheelL293d(new Pin(1),new Pin(2)),
            new WheelL293d(new Pin(3),new Pin(4))
        );
$head = new Head(
            $logger,
            new Servo(new Pin(5)),
            new Servo(new Pin(6))
        );
$nhrover = new Rover($body, $head, $logger);

return $nhrover;