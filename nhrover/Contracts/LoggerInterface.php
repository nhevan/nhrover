<?php


namespace NHRover\Contracts;


interface LoggerInterface
{
    public function info();
    public function warning();
    public function critical();
}