<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use App\Quiz;

class QuizImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        // return dd($row);
        return new Quiz([
            'question'     => $row['question'],                        
            'removed'     => $row['removed'],                        
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'question';
    }
}
