<?php

namespace App\Models;

use App\Enum\InformationTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $table = 'contact_informations';

    protected $primaryKey = 'id';

    protected $keyType='string';

    public $incrementing = true;

    protected $casts = [
        'id' => 'string',
        'contact_id' => 'string',
        //'information_type' => InformationTypeEnum::class
    ];



    protected $fillable = ['information_type','information_content'];
}
