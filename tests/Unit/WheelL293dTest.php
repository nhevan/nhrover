<?php

namespace Test;

use NHRover\Models\Pin;
use NHRover\Models\WheelL293d;
use PHPUnit\Framework\TestCase;

class WheelL293dTest extends TestCase
{
    /**
     * @test
     * it can rotate clockwise
     */
    public function it_can_rotate_clockwise()
    {
        //arrange
        $forward_pin = $this->createMock(Pin::class);
        $backward_pin = $this->createMock(Pin::class);

        $forward_pin->expects($this->once())->method('setValue')->with(true);
        $backward_pin->expects($this->never())->method('setValue');

        $wheel = new WheelL293d($forward_pin, $backward_pin);

        //act
        $wheel->rotateCW();
    }

    /**
     * @test
     * it can rotate counter clockwise
     */
    public function it_can_rotate_counter_clockwise()
    {
        //arrange
        $forward_pin = $this->createMock(Pin::class);
        $backward_pin = $this->createMock(Pin::class);

        $backward_pin->expects($this->once())->method('setValue')->with(true);
        $forward_pin->expects($this->never())->method('setValue');

        $wheel = new WheelL293d($forward_pin, $backward_pin);

        //act
        $wheel->rotateCCW();
    }
}
