<?php


namespace NHRover\Contracts;


interface RoverHead
{
    public function lookStraight();
    public function lookUp();
    public function lookDown();
    public function lookLeft();
    public function lookRight();
    public function toggleHeadlight();
}