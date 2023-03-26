<?php
use Detection\MobileDetect;
use App\RelationType;

function is_mobile_device()
{
    $detect = new MobileDetect;
    return $detect->isMobile();
}

function getAge($date_of_birth,$date_of_death){
    $dob         =    new DateTime($date_of_birth);
    $dod         =    new DateTime($date_of_death);
    $diff        =    $dod->diff($dob);
    if($diff->y > 0){
        return $diff->y." years ";
    }
    else if($diff->m > 0) {
        return $diff->m." months ";
    }
    else{
        return $diff->d > 0 ? $diff->d." days":($diff->y== 0 && $diff->m== 0 ? '1 Day':'');
    }
    //return ($diff->y > 0 ? $diff->y." years ":'') . ($diff->m > 0 ? $diff->m." months ":'') . ($diff->d > 0 ? $diff->d." days":($diff->y== 0 && $diff->m== 0 ? '1 Day':''));
}
function getRelationType($id){
    $result = RelationType::find($id);
    if($result){
        return $result->title;
    }else{
        return '';
    }
}