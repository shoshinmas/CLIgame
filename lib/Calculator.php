<?php

declare(strict_types=1);

namespace CLIgame;

class Calculator
{
    public function __construct(
        private int $fval,
        private int $sval ) {
        $this->_fval = $fval;
        $this->_sval = $sval;
    }
    public function add() {
        return $this->_fval + $this->_sval;
    }
    public function subtract() {
        return $this->_fval - $this->_sval;
    }
    public function multiply() {
        return $this->_fval * $this->_sval;
    }
    public function divide() {
        return $this->_fval / $this->_sval;
    }
}
