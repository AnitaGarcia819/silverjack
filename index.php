<?php
    $deck = array();
    for($i = 1; $i <= 52; $i++){
        $deck[] = $i;
    }
   // print_r($deck);
    shuffle($deck);
    echo "<hr>";
    print_r($deck);
    $card = array_pop($deck);
    
    $suit = array("clubs", "diamonds", "hearts", "spades");
    $cardSuit = $suit[floor($card/13)];
    $cardValue = $card % 13;
    // if card value == 0 --> 13
 
    
    
    //echo "<img src =cards/clubs/1.png>";
    echo "<img src =cards/$cardSuit/$cardValue.png>";
    
?>
