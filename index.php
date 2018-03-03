<?php
require 'Puzzle.php';
 $Tiles = array(1,2,3,8,0,4,7,6,5
);
$Completed= array(1,2,3,8,0,4,7,6,5
);
$Tiles=$_SESSION['TILE'];


 session_start();
ini_set('display_errors', 'on');

if(!isset($_SESSION['TILE'])) {
    $Tiles = array(1,2,3,8,0,4,7,6,5
    );
    $_SESSION['TILE'] = $Tiles;


}
Check_if_won($Completed,$Tiles);
    $Solution=$_COOKIE['spot'];


$blank_spot=Find_Blanks($Tiles);

$Tiles = Swipe_Tile($Solution,$blank_spot,$Tiles);

$_SESSION['TILE'] = $Tiles;
function Check_if_won($C,$S)
{
    $Counter=0;
    for ($i = 0; $i < 9; $i++) {
  if($C[$i]==$S[$i])
  {

      $Counter++;
  }
}

    if($Counter==9)
    {
        Echo "YOU WON!!!";
    }
}
function Swipe_Tile($spot,$Goal,$tile)
{


    if(($Goal+3)==$spot)
    {

        setcookie($Goal,$tile[$spot]);
        setcookie($spot,$tile[$Goal]);
        $val1 = $tile[$spot];
        $val2 = $tile[$Goal];
        $tile[$spot]=$val2;
        $tile[$Goal]=$val1;

    }
    else if(($Goal-3)==$spot)
    {
        setcookie($Goal,$tile[$spot]);
        setcookie($spot,$tile[$Goal]);
        $val1 = $tile[$spot];
        $val2 = $tile[$Goal];
        $tile[$spot]=$val2;
        $tile[$Goal]=$val1;

    }
    else if(($Goal-1)==$spot)
    {
        setcookie($Goal,$tile[$spot]);
        setcookie($spot,$tile[$Goal]);
        $val1 = $tile[$spot];
        $val2 = $tile[$Goal];
        $tile[$spot]=$val2;
        $tile[$Goal]=$val1;

    }
    else if(($Goal+1)==$spot)
    {
        setcookie($Goal,$tile[$spot]);
        setcookie($spot,$tile[$Goal]);
        $val1 = $tile[$spot];
        $val2 = $tile[$Goal];
        $tile[$spot]=$val2;
        $tile[$Goal]=$val1;

    }


    return $tile;
}
function Find_Blanks($arry)
{
    for ($i = 1; $i < 9; $i++) {

        if ($arry[$i] == 0) {
            $blanks = $i;
            echo "<br>";



        }
    }
    return $blanks;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<table id="tableID" style="cursor: pointer;">
    <tr>
        <td><?php echo isset($_COOKIE['0']) ? $_COOKIE['0'] : 1 ?></td>
        <td><?php echo isset($_COOKIE['1']) ? $_COOKIE['1'] : 2 ?></td>
        <td><?php echo isset($_COOKIE['2']) ? $_COOKIE['2'] : 3 ?></td>
    </tr>
    <tr>
        <td><?php echo isset($_COOKIE['3']) ? $_COOKIE['3'] : 8 ?></td>
        <td><?php echo isset($_COOKIE['4']) ? $_COOKIE['4'] : " " ?></td>
        <td><?php echo isset($_COOKIE['5']) ? $_COOKIE['5'] : 4 ?></td>
    </tr>
    <tr>
        <td><?php echo isset($_COOKIE['6']) ? $_COOKIE['6'] : 7 ?></td>
        <td><?php echo isset($_COOKIE['7']) ? $_COOKIE['7'] : 6 ?></td>
        <td><?php echo isset($_COOKIE['8']) ? $_COOKIE['8'] : 5 ?></td>
    </tr>
</table>
<script src="scripts/script_table.js"></script>

</body>

</html>