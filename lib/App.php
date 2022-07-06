<?php

namespace CLIgame;

use CLIgame\Conditions\CliPrinter;

class App
{
    public function __construct(
        protected readonly $printer
    )
    {
        $this->printer = new CliPrinter();
    }

    public function getPrinter()
    {
        return $this->printer;
    }
    public function runCommand(array $argv)
    {
        $name = "World";
        if (isset($argv[1])) {
            $name = $argv[1];
        }

        $this->getPrinter()->display("Hello $name!!!");
    }
}