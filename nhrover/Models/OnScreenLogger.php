<?php


namespace NHRover\Models;


use NHRover\Contracts\LoggerInterface;

class OnScreenLogger implements LoggerInterface
{
    public $info_color = "[01;36m";
    public $warning_color = "[01;33m";
    public $critical_color = "[01;36m";
    public $reset_color = "[0m";
    public $verbosity = 1;

    /**
     * OnScreenLogger constructor.
     * @param int $verbosity
     */
    public function __construct($verbosity = 1)
    {
        $this->verbosity = $verbosity;
    }

    public function info($message = "checkpoint info ...")
    {
        echo $this->colorize($message, $this->info_color) . "\n";
    }

    public function colorize($message, $info_color)
    {
        return "\e$info_color" . $message . "\e$this->reset_color";
    }

    public function dump($message = "checkpoint info ...")
    {
        if ($this->verbosity == 2 )
            return $this->info($message);
    }

    public function warning($message = "Please have a look at this...")
    {
        echo $this->colorize($message, $this->warning_color) . "\n";
    }

    public function critical($message = "A critical error might be breeding here ")
    {
        echo $this->colorize($message, $this->critical_color) . "\n";
    }
}