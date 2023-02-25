
<?php include_once "Board.php"?>
<?php include_once "Board.php";
class Game {

    
    
public $board;

public $strategy;



function toJson($game) { 
    return json_encode($game);
    
} // JSON rep. of this game

static function fromJson($json) {

$obj = json_decode($json); // of stdClass

$strategy = $obj->{'strategy'};

$board = $obj->{'board'};

$game = new Game();

$game->board = Board::fromJson($board);

$name = $strategy->{'name'};

$game->strategy = $name::fromJson($strategy);

$game->strategy->board = $game->board;

return $game;

}

}
?>