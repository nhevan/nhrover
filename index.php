<?php

use NHRover\Models\OnScreenLogger;
use NHRover\Models\Rover;

require "bootstrap.php";

$logger = new OnScreenLogger();
$nhrover = new Rover(null, null, $logger);