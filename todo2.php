<?php

$items = array();

function listItems($list) {
    $string = '';
    foreach($list as $key => $item) {
        $key++;
        $string .= "[{$key}] {$item}\n";
    }
return $string;
}

function getInput($upper = false) {
    return (trim(fgets(STDIN)));
}

function sortMenu($items) {
    echo '(A) - Z, (Z) - A, (O)rder, (R)everse order : ';
    
    $input = strtoupper(getInput());

    switch($input) {
        case 'A':
            asort($items);
            break;
        case 'Z':
            arsort($items);
            break;
        case 'O':
            ksort($items);
            break;
        case 'R':
            krsort($items);
            break;  
    } 
    return $items;
}



do {

    echo listItems($items);

    echo '(N)ew item, (R)emove item, (Q)uit, (S)ort: ';

    $input = strtoupper(getInput());
    
    switch($input) {
        case 'N':
            echo 'Enter item to add: ';
            
            $newitem = getInput();
                echo 'Add to the (B)eginning or (E)nd of list? ';
                $choice = strtoupper(getInput());
                switch($choice) {
                    case 'B':
                        array_unshift($items, $newitem);
                        break;
                    default:
                        array_push($items, $newitem);
                        break;
                }
            break;
        case 'R':
            echo 'Enter item to remove:';
            $key = getInput($input);
            $key--;
            unset($items[$key]);
            break;
        case 'S':
            $items = sortMenu($items);
            break;
        case 'F': 
            array_shift($items);
            break;
        case 'L':
            array_pop($items);
            break;
    }

} while ($input != 'Q');


echo 'Goodbye!' . PHP_EOL;


exit(0);