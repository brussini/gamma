<?php

namespace App\Imports;

use App\Models\BusinessUnit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class BusinessUnitImport implements ToCollection, WithMultipleSheets, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use WithConditionalSheets;


   public function conditionalSheets(): array
    {
        return [
            'CODESEGMENT' => new BusinessUnitImport()
        ];
    }

    public function collection(Collection $rows)
    {
        
          foreach($rows as $row)
          { 
            BusinessUnit::updateOrcreate([
                        'mis_code' => $row['mis_code']  //if it exists update else create
                    ], [
                                'description'      => $row['description'],
                                'bu' => $row['bu'],
                                'segment' => $row['segment'],
                                'code' => $row['code'],
                    ]);
            }   
    }
}
