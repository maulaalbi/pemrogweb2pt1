<?php

$a = 123;
function Test()
{
    global $a;
    echo "Nilai A dalam fungsi = $a \n <br>";
}
Test();
echo "Nilai A luar fungsi = $a \n";
?>