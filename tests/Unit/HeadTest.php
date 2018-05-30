<?php

namespace Test;

use NHRover\Models\Head;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\Servo;
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

        $tilting_servo = $this->createMock(Servo::class);

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_servo);

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

        $tilting_servo = $this->createMock(Servo::class);

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_servo);

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
        $tilting_servo = $this->createMock(Servo::class);
        $tilting_servo->expects($this->once())->method('gotoMin');

        $panning_servo = $this->createMock(Servo::class);
        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_servo);

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
        $tilting_servo = $this->createMock(Servo::class);
        $tilting_servo->expects($this->once())->method('gotoMax');

        $panning_servo = $this->createMock(Servo::class);
        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_servo);

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
        $tilting_servo = $this->createMock(Servo::class);
        $tilting_servo->expects($this->once())->method('gotoMid');

        $panning_servo = $this->createMock(Servo::class);
        $panning_servo->expects($this->once())->method('gotoMid');

        $head = new Head(new OnScreenLogger(), $panning_servo, $tilting_servo);

        //act
        $head->lookStraight();
    }
}
