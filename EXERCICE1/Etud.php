<?php


class Etudiant {
    private $name ;
    private $notes=array() ;

    public function __construct(string $name ,...$args){
        $this->name=$name;
        for ($i =0; $i<count($args);$i++){
            $this->notes[$i]=$args[$i];
        }

    }
    public function afficher(){
        echo "L'etudiant : ".$this->name."/n";
        foreach($this->notes as $note){
            echo $note;
        }

    }
    public function getName(){
        return $this->name;
    }
    public function getNotes():array{
        return $this->notes;
    }


    public function Moyenne():float{
        $moyenne=0;
        foreach($this->notes as $note){
            $moyenne+=$note;}
        return $moyenne/count($this->notes);
    }

    public function  AdmisOuNon():void{
        if($this->Calcule_moy()<10){
            echo "non Admis";
        }else{
            echo "Admis";
        }}}
$Aymen =new Etudiant("Aymen", 11, 13, 18, 7,10,13,2,5,1);
$Skander=new Etudiant( "Skander",15,9,8,16);

//actual changes to index.php

$LesEtudiant=array();
$LesEtudiant[0]=$Aymen;
$LesEtudiant[1]=$Skander;
echo "<div class='container'>";
echo "<div class='row'>";

foreach ( $LesEtudiant as $Etudiant){
    echo "<div class ='col'>";
    echo "<div class ='names p-3'>";
    echo $Etudiant->getName();
    echo"</div>";
    foreach($Etudiant->getNotes() as $Note){
        echo "<div class='note p-3 card rounded-0 '>";
        echo $Note;
        echo"</div>";}
    echo"<div class = 'moyenne p-3 card'>";
    echo 'Moyenne = '.$Etudiant->Moyenne();
    echo"</div>";
echo"</div>";}
echo "</div>";
echo "</div>";

?>