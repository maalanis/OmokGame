<?php // index.php

define('STRATEGY', 'strategy'); // constant

$strategies = ["Smart", "Random"];// supported strategies

$response = "response";
$reason = "reason";


if (!array_key_exists(STRATEGY, $_GET)) { /* write code here */
    
    echo json_encode(array($response => false, $reason => "Strategy not specified"));
    
    
    
    exit; }

$strategy = $_GET[STRATEGY];

if("Smart" === $strategy || "Random" === $strategy){
    $id = uniqid();
    addNote($id);
    echo (json_encode(array("reason" => true, `pid` => $id)));
} else  echo json_encode(array($response => false, $reason=>"Unknown strategy"));

function addNote($note) {
    
    
    
    if (!empty($note)) {
        
        $fp = fopen("../data/game.txt", 'a');
        
        fputs($fp, nl2br($note) .
            "<br/>\n");
        
        fclose($fp);
        
    }
    
}

        
        



?>