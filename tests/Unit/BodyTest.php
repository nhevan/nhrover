<?php

namespace Test;

use NHRover\Models\Body;
use NHRover\Models\OnScreenLogger;
use NHRover\Models\Pin;
use NHRover\Models\WheelL293d;
use PHPUnit\Framework\TestCase;

class BodyTest extends TestCase
{
    /**
     * @test
     * it can move forward
     */
    public function it_can_move_forward()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $right_wheel->expects($this->once())->method('rotateCW');
        $left_wheel->expects($this->once())->method('rotateCW');

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->moveForward();
    }

    /**
     * @test
     * it can move backward
     */
    public function it_can_move_backward()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $right_wheel->expects($this->once())->method('rotateCCW');
        $left_wheel->expects($this->once())->method('rotateCCW');

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->moveBackward();
    }

    /**
     * @test
     * it can turn right
     */
    public function it_can_turn_right()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $right_wheel->expects($this->once())->method('rotateCCW');
        $left_wheel->expects($this->once())->method('rotateCW');

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->turnRight();
    }

    /**
     * @test
     * it can turn left
     */
    public function it_can_turn_left()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $right_wheel->expects($this->once())->method('rotateCW');
        $left_wheel->expects($this->once())->method('rotateCCW');

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->turnLeft();
    }

    /**
     * @test
     * it can stop moving
     */
    public function it_can_stop_moving()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $right_wheel->expects($this->once())->method('stop');
        $left_wheel->expects($this->once())->method('stop');

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->stop();
    }

    /**
     * @test
     * it can turn on power to motor controller board
     */
    public function it_can_turn_on_power_to_motor_controller_board()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $motor_power->expects($this->once())->method('setValue')->with(true);

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->powerUp();
    }

    /**
     * @test
     * it can turn off power to motor controller board
     */
    public function it_can_turn_off_power_to_motor_controller_board()
    {
        //arrange
        $right_wheel = $this->createMock(WheelL293d::class);
        $left_wheel = $this->createMock(WheelL293d::class);
        $motor_power = $this->createMock(Pin::class);

        $motor_power->expects($this->once())->method('setValue')->with(false);

        $body = new Body(new OnScreenLogger(), $left_wheel, $right_wheel, $motor_power);

        //act
        $body->powerDown();
    }
}
