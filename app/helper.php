<?php 

function dateformate($formate, $date)
{
    $date = date($formate,strtotime($date));
    return $date;
}