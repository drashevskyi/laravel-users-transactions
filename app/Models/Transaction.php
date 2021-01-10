<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $code
 * @property string $amount
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Transaction extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['code', 'amount', 'user_id', 'created_at', 'updated_at'];

}
