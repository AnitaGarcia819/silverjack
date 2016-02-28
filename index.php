<?php
    // Two Dimensional Array that holds a player's hand
    // Rows represent card suits, while columns represent card values
    // Column is 53 so that each card value 1 - 52 is represented 
    $hand = array(array());
    // Initialiize every value to 0
    function initHand($hand){
        for($i = 0; $i < 4; $i++){
            for($j = 0; $j <= 52; $j++){
             $hand[$row][$col] = 0;
            }
        } 
        return $hand;
    }
  
    // 1 dimensional array that holds all suits
    // using index 0 -3
    $suit = array("clubs", "diamonds", "hearts", "spades");
    // Initializing the deck of cards 
    // with values 1 - 52 in a 1D array
    $deck = array();
    for($i = 1; $i <= 52; $i++){
        $deck[] = $i;
    }
    echo "<h1> Silver Jack<h1/>";
    
    function getHand(){
        global $suit;
        global $hand;
        global $deck;
        $totalPoints = 0;
        // Initializes hand
        $localhand = initHand($hand);
        // Shuffles deck
        shuffle($deck); 
        do {
             // Selects and removes card from deck
            $card = array_pop($deck);
            $cardSuit = floor($card/13);
            $cardValue = $card % 13;
            if($cardValue==0){
                $cardValue=13;
            }
            // Two dimensional array that holds a player's hand
            // Rows represent card suits, while columns represent card values
            // Inserts card value that was selected 
            $localhand[$cardSuit][$cardValue] = $cardValue;
            // Add card value to total points
            $totalPoints = $totalPoints + $cardValue;
        } while ($totalPoints <= 37);
        // Decide wether player gets an other card 
        $r = rand(0,1);
        if($r == 1){
            $card = array_pop($deck);
            $cardSuit = $suit[floor($card/13)];
            $cardValue = $card % 13;
            if($cardValue==0){
                $cardValue=13;
            }
            $player1[$i][0]=$cardSuit;//making an array with card value and suit and asigning it to player1
            $player1[$i][1]=$cardValue;//had to break it up like this or else I get one letter for the value of suit for some reason
            $localhand[$cardSuit][$cardValue] = $cardValue;
            // Add card value to total points
            $totalPoints = $totalPoints + $cardValue;
        }
        //echo "TOTAL POINTS: " . $totalPoints;
        return $localhand;      
    }
   
    // Will return a suit name 
    function getSuit($row){
        switch($row){
            case 0: return "clubs";
            case 1: return "diamonds";
            case 2: return "hearts";
            case 3: return "spades";
        }
    }
    // Prints 2D Array
    function printHand($hand){
        for ($row =0; $row < 4; $row++ ){
            for($col = 1; $col <= 52; $col++)
                {
                  $val = $hand[$row][$col];
                  echo "VAL: " . $val . " ";
                }
                echo "  ";
        }
    }
    // Will return total points for a given hand
    // the hand is a 2D array
    function getTotalPoints($hand){
        $totalPoints = 0;
        for ($row =0; $row < 4; $row++ ){
            for($col = 1; $col <= 52; $col++)
                {
                  $totalPoints = $totalPoints + $hand[$row][$col];
                }
        }
        return $totalPoints;
    }
    
    // Displays hand of the player that 
    // is passed in as an argument
    // Player that is passed in is a 2D array that contains their hand.
    function displayHand($player){
        for ($row =0; $row < 4; $row++ ){
            for($col = 1; $col <= 52; $col++)
                if($player[$row][$col] > 0){
                    // Will get the suit
                    $currentSuit = getSuit($row);
                    echo "<img src =cards/$currentSuit/$col.png>";
                    
                }
        }
        $totalPoints = getTotalPoints($player);
        echo "TOTAL POINTS: ".$totalPoints;
        return $totalPoints;
    }
    
    function displayWinners($totalPoints, $names){
        
       $difference = 42; //keeps track of who is closer to the number 42
        $pointsWon = 0; //keeps track of total point earned in a game
        $moreThanOne = -1;//keesp track if there is no winner = 0, one winner = 1, or multiple winners > 1;
        $name; //keeps track of all the winner's name
        for($i = 0; $i < count($totalPoints); $i++){
            
            $pointsWon += $totalPoints[$i]; //adds the numbers to points won
            if(42 >= $totalPoints[$i] && $difference > (42-$totalPoints[$i])){
                //only counts if number is smaller than 42 and the difference is smaller
               $name = $names[$i];
                $difference = 42- $totalPoints[$i];
                $moreThanOne = 1;
            }else if($difference == (42-$totalPoints[$i])){ 
                //if there is more than one winner it adds its name 
                $moreThanOne++;
                $name = $name.", ".$names[$i];
            }
        }
        
        //displays appropriate message 
       if($moreThanOne == 1){
             echo $name." wins ".$pointsWon." points!!";
       }else if($moreThanOne == 0){
           echo "No one wins ".$pointsWon." points! :(";
       }
       else{
           //if more than one play won the points are distribute
           echo $name." won ".($pointsWon/$moreThanOne)." points each!!";
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Silver Jack </title>
        <link href="style.css" rel="stylesheet" />
        
    </head>
    <body>
        
        <?php
        // These are each player's hand for one game
        $player1 = getHand();
        $player2 = getHand();
        $player3 = getHand();
        $player4 = getHand();
        
        $names = array("Anita", "Beto", "Laura", "Yarely");
        $usedNames = array();
        $totalPoints = array();
        echo "<br>";
        
        $r = rand(0,3);
        $usedNames[] = $r;
        echo $names[$r].": " ;
        echo "<img src='cards/clubs/$r.png' width ='50'height = '50'>";
        array_push($totalPoints,  displayHand($player1));
        
        echo "<br>";
        $r = rand(0,3);
        while(in_array($r, $usedNames)){
            $r = rand(0,3);
        }
        $usedNames[] = $r;
        echo $names[$r].": " ;
        echo "<img src='cards/clubs/$r.png' width ='50'height = '50'>";
        array_push($totalPoints,  displayHand($player2));
        
        echo "<br>";
        $r = rand(0,3);
        while(in_array($r, $usedNames)){
            $r = rand(0,3);
        }
        $usedNames[] = $r;
        echo $names[$r].": " ;
        echo "<img src='cards/clubs/$r.png' width ='50'height = '50'>";
        array_push($totalPoints,  displayHand($player3));
        
        echo "<br>";
        $r = rand(0,3);
        while(in_array($r, $usedNames)){
            $r = rand(0,3);
        }
        $usedNames[] = $r;
        echo $names[$r].": " ;
        echo "<img src='cards/clubs/$r.png' width ='50'height = '50'>";
        array_push($totalPoints,  displayHand($player4));
        echo "<br>";
        echo "<br>";
        
        //finds and displays the winner, or winners. 
        displayWinners($totalPoints, $names);
        
        ?>
    </body>
</html>