<?php
system('stty cbreak -echo');

$stdin = fopen('php://stdin', 'r');

while (1) {
    $c = ord(fgetc($stdin));
    echo "Char read: $c\n";
}
