<?php

class Element
{
    private string $name;

    private array $beats;

    public function __construct(string $name, array $beats)
    {
        $this->name = $name;
        $this->beats = $beats;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBeats(): array
    {
        return $this->beats;
    }

    public function beatsElement(Element $element): bool
    {
        return in_array($element->getName(), $this->beats);
    }
}

$elements = [
    new Element("rock", ["scissors", "lizard"]),
    new Element("paper", ["rock", "spock"]),
    new Element("scissors", ["paper", "lizard"]),
    new Element("lizard", ["paper", "spock"]),
    new Element("spock", ["scissors", "rock"]),
];

$playerSelection = null;
$pcSelection = $elements[array_rand($elements)];

echo "PC selection is {$pcSelection->getName()} \n";

$matchFound = false;

while ($matchFound == false) {
    $guess = strtolower(readline("Enter rock, paper, scissors, lizard or spock: "));
    foreach ($elements as $element) {
        if ($guess == $element->getName()) {
            $matchFound = true;
            $playerSelection = $element;
            break;
        }
    }
    if ($playerSelection == null) {
        echo "Invalid input! Try again.\n";
    }
}

if ($playerSelection === $pcSelection) {
    echo 'Its a draw!' . PHP_EOL;
    exit;
};
if (in_array($pcSelection->getName(), $playerSelection->getBeats())) {
    echo 'You win! :)' . PHP_EOL;
    exit;
};
if (in_array($playerSelection->getName(), $pcSelection->getBeats())) {
    echo 'You lose! :(' . PHP_EOL;
    exit;
};
