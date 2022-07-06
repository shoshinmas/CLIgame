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

        $this->getPrinter()->display("Hello $name! Welcome to magnificient world of gambling. If you feel lucky today, 
        choose your level of difficulty (between 1 and 5, where ONE is the highest");
        $levelInput = (int)$this->getPrinter()->takeinput();
        $level = new GameConditions($levelInput, $levelInput);
        $this->getPrinter()->display("Well done, $name! We will now display an equation. You simply have to type in your 
        result");
        $x = $this->getDrawResult()->generateDraw();
        $y = $this->getDrawResult()->generateDraw();
        $calc = new Calculator($x, $y);
        $calcResult = $calc->add();
        $this->getPrinter()->display("$x + $y = ");
        $calcInput = (int) $this->getPrinter()->takeinput();
        $winOne = new WinChecker($calcInput, $calcResult, $level->getCalcTries());
        $winOne->checkCalc();
        if($winOne)
        {
            $this->getPrinter()->display("Well done, $name! We will now draw a number betwen 1 and 100. You simply have 
            to guess your result. Type it below");
            $z = $this->getDrawResult()->generateDraw();
            $drawInput = (int) $this->getPrinter()->takeinput();
            $winTwo = new WinChecker($drawInput, $z, $level->getDrawTries());
            $winTwo->checkDraw();
            if ($winTwo)
            {
                $prize = new Prize($calcInput, $drawInput);
                echo "Congratulations, you won a prize";
                $prize->drawPrize();
            }
            else
            {
                echo "Game over";
                exit();
            }
        }
        else {
            echo "Game over";
            exit();
        }
    }
}