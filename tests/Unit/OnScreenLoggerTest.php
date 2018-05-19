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
        $info_to_log = "Test info";
        $logger = new OnScreenLogger();

        //assert
        $this->expectOutputString($logger->colorize($info_to_log, $logger->info_color)."\n");
        $logger->info($info_to_log);
    }
}
