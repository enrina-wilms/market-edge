<?php 

function checkEmpty($value){
    if($value == ""){
        return true;
    }
    return false;
}

function checkDropDown($value, $default){
    if($value == $default){
        return true;
    }else{
        return false;
    }
}

