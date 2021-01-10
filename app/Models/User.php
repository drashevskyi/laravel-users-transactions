<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\UserDetails;

/**
 * @property int $id
 * @property string $email
 * @property boolean $active
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    const active_true = 1;
    
    /**
     * @var array
     */
    protected $fillable = ['email', 'active', 'created_at', 'updated_at'];
    
    /**
     * Get the userDetails associated with the user.
     */
    public function userDetails()
    {
        return $this->hasOne(UserDetails::class);
    }
    
    static function getUsersBy(int $active = null, string $citizenship = null)
    {
        $qb = DB::table('users')
            ->leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
            ->leftJoin('countries', 'user_details.citizenship_country_id', '=', 'countries.id')
            ->select('users.id as userId', 'countries.*', 'user_details.*', 'users.*');
        
        if ($active) {
            $qb->where('users.active', '=', $active);
        }
        
        if ($citizenship) {
            $qb->where('countries.iso2', '=', strtoupper($citizenship));
        }
        
        return $qb->get();
    }

}
