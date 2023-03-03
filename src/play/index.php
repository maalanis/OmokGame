<?php 
include_once "RandomStrategy.php";
$strategy = array('Smart' => 'SmartStrategy', 'Random' => 'RandomStrategy');
define("STRATEGIES", array('Smart' => 'SmartStrategy', 'Random' => 'RandomStrategy'));
define("SIZE" , 15);
define('PID', 'pid');
define('X','x');
define('Y', 'y');
define('ISWIN', 'isWin');
define('ISDRAW', 'isDraw');





$response = "response";
$reason = "reason";
$winningRow = [];
$board = array_fill(0, SIZE, array_fill(0, SIZE, 0));



//pid null outpus pid not specified
if(!array_key_exists(PID, $_GET)){
    echo json_encode(array("response" => false, "reason"=>"Pid not specified"));
    exit;
}
//x || y is null output mobe not specified
else if(!array_key_exists(X, $_GET)|| !array_key_exists(Y, $_GET)){
    echo json_encode(array("response" => false, "reason"=> "Move not specified"));
    exit;
}
$pid = $_GET[PID];
$x = $_GET[X];
$y = $_GET[Y];
$isDraw = false;
$isWin = false;

 if( $x>SIZE){
    echo json_encode(array("response" => false , "reason"=>"Invalid x coordinate, $x"));
    exit;
}
else if( $y>SIZE){
    echo json_encode(array("response" => false , "reason"=>"Invalid y coordinate, $y"));
    exit;
}

else if($board[$x][$y] == 0){ 
    $board[$x][$y] = 1; 
    checkGame($x, $y, 1);
    $playerInfo = array("x" => $x, "y" => $y, "isWin" => false, "isDraw" => false, "row" => $winningRow);
    //random
    //$randomStrategy = new RandomStrategy(new Board(15));
    //$random = $randomStrategy->pickPlace();
   // $opponentInfo = array("x" => $random[0], "y" => $random[1], "isWin" => false, "isDraw" => false, "row" => $winningRow);
    
    if($isWin){
        echo json_encode(array("response"=>true, "ack_move" => $playerInfo));

    }
    else if($isDraw){
        echo json_encode(array("response" => true, "ack_move" => $playerInfo));
    }
} else {
    
    echo json_encode(array("response"=> true, "ack_move" => $playerInfo, "move" =>$opponentInfo));
}

function checkGame($x, $y, $player){
    checkHorizontal($x, $y, $player);
    
}

function checkHorizontal($x, $y, $player){
    $count = 0;
    global $board;
    global $isWin; 
    for($i = 0; $i< SIZE; $i++){
        echo $board[$i][$y];
        if($board[$i][$y] == $player){
            $count++;
        }
        if($board[$i][$y] != $player){
            $count=0;
        }
        if($count == 5){
            $isWin = true;
        }
            
            
    }
}

function checkVertical($x, $y, $player){
    $count = 0;
    global $board;
    global $isWin;
    for($i = 0; $i< SIZE; $i++){
        if($board[$x][i] == $player){
            $count++;
        }
        if($board[$x][i] != $player){
            $count=0;
        }
        if($count == 5){
            $isWin = true;
        }
        
        
    }
}

function checkHorizontalRight($x, $y, $player){
    $count = 0;
    global $board;
    global $isWin;
    while($board[$x][$y] == $player){
        $x +=1;
        $y +=1;
    }
    while($board[$x][$y] == $player){
        if($count == 5){
            $isWin = true;
        }
        if($count[$x][$y] == player){
            $count++;
        }
    }
        
}









//$info = new GameInfo(SIZE, array_keys($strategy));

//echo json_encode($info);

//echo (json_encode(array("reason" => true, `pid` => $id)));

$randomStrategy = new RandomStrategy(new Board(15));
$random = $randomStrategy->pickPlace();
$opponentInfo = array("x" => $random[0], "y" => $random[1], "isWin" => false, "isDraw" => false, "row" => $winningRow);
$places = json_encode($random);
echo json_encode(array("response"=> true, "ack_move" => $playerInfo, "move" =>$opponentInfo));

//echo json_encode($places);
addNote($places);
//showNotes();


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