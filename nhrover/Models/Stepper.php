<?php


namespace NHRover\Models;

use NHRover\Contracts\PinInterface;

class Stepper
{
    protected $motor_switch;
    protected $input_1; // orange
    protected $input_2; // yellow
    protected $input_3; // pink
    protected $input_4; // blue

    protected $current_phase = 0;
    protected $steps_to_move;
    protected $step_count = 1;
    protected $delay = 1000; //in micro second
    protected $phase_sequence;

    public function __construct(
        PinInterface $motor_switch,
        PinInterface $input_1,
        PinInterface $input_2,
        PinInterface $input_3,
        PinInterface $input_4
    ) {
        $this->motor_switch = $motor_switch;
        $this->input_1 = $input_1;
        $this->input_2 = $input_2;
        $this->input_3 = $input_3;
        $this->input_4 = $input_4;

        $this->phase_sequence = $this->setPhaseSequences();
        $this->setupPins();
    }

    /**
     * prepares the set sequence for the stepper motor 28BYJ48
     */
    protected function setPhaseSequences()
    {
        $phase_sequence = [];
        $phase_sequence[0] = [0, 1, 0, 0];
        $phase_sequence[1] = [0, 1, 0, 1];
        $phase_sequence[2] = [0, 0, 0, 1];
        $phase_sequence[3] = [1, 0, 0, 1];
        $phase_sequence[4] = [1, 0, 0, 0];
        $phase_sequence[5] = [1, 0, 1, 0];
        $phase_sequence[6] = [0, 0, 1, 0];
        $phase_sequence[7] = [0, 1, 1, 0];

        return $phase_sequence;
    }

    /**
     * sets up all the necessary pins required to control the motor
     */
    protected function setupPins()
    {
        $this->motor_switch->setMode("output");
        $this->input_1->setMode("output");
        $this->input_2->setMode("output");
        $this->input_3->setMode("output");
        $this->input_4->setMode("output");
    }

    /**
     * rotates the motor clock wise
     */
    public function rotateClockwise()
    {
        $this->turnOnMotor();
        for ($step = 0; $step < $this->getStepsToMove(); $step++) {
            for ($local_step_count = 0; $local_step_count <= $this->step_count; $local_step_count++) {
                $this->moveStep($this->phase_sequence[$this->current_phase][0],
                    $this->phase_sequence[$this->current_phase][1], $this->phase_sequence[$this->current_phase][2],
                    $this->phase_sequence[$this->current_phase][3]);

                $this->current_phase -= 1;
                if ($this->current_phase < 0) {
                    $this->current_phase = 7;
                }
                usleep($this->delay);
            }
        }
        $this->turnOffMotor();
    }

    /**
     * turns On the motor
     */
    protected function turnOnMotor()
    {
        // echo "Turning On Motor";
        $this->motor_switch->setValue(1);
    }

    /**
     * @return mixed
     */
    public function getStepsToMove()
    {
        return $this->steps_to_move;
    }

    /**
     * @param mixed $steps_to_move
     *
     * @return self
     */
    public function setStepsToMove($steps_to_move)
    {
        $this->steps_to_move = $steps_to_move;

        return $this;
    }

    /**
     * moves the motor by 1 step as per given values
     * @param $w1
     * @param $w2
     * @param $w3
     * @param $w4
     * @internal param $ [type] $w1 [description]
     * @internal param $ [type] $w2 [description]
     * @internal param $ [type] $w3 [description]
     * @internal param $ [type] $w4 [description]
     */
    protected function moveStep($w1, $w2, $w3, $w4)
    {
        $this->input_1->setValue($w1);
        $this->input_2->setValue($w2);
        $this->input_3->setValue($w3);
        $this->input_4->setValue($w4);
    }

    /**
     * turns off the motor
     */
    protected function turnOffMotor()
    {
        // echo "Turning Off Motor";
        $this->motor_switch->setValue(0);
    }

    /**
     * rotates the motor anti clock wise
     */
    public function rotateAntiClockwise()
    {
        $this->turnOnMotor();
        for ($step = 0; $step < $this->getStepsToMove(); $step++) {
            for ($local_step_count = 0; $local_step_count <= $this->step_count; $local_step_count++) {
                $this->moveStep($this->phase_sequence[$this->current_phase][0],
                    $this->phase_sequence[$this->current_phase][1], $this->phase_sequence[$this->current_phase][2],
                    $this->phase_sequence[$this->current_phase][3]);
                $this->current_phase += 1;
                if ($this->current_phase > 7) {
                    $this->current_phase = 0;
                }
                usleep($this->delay);
            }
        }
        $this->turnOffMotor();
    }
}
