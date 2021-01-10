<?php

namespace App\Services;

use App\Contracts\DataRetriever;
use Illuminate\Support\Facades\Storage;

class CSVRetriever implements DataRetriever {
    
    public function retrieveData($fileName): array
    {
        $filePath = Storage::disk('public')->path($fileName.'.csv');
        $file = fopen($filePath, "r");
        $count = -1;
        
        while (($data = fgetcsv($file, 200, ",")) !==FALSE) {
            //first line of provided transactions.csv is fields
            if ($count == -1) {
                $count++;
                continue;
            }
            
            $result[$count]['id'] = $data[0];
            $result[$count]['code'] = $data[1];
            $result[$count]['amount'] = $data[2];
            $result[$count]['user_id'] = $data[3];
            $result[$count]['created_at'] = $data[4];
            $result[$count]['updated_at'] = $data[5];
            $count++;
        }
        
        fclose($file);
        
        return $result;
    }
}
