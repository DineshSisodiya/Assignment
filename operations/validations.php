<?php

function validateName($inp) {
  if(!preg_match("/^[a-zA-Z ]*$/",$inp)) {
    return 0;
  }
  return 1;
}

function validateIncome($inp) {
  if(!preg_match("/^([0-9]{1,11}[.][0-9]{1,2})|([0-9]{1,11})$/",$inp)) {
    return 0;
  }
  return 1;
}

function validateAddress($inp) {
  if(!preg_match("/^[a-zA-Z0-9,.\- ]*$/",$inp)) {
    return 0;
  }
  return 1;
}

function validateDOB($inp, $min_age=1, $max_age=100) {
  if(preg_match("/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/", $inp)) {
    $dob = strtotime($inp);
    $min_age = strtotime('-'.$min_age.'years');
    $max_age = strtotime('-'.$max_age.'years');
    if($dob < $max_age or $dob > $min_age) {
      return false;
    }
      return true;
  }
  return false;
}

function validateEmail($inp)
{
  if(filter_var($inp, FILTER_VALIDATE_EMAIL))
    return true;
  return false;
}


?>