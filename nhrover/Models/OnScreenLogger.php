<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;

class OnScreenLogger implements LoggerInterface
{
    public $info_color = "[01;36m";
    public $reset_color = "[0m";

    public function info($message = "checkpoint info ...")
    {
        echo $this->colorize($message, $this->info_color)."\n";
    }

    public function colorize($message, $info_color)
    {
        return "\e$info_color" . $message . "\e$this->reset_color";
    }

    public function warning()
    {
        // TODO: Implement warning() method.
    }

    public function critical()
    {
        // TODO: Implement critical() method.
    }
}