<?php 

include_once "Board.php";

abstract class MoveStrategy {
    
    protected $board;
    
    function __construct(Board $board = null) {
        
        $this->board = $board;
        
    }
    
    abstract function pickPlace();
    
    function toJson() {
        
        return array(‘name’ => get_class($this));
        
    }
    
    static function fromJson() {
        
        $strategy = new static();
        
        return $strategy;
        
    }
    
    //function board size returns board size 
    
}
?>