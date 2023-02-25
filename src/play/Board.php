<?php 

class Board{
    
    public $board;
    public $size;
    
    function __construct($size){
        $this->size = $size;
        $this->board = array_fill(0, $this->size, array_fill(0, $this->size, 0));
        
    }
    
  
    
    function checkPlaces($x, $y, $dx, $dy, $player) {
        
        
        // expand to left/lower: $x - $dx, $y - $dy …
        
        // expand to right/upper: $x + $dy, $y + $dy …
        //2d array[size][size]
        //size of the board: 15
        //fromjason function for the board
        //function check empty(dx, dy)
        //if its zero it is empty
        
        //check win(x,y, wincount, player(one, two)
        //check vertically diaganoly horizontaly
        
        
        
        
        
        
    }
    
}
?>