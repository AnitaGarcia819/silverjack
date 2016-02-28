<?php
    $deck = array();
    for($i = 1; $i <= 52; $i++){
        $deck[] = $i;
    }
   // print_r($deck);
    shuffle($deck);
   // print_r($deck);
   echo "<h1> Silver Jack<h1/>";
    
    $card = array_pop($deck);
    
    $suit = array("clubs", "diamonds", "hearts", "spades");
    $cardSuit = $suit[floor($card/13)];
    $cardValue = $card % 13;
    // if card value == 0 --> 13
    
    //echo "<img src =cards/clubs/1.png>";
    echo "<hr>";
    echo "<img src =cards/$cardSuit/$cardValue.png>";
    echo "<hr>";
 
   $player1 = array(array());//initializing two dimensional array for player1
    
    for ($i=0; $i<5; $i++){//getting cards for player1
    
            $card = array_pop($deck);
    
            $suit = array("clubs", "diamonds", "hearts", "spades");
            $cardSuit = $suit[floor($card/13)];
            $cardValue = $card % 13;
            if($cardValue==0){
                $cardValue=13;
            }
            $player1[$i][0]=$cardSuit;//making an array with card value and suit and asigning it to player1
            $player1[$i][1]=$cardValue;//had to break it up like this or else I get one letter for the value of suit for some reason
    }

    
    //Assuming a two-dimensional array will be used for each of the players hand.
    function displayHand($player1){//passing a two dimensional array
        for ($i=0; $i<count($player1); $i++ ){
               echo "<img src =cards/".$player1[$i][0]."/".$player1[$i][1].".png>";
       }
    }
    
    displayHand($player1);//calling function
    
?>

<html>
    <head>
        <title>SilverJack</title>
        <link href="style.css" rel="stylesheet" />
    </head>
    
    <body>
       <!-- <h1> SilverJack </h1> -->
        
    </body>
    
</html>
