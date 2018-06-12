<?php


namespace NHRover\Models;


use NHRover\Contracts\PinInterface;
use NHRover\Contracts\TiltingInterface;

class StepperTilt extends Stepper implements TiltingInterface
{
    /**
     * StepperTilt constructor.
     * @param PinInterface $motor_switch
     * @param PinInterface $input_1
     * @param PinInterface $input_2
     * @param PinInterface $input_3
     * @param PinInterface $input_4
     */
    public function __construct(
        PinInterface $motor_switch,
        PinInterface $input_1,
        PinInterface $input_2,
        PinInterface $input_3,
        PinInterface $input_4
    )
    {
        parent::__construct($motor_switch, $input_1, $input_2, $input_3, $input_4);
    }

    public function tiltUp()
    {
        $this->motor_switch->setValue(1);
        $this->setStepsToMove(128);
        $this->rotateClockwise();
        $this->motor_switch->setValue(0);
    }

    public function tiltDown()
    {
        $this->motor_switch->setValue(1);
        $this->setStepsToMove(128);
        $this->rotateAntiClockwise();
        $this->motor_switch->setValue(0);
    }

}