<?php

use NHRover\Models\Body;
use NHRover\Models\Head;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\Rover;
use NHRover\Models\Servo;
use NHRover\Models\WheelL293d;

require "bootstrap.php";

$mappings = require "keyboard_mapping.php";
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

system('stty cbreak -echo');
$stdin = fopen('php://stdin', 'r');

while (true) {
    $c = ord(fgetc($stdin));
    //echo "Char read: $c\n";

    if (isset($mappings[$c])) {
        $mapping = $mappings[$c];
        if ($mapping == "Up") $nhrover->stepAhead();
        //$this->snakes[$mapping[1]]->setDirection($mapping[0]);
    }
}

return $nhrover;