<?php // index.php

define('STRATEGY', 'strategy'); // constant

$strategies = ["Smart", "Random"];// supported strategies



if (!array_key_exists(STRATEGY, $_GET)) { /* write code here */
    
   echo 'no array key exists';
    
    
    
    exit; }

$strategy = $_GET[STRATEGY];

if("Smart" == $strategy || "Random" == $strategy){
    $id = uniqid();
    addNote($id);
    echo (json_encode(array("reason" => true, `pid` => $id)));
} else  echo 'response": false, "reason": "Strategy not specified';

function addNote($note) {
    
    
    
    if (!empty($note)) {
        
        $fp = fopen("../data/game.txt", 'a');
        
        fputs($fp, nl2br($note) .
            "<br/>\n");
        
        fclose($fp);
        
    }
    
}

        
        



?>