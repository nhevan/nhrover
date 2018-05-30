<?php


namespace NHRover\Contracts;


/**
 * Interface WheelInterface
 * @package NHRover\Contracts
 */
interface WheelInterface
{
    /**
     * @return mixed
     */
    public function rotateCW();

    /**
     * @return mixed
     */
    public function rotateCCW();

    /**
     * @return mixed
     */
    public function stop();
}