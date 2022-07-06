<?php

declare(strict_types=1);

namespace CLIgame;
use App\Conditions\GameConditions;
use App\WinChecker;

class App
{
    protected $printer;
    protected int $level;
    protected $drawResult;

    public function __construct(
    )
    {
        $this->printer = new CliPrinter();
        $this->drawResult = new Draw();
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function getDrawResult()
    {
        return $this->drawResult;
    }

    public function runCommand(array $argv)
    {
        $name = "Robinson Crusoe";
        if (isset($argv[1])) {
            $name = $argv[1];
        }
        $prize = new Prize(0, 0);
        $this->getPrinter()->display("Hello $name! Welcome to magnificient world of gambling. If you feel lucky today, 
        choose your level of difficulty (between 1 and 5, where 1 is the highest");
        $levelInput = (int)$this->getPrinter()->takeinput();
        if (($levelInput >= 1) && ($levelInput <= 5)) {
            $level = new GameConditions($levelInput, $levelInput);
            $level->setCalcTries($levelInput);
            $level->setDrawTries($levelInput);
            $this->getPrinter()->display("Well done, $name! We will now display an equation. You simply have to type in your 
        result");
            $x = $this->getDrawResult()->generateDraw();
            $y = $this->getDrawResult()->generateDraw();
            $calc = new Calculator($x, $y);
            $calcResult = $calc->add();
            $this->getPrinter()->display("$x + $y = ");
            $calcInput = (int)$this->getPrinter()->takeinput();
            $winOne = new WinChecker($calcInput, $calcResult, $level->getCalcTries());
            if ($winOne->checkCalc()) {
                $prize->setCalcInput($calcInput);
                $this->getPrinter()->display("Well done, $name! We will now draw a number between 1 and 100. You simply have 
            to guess your result. Type it below");
                $z = $this->getDrawResult()->generateDraw();
                $drawInput = (int)$this->getPrinter()->takeinput();
                $winTwo = new WinChecker($drawInput, $z, $level->getDrawTries());
                if ($winTwo->checkDraw()) {
                    $prize->setDrawInput($drawInput);
                    echo "Congratulations, you won a prize\n";
                    $prize->drawPrize();
                } else {
                    echo "Game over";
                    exit();
                }
            } else {
                echo "Game over";
                exit();
            }
        }
        else echo "Wrong level";
    }
}