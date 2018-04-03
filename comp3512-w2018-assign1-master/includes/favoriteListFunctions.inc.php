<?php
//checks if item is already included in the given favoriteList
//returns a boolean value
function checkItem($favListName, $idToFind){
$result = false;
foreach ($_SESSION[$favListName] as $row)
{
    if($row['ID'] == $idToFind)
    {
        $result = true;
    }
}
return $result;
}
?>