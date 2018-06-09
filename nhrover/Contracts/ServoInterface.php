<?php


namespace NHRover\Contracts;


/**
 * Interface ServoInterface
 * @package NHRover\Contracts
 */
interface ServoInterface
{
    /**
     * @return mixed
     */
    public function gotoMax();

    /**
     * @return mixed
     */
    public function gotoMin();

    /**
     * @return mixed
     */
    public function gotoMid();
}