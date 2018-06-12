<?php

use NHRover\Models\Body;
use NHRover\Models\Head;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\Rover;
use NHRover\Models\Servo;
use NHRover\Models\StepperTilt;
use NHRover\Models\WheelL293d;
use Symfony\Component\Dotenv\Dotenv;

require "bootstrap.php";

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$logger = new OnScreenLogger();
$body = new Body(
            $logger,
            new WheelL293d(new Pin(getenv("BODY_LEFT_WHEEL_PIN_1")),new Pin(getenv("BODY_LEFT_WHEEL_PIN_2"))),
            new WheelL293d(new Pin(getenv("BODY_RIGHT_WHEEL_PIN_1")),new Pin(getenv("BODY_RIGHT_WHEEL_PIN_2")))
        );
$headlight_switch = new Pin(getenv("HEADLIGHT_SWITCH"));
$head = new Head(
            $logger,
            new Servo(new Pin(24)),
            //new Servo(new Pin(4)),
            new StepperTilt(
                new Pin(getenv("TILT_STEPPER_SWITCH")),
                new Pin(getenv("TILT_STEPPER_INPUT_1")),
                new Pin(getenv("TILT_STEPPER_INPUT_2")),
                new Pin(getenv("TILT_STEPPER_INPUT_3")),
                new Pin(getenv("TILT_STEPPER_INPUT_4"))
            ),
            $headlight_switch
        );
$nhrover = new Rover($body, $head, $logger);

$nhrover->drive();

return $nhrover;