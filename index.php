<?php
    
    // Two Dimensional Array that holds a player's hand
    // Rows represent card suits, while columns represent card values
    // Column is 53 so that each card value 1 - 52 is represented 
    $hand = array(array());
    // initialiize every value to 0
    function initHand($hand){
        //global $hand;
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
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Silver Jack </title>
    </head>
    <body>
        
        <?php
        // These are each player's hand for one game
        $player1 = getHand();
        $player2 = getHand();
        $player3 = getHand();
        $player4 = getHand();
        echo "Player one: " ;
        displayHand($player1);
        echo "<br>";
        echo "Player two: " ;
        displayHand($player2); 
        echo "<br>";
        echo "Player three: " ;
        displayHand($player3); 
        echo "<br>";
        echo "Player four: " ;
        displayHand($player4);
        echo "<br>";
        
        ?>
    </body>
</html>