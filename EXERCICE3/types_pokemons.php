<?php
require("Pokemon.php");

class PokemonEau extends Pokemon{
    public function attack(Pokemon $pokemon){
        $x=parent::attack($pokemon);
        if($pokemon instanceof pokemonFeu ){
            return $x*2;
        }else{
            if($pokemon instanceof pokemonPlante ||$pokemon instanceof pokemonEau ){
                return $x*0.5;
            }
        }
        return $x;
    }

}

class PokemonFeu extends Pokemon{
    public function attack(Pokemon $pokemon){
        $x=parent::attack($pokemon);
        if($pokemon instanceof pokemonPlante ){
            return $x*2;
        }else{
            if($pokemon instanceof pokemonFeu ||$pokemon instanceof pokemonEau) {
                return $x*0.5;
            }
        }return $x;
        
    }

}


class PokemonPlante extends Pokemon{
    public function attack(Pokemon $pokemon){
        $x=parent::attack($pokemon);
        if($pokemon instanceof pokemonEau ){
            return $x*2;
        }else{
            if($pokemon instanceof pokemonFeu ||$pokemon instanceof pokemonPlante){
                return $x*0.5;
            }
        }return $x;
        
    }

}




?>