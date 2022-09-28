<?php

namespace App\Enum;

enum InformationTypeEnum:string
{
    case phone = 'PHONE';
    case location = 'LOCATION';
    case email = 'EMAIL';
}
