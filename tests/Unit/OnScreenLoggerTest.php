<?php

namespace Test;

use NHRover\Models\OnScreenLogger;
use PHPUnit\Framework\TestCase;

class OnScreenLoggerTest extends TestCase
{
    /**
     * @test
     * it can display an info on the screen
     */
    public function it_can_display_an_info_on_the_screen()
    {
        //arrange
        $verbosity = 2;
        $info_to_log = "Test info";
        $logger = new OnScreenLogger($verbosity);

        //assert
        $this->expectOutputString($logger->colorize($info_to_log, $logger->info_color)."\n");
        $logger->dump($info_to_log);
    }

    /**
     * @test
     * it respects the verbosity level
     */
    public function it_respects_the_verbosity_level()
    {
        //arrange
        $verbosity = 1;
        $info_to_log = "Testing verbosity";
        $logger = new OnScreenLogger($verbosity);

        //assert
        $this->expectOutputString("");
        $logger->dump($info_to_log);
    }
}
