<?php
    
    // Two Dimensional Array that holds a player's hand
    // Rows represent card suits, while columns represent card values
    // Column is 53 so that each card value 1 - 52 is represented 
    $hand[4][53];
    // initialiize every value to 0
     for($i = 0; $i < 4; $i++){
         for($j = 0; $j <= 52; $j++){
             $hand[$row][$col] = 0;
         }
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
        // Shuffles deck
        shuffle($deck); 
        do{
            // Selects and removes random card from deck
            $card = array_pop($deck);
            $cardSuit = $suit[floor($card/13)];
            $cardValue = $card % 13;
            if($cardValue==0){
                $cardValue=13;
            }
            // Two dimensional array that holds a player's hand
            // Rows represent card suits, while columns represent card values
            $hand[$cardSuit][$cardValue] = $cardValue;
            // Add card value to total points
            $totalPoints += $cardValue;
        }while($totalPoint <= 37);
        return $hand;
    }
    
    // Displays hand of the player that 
    // is passed in as an argument
    // Player that is passed in is a 2D array that contains their hand.
    function displayHand($player1){
        for ($row =0; $row < 4; $row++ ){
            for($col = 1; $col <= 52; $col++)
                if($player1[$row][$col] > 0)
                    echo "<img src =cards/$row/$col.png>";
       }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <?php 
        // These are each player's hand for one game
        $player1 = getHand();
        //$player2 = getHand();
        //$player3 = getHand();
        //$player4 = getHand();
        displayHand($player1)
        ?>
    </body>
</html>
