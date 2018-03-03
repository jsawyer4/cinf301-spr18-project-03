<?php

session_start();

ini_set('display_errors', 'on');
$tiles = isset($_SESSION['TILE']) ? $_SESSION['TILE'] : "EMPTY";
$blank;

if (isset($_COOKIE['row_clicked']))
{
    $row= $_COOKIE['row_clicked'];


}
if (isset($_COOKIE['col_clicked']))
{
    $col= $_COOKIE['col_clicked'];

}
$blank = Find_Blank($tiles);
$O = Current_Tile($row,$col);




Swipe_Tiles($O,$blank);
function Swipe_Tiles($spot,$Goal)
{
    if(($Goal+3)==$spot)
    {
        setcookie('spot',$spot);

    }
    else if(($Goal-3)==$spot)
    {
        setcookie('spot',$spot);

    }
    else if(($Goal-1)==$spot)
    {
        setcookie('spot',$spot);

    }
    else if(($Goal+1)==$spot)
    {
        setcookie('spot',$spot);

    }
}


function Current_Tile($rows,$cols)
{
    if ($rows == 0) {
        $spot = ($rows + ($cols));
    } else if ($rows == 1) {
        $spot = ($rows + (2 + $cols));
    } else if ($rows == 2) {
        $spot = ($rows + (4 + $cols));
    }
    return $spot;
}

function Find_Blank($arry)
{
    for ($i = 0; $i < 9; $i++) {
        if ($arry[$i] == 0) {
            $blanks = $i;
        }
    }
    return $blanks;
}



