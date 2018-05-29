<?php


namespace NHRover\Contracts;


/**
 * Interface PinInterface
 * @package NHRover\Contracts
 */
/**
 * Interface PinInterface
 * @package NHRover\Contracts
 */
interface PinInterface
{
    /**
     * @param string $mode
     * @return mixed
     */
    public function setMode($mode = 'output');

    /**
     * @param bool $value
     * @return mixed
     */
    public function setValue($value = true);

    /**
     * @return mixed
     */
    public function __toString();
}