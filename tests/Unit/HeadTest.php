<?php

namespace Test;

use NHRover\Contracts\TiltingInterface;
use NHRover\Models\Head;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\Servo;
use NHRover\Models\StepperTilt;
use PHPUnit\Framework\TestCase;

class HeadTest extends TestCase
{
    /**
     * @test
     * it can look to the left
     */
    public function it_can_look_to_the_left()
    {
        //arrange
        $panning_servo = $this->createMock(Servo::class);
        $panning_servo->expects($this->once())->method('gotoMin');

        $headlight = $this->createMock(Pin::class);

        $tilting_motor = $this->createMock(StepperTilt::class);

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $head->lookLeft();
    }

    /**
     * @test
     * it can look to the right
     */
    public function it_can_look_to_the_right()
    {
        //arrange
        $panning_servo = $this->createMock(Servo::class);
        $panning_servo->expects($this->once())->method('gotoMax');
        $headlight = $this->createMock(Pin::class);

        $tilting_motor = $this->createMock(StepperTilt::class);

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $head->lookRight();
    }

    /**
     * @test
     * it can look down
     */
    public function it_can_look_down()
    {
        //arrange
        $tilting_motor = $this->createMock(StepperTilt::class);
        $tilting_motor->expects($this->once())->method('tiltDown');
        $headlight = $this->createMock(Pin::class);

        $panning_servo = $this->createMock(Servo::class);
        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $head->lookDown();
    }

    /**
     * @test
     * it can look up
     */
    public function it_can_look_up()
    {
        //arrange
        $tilting_motor = $this->createMock(StepperTilt::class);
        $tilting_motor->expects($this->once())->method('tiltUp');
        $headlight = $this->createMock(Pin::class);

        $panning_servo = $this->createMock(Servo::class);
        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $head->lookUp();
    }

    /**
     * @test
     * it can look straight forward
     */
    public function it_can_look_straight_forward()
    {
        //arrange
        $tilting_motor = $this->createMock(TiltingInterface::class);
        $headlight = $this->createMock(Pin::class);

        $panning_servo = $this->createMock(Servo::class);
        $panning_servo->expects($this->once())->method('gotoMid');

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $head->lookStraight();
    }

    /**
     * @test
     * it can toggle its headlight
     */
    public function it_can_toggle_its_headlight()
    {
        //arrange
        $tilting_motor = $this->createMock(StepperTilt::class);
        $panning_servo = $this->createMock(Servo::class);

        $headlight = $this->createMock(Pin::class);
        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_motor, $headlight);

        //act
        $headlight->expects($this->once())->method('setValue')->with(1);
        $head->toggleHeadlight();
    }
}
