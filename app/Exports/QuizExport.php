<?php

namespace App\Exports;

use App\Quiz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;



class QuizExport implements FromQuery, WithMapping, WithHeadings, WithColumnWidths, WithStyles
{
    use Exportable;

    public function query()
    {
        return Quiz::query();
    }
    
    public function map($quiz): array
    {
        $options = array("", "", "", "");
        $correct_option = "A";
        for ($i=0; $i < count($quiz->options); $i++) { 
            $options[$i] = $quiz->options[$i]->value;
            if ($quiz->options[$i]->correct_option == 1 ) {
                switch ($i) {
                    case 0:
                        $correct_option = "A";
                        break;
                    case 1:
                        $correct_option = "B";
                        break;
                    case 2:
                        $correct_option = "C";
                        break;
                    case 3:
                        $correct_option = "D";
                        break;
                }
            }
        }
        return [                    
            $quiz->question,   
            $options[0],
            $options[1], 
            $options[2],
            $options[3],
            $correct_option
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50,
            'B' => 50,            
            'C' => 50,            
            'D' => 50,            
            'E' => 50,            
            'F' => 50,            
            
        ];
    }

    public function headings(): array
    {
        return [            
            'Question',
            'Option A',
            'Option B',
            'Option C',
            'Option D',                        
            'Correct Option',                        
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->freezePane("A2");
        
        // $sheet->getProtection()->setSheet(true);        

        // $format = 'A2:G' . ($sheet->getHighestRow()+200);
        // $sheet->getStyle($format)->getProtection()->setLocked(Protection::PROTECTION_UNPROTECTED);        
        
    }
}
