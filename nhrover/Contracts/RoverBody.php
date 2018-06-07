<?php


namespace NHRover\Contracts;


interface RoverBody
{
    public function powerUp();
    public function powerDown();
    public function moveForward();
    public function moveBackward();
    public function stop();
    public function turnRight();
    public function turnLeft();
}