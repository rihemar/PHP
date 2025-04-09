<?php
session_start(); // Moved outside the class for better control

if (isset($_POST['reset'])) {
    $_SESSION["nb_visite"] = 0;
}

class Session {
    public $nbVisite;

    public function __construct(){
        if (!isset($_SESSION["nb_visite"])) {
            $_SESSION["nb_visite"] = 1;
        } else {
            $_SESSION["nb_visite"]++;
        }
        $this->nbVisite = $_SESSION["nb_visite"];
    }
}

$s = new Session();

if ($s->nbVisite == 1) {
    echo "<br>First log here! Welcome<br>";
} else {
    echo "<br>Welcome back! log number: $s->nbVisite<br>";
}
?>

<!-- Add the reset button -->
<form method="post">
    <button type="submit" name="reset">Reset Session</button>
</form>
