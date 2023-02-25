<?php 
include_once "RandomStrategy.php";
$strategy = array('Smart' => 'SmartStrategy', 'Random' => 'RandomStrategy');
define("STRATEGIES", array('Smart' => 'SmartStrategy', 'Random' => 'RandomStrategy'));
define("SIZE" , 10);



//$info = new GameInfo(SIZE, array_keys($strategy));

//echo json_encode($info);

//echo (json_encode(array("reason" => true, `pid` => $id)));

$randomStrategy = new RandomStrategy(new Board(15));
$places = json_encode($randomStrategy->pickPlace());
//echo json_encode($places);
addNote($places);
showNotes();


function addNote($places) {
    
    
    
    if (!empty($places)) {
        
        $fp = fopen("../data/game.txt", 'a');
        
        fputs($fp, nl2br($places) .
            "<br/>\n");
        
        fclose($fp);
        
    }
    
}


function showNotes() {
   
    echo file_get_contents("../data/game.txt", 'r');
}

// class GameInfo {
    
//     public $size;
//     public $strategies;
    
//     function __construct($size, $strategies) {
        
//         $this->size= $size;
//         $this->strategies = $strategies;
        
//     }}
        
    
//     $info = new GameInfo(SIZE, array_keys($strategy));
    
//     echo json_encode($info);
    
    
    
    //From the powerpoints 
    
//     $file = … $pid ...;
    
//     $json = file_get_contents($file);
    
//     $game = Game::fromJson($json);
    
//     $playerMove = $game->makePlayerMove($x, $y);
    
//     if ($playerMove->isWin || $playerMove->isDraw) {
        
//         unlink($file); /* … */ exit; }
        
//         $opponentMove = $game->makeOpponentMove();
        
//         if ($opponentMove->isWin || $opponentMove->isDraw) {
            
//             unlink($file); /* .. */ exit; }
            
//             storeState($file, $game->toJson());
            
//             …
            
//             static function;
            
//             see next page
 
//             //From the powerpoints end 
?>