<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $iso2
 * @property string $iso3
 */
class Countries extends Model
{
    const ISO2_AT = 'AT';
    
    /**
     * @var array
     */
    protected $fillable = ['name', 'iso2', 'iso3'];

}
