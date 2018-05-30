<?php


namespace NHRover\Contracts;


interface RoverInterface
{

    public function stepAhead($steps = 1);
    public function stepBack($steps = 1);
}