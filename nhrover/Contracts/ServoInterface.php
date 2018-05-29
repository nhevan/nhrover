<?php


namespace NHRover\Contracts;


/**
 * Interface ServoInterface
 * @package NHRover\Contracts
 */
interface ServoInterface
{
    public function __construct(PinInterface $pin);

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