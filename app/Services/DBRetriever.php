<?php

namespace App\Services;

use App\Contracts\DataRetriever;
use Illuminate\Support\Facades\DB;

class DBRetriever implements DataRetriever {
    
    public function retrieveData($table): \Illuminate\Support\Collection
    {
        $result = DB::table($table)->get();
        
        return $result;
    }
}