<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test PHP Script</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h3>Hello World Example Using PHP!</h3>
    <?php
        echo "Hello World!";
    ?>
    <hr/>
    <h3>Variable Declaration and Printing Values</h3>
    <?php
        $txt = "Variable declaration and assignment";
        echo nl2br("$txt\n");
        $a = 5;
        $b = 10;
        echo nl2br("a = ".$a." & b = ".$b."\n");
    ?>
    <hr/>
    <h3>String Manipulation</h3>
    <?php
        $str = "Computer Engineering";
        echo nl2br("String = ".$str."\n");
        echo nl2br("Length: ".strlen($str)."\n");
        echo nl2br("Word Count: ".str_word_count($str)."\n");
        echo nl2br("Reverse String: ".strrev($str)."\n");
        echo nl2br("Search for Comp in String: ".strpos($str, "Comp")."\n");
        echo nl2br("Replace Computer with Computer Science: ".str_replace("Computer","Computer Science",$str)."\n");
    ?>
    <hr/>
    <h3>Constants</h3>
    <?php
        define("PI",3.14);
        echo nl2br("PI = ".PI);
    ?>
    <hr/>
    <h3>Arithmetic Operators: </h3>
    <?php
        $a = 10;
        $b = 2;
        echo nl2br("a = ".$a." & b = ".$b."\n");
        echo nl2br("Sum = ".($a+$b)."\n");
        echo nl2br("Difference = ".($a-$b)."\n");
        echo nl2br("Product = ".($a*$b)."\n");
        echo nl2br("Divison = ".($a/$b)."\n");
        echo nl2br("Modulus = ".($a%$b)."\n");
    ?>
    <hr/>
    <h3>Comparison Operators: </h3>
    <?php
        $x = 5;
        $y = "5";
        echo nl2br("$x == $y --> ".($x==$y)."\n");
        echo nl2br("$x === $y --> ".($x===$y)."\n");
        echo nl2br("$x != $y --> ".($x!=$y)."\n");
        echo nl2br("$x !== $y --> ".($x!==$y)."\n");
        echo nl2br("$x >= $y --> ".($x>=$y)."\n");
        echo nl2br("$x < $y --> ".($x<$y)."\n");
    ?>
    <hr/>
    <h3>Conditional Statements: If</h3>
    <?php
        $age = 20;
        if($age >= 20) {
            echo nl2br("Buh-bye Teenage!\n");
        }
    ?>
    <hr/>
    <h3>Conditional Statements: If-else</h3>
    <?php
        $age =18;
        if($age >= 20) {
            echo nl2br("Buh-bye Teenage!\n");
        } else {
            echo nl2br("Teenage left!\n");
        }
    ?>
    <hr/>
    <h3>Conditional Statements: If-else-elseif</h3>
    <?php
        $age =14;
        if($age >= 20) {
            echo nl2br("Buh-bye Teenage!\n");
        } elseif($age >= 15 && $age <= 18) {
            echo nl2br("Teenage left!\n");
        } else {
            echo nl2br("Teenage far way!\n");
        }
    ?>
    <hr/>
    <h3>For-each Loop: </h3>
    <?php
        $colors = array("red","blue","green","black");
        $count = count($colors);
        for($x = 0; $x < $count; $x++) {
            echo nl2br($colors[$x]."\n");
        }
    ?>
    <hr/>
    <h3>Function usage: </h3>
    <?php
        function writeMsg() {
            echo nl2br("Hello from function!\n");
        }
        echo nl2br("Hello from global scope.\n");
        writeMsg();
    ?>
</body>
</html>