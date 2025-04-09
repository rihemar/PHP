<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">

    </head>
<body>

<?php
require("pokemon.php");
?>


<script >

let $divComb=document.querySelector(".Comb");
 $divComb.setAttribute("style","background-color:rgb(208, 248, 253);");
 
 $divComb=document.querySelectorAll(".name");
 for(let k =0 ; k<$divComb.length ; k++){
 $divComb[k].setAttribute("style","background-color:rgba(242, 234, 234, 0.63);");
 }
 let $round=document.querySelectorAll(".round");
 for(let j=0 ; j<$round.length ;j++){
    $round[j].setAttribute("style","background-color:rgb(240, 164, 164);");
 }
$divComb=document.querySelectorAll(".atc");
for( let i = 0 ; i<$divComb.length ; i++){
    $divComb[i].setAttribute("style","background-color:hsla(0, 0.00%, 88.20%, 0.63);");
}
let $vainq=document.querySelector('.vainq');
$vainq.setAttribute("style","background-color:hsla(119, 100.00%, 79.20%, 0.63);border-radius: 10px;border: 1px solid black;");


</script>
</body>
</html>