<?php
use Detection\MobileDetect;

function is_mobile_device()
{
$detect = new MobileDetect;
return $detect->isMobile();
}