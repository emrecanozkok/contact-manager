<?php

namespace App\Enum;

enum InformationTypeEnum:string
{
    case EMAIL = 'email';
    case PHONE = 'phone';
    case LOCATION = 'location';
}
