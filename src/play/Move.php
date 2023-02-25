
<?php $playerMove = makePlayerMove($x, $y); // instance of Move

if ($playerMove->isWin || $playerMove->isDraw) {

echo createResponse($playerMove); exit;

}

$opponentMove = makeOpponentMove(); // instance of Move

echo createResponse($playerMove, $opponentMove);

…  

function createResponse($playerMove, $opponentMove = null) {

$result = array("response" => true, "ack_move" => $playerMove);

if ($opponentMove) { $result["move"] = $opponentMove; }

return json_encode($result);

}
?>
