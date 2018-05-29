<?php


namespace NHRover\Contracts;


interface RoverInterface
{

    public function moveForward($steps = 1);
    public function moveBackward($steps = 1);
    public function turnRight();
    public function turnLeft();
}