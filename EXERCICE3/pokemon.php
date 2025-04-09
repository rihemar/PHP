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



$Bulbsaur = new Pokemon("Bulbasaur","Bulbasaur.jpg",180,[
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


?>
