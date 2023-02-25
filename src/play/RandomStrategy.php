

<?php 
include_once "Board.php";
include_once "MoveStrategy.php";


    
class RandomStrategy extends MoveStrategy{
    
    protected $board;
    
    
    
   
    
    function __construct(Board $board = null) {
        parent:: __construct(($board));
        
 
  
        
    }
    
    
 
    
     function pickPlace(){
      $x= random_int(0, 14);
      $y= random_int(0, 14);
      return [$x, $y];
    } 
    
    function toJson() {
        
        return array(‘name’ => get_class($this));
        
    }
    
    static function fromJson() {
        
        $strategy = new static();
        
        return $strategy;
        
    }
    
    //function board size returns board size
    
    //constructor public function _construct
    
    //parent::__construct( ) // overide constructor
    //2
    //method pick place
    //do random integer for x and y
    // make sure that the spot is empty
    //if empty return x and y 
    
}


?>
