<?php

namespace Hackzilla\Bundle\PasswordGeneratorBundle\Entity;

use Hackzilla\PasswordGenerator\Generator\PasswordGeneratorInterface;

class Options
{
    private $mode;
    private $quantity = 5;
    private $passwordGenerator;

    public function __construct(PasswordGeneratorInterface & $passwordGenerator)
    {
        $this->passwordGenerator = $passwordGenerator;
    }

    public function __get($name)
    {
        return $this->passwordGenerator->getOptionValue(strtoupper($name));
    }

    public function __set($name, $value)
    {
        $this->passwordGenerator->setOptionValue(strtoupper($name), $value);
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return (int)$this->quantity;
    }
}
