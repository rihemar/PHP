<?php

class Pokemon {
    private string $name;
    private string $imageUrl;
    private int $healthPoints;
    private array $attackStats;

    public function __construct(string $name, string $imageUrl, int $healthPoints, array $attackStats) {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->healthPoints = $healthPoints;

        $this->attackStats = [
            'min' => $attackStats['attackMinimal'],
            'max' => $attackStats['attackMaximal'],
            'specialMultiplier' => $attackStats['specialAttack'],
            'specialChance' => $attackStats['probabilitySpecialAttack']
        ];
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getHealth(): int {
        return $this->healthPoints;
    }

    public function setHealth(int $hp): void {
        $this->healthPoints = $hp;
    }

    public function getImageUrl(): string {
        return $this->imageUrl;
    }

    public function setImageUrl(string $url): void {
        $this->imageUrl = $url;
    }

    public function getAttackStats(): array {
        return $this->attackStats;
    }

    public function setAttackStats(array $stats): void {
        $this->attackStats = [
            'min' => $stats['attackMinimal'],
            'max' => $stats['attackMaximal'],
            'specialMultiplier' => $stats['specialAttack'],
            'specialChance' => $stats['probabilitySpecialAttack']
        ];
    }

    public function isFainted(): bool {
        return $this->healthPoints <= 0;
    }

    public function attack(Pokemon $target): int {
        $chance = rand(1, 100);
        $damage = rand($this->attackStats['min'], $this->attackStats['max']);

        if ($chance < $this->attackStats['specialChance']) {
            $damage *= $this->attackStats['specialMultiplier'];
        }

        $target->healthPoints -= $damage;

        return $damage;
    }

    public function describe(): void {
        echo "{$this->name} Stats:<br>";
        echo "HP: {$this->healthPoints}<br>";
        echo "Attacks:<br>";
        echo "- Min: {$this->attackStats['min']}<br>";
        echo "- Max: {$this->attackStats['max']}<br>";
        echo "- Special Multiplier: {$this->attackStats['specialMultiplier']}<br>";
        echo "- Special Attack Chance: {$this->attackStats['specialChance']}%<br>";
    }
}


//index.php



$Bulbasaur = new Pokemon("Bulbasaur","Bulbasaur.jpg",180,[
    "attackMinimal"=> 10,
    "attackMaximal"=> 35,
    "specialAttack"=> 1.75,
    "probabilitySpecialAttack"=>20]);

$Pikachu = new Pokemon("Pikachu","Pikatchu.jpg",150,[
    "attackMinimal"=> 15,
    "attackMaximal"=> 30,
    "specialAttack"=> 3,
    "probabilitySpecialAttack"=>10
]);
$Battlers=[$Bulbasaur,$Pikachu];
$round=0;


echo "<div class='container'>";
echo "<div class='row card p-3 m-2 Comb bg-primary text-white text-center fs-4 fw-bold rounded-4 '>Les Combattants</div><br>";
echo "<div class='row'>";
foreach ([0, 1] as $i) {
    echo "<div class='col card p-3 m-2 bg-light border border-dark rounded-3 '>";
    echo "<div class='text-center fw-bold fs-5'>{$Battlers[$i]->getName()}</div>";
    echo "<div class='text-center'><img src='{$Battlers[$i]->getImageUrl()}' style='height: 200px;' class='img-fluid'></div><hr>";
    echo "<div>❤️ Points : {$Battlers[$i]->getHealth()}</strong></div><hr>";
    echo "<div>🗡️ Min attack : {$Battlers[$i]->getAttackStats()['min']}</div><hr>";
    echo "<div>⚔️ Max attack : {$Battlers[$i]->getAttackStats()['max']}</div><hr>";
    echo "<div>🌟 Special Multiplier : {$Battlers[$i]->getAttackStats()['specialMultiplier']}</div><hr>";
    echo "<div>🎯 Special Chance : {$Battlers[$i]->getAttackStats()['specialChance']}%</div>";
    echo "</div>";
}
echo "</div>";

$round = 0;
while (!$Battlers[0]->isFainted() && !$Battlers[1]->isFainted()) {
    $round++;
    echo "<div class='round row card p-3 m-2 bg-danger text-white text-center rounded-4 '>Round $round";
    echo "<div class='row atc p-3'>";
    echo "<div class='col border-end border-white'>" . $Battlers[0]->attack($Battlers[1]) . "</div>";
    echo "<div class='col'>" . $Battlers[1]->attack($Battlers[0]) . "</div>";
    echo "</div>";
    echo "</div><br>";

    echo "<div class='row'>";
    foreach ([0, 1] as $i) {
        echo "<div class='col card p-3 m-2 bg-light border border-dark rounded-3 '>";
        echo "<div class='text-center fw-bold fs-5'>{$Battlers[$i]->getName()}</div>";
        echo "<div class='text-center'><img style='height: 200px;' src='{$Battlers[$i]->getImageUrl()}' class='img-fluid'></div><hr>";
        echo "<div>❤️ Points :{$Battlers[$i]->getHealth()}</strong></div><hr>";
        echo "<div>🗡️ Min attack : {$Battlers[$i]->getAttackStats()['min']}</div><hr>";
        echo "<div>⚔️ Max attack : {$Battlers[$i]->getAttackStats()['max']}</div><hr>";
        echo "<div>🌟 Special Multiplier : {$Battlers[$i]->getAttackStats()['specialMultiplier']}</div><hr>";
        echo "<div>🎯 Special Chance : {$Battlers[$i]->getAttackStats()['specialChance']}%</div>";
        echo "</div>";
    }
    echo "</div>";
}

// Winner section
echo "<br><br><div class='vainq p-4 text-center bg-success text-white fw-bold fs-4 rounded-4'>";
$winner = ($Battlers[0]->getHealth() > $Battlers[1]->getHealth()) ? $Battlers[0] : $Battlers[1];
echo "🏆 Le vainqueur est <br><img src='" . $winner->getImageUrl() . "' style='height:300px;' class='img-fluid my-2'><br>" . $winner->getName() . " avec " . $winner->getHealth() . " points de vie !";
echo "</div><br>";

echo "</div>";
?>
