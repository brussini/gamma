<?php

namespace App\Imports;

use App\Models\Dormant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use DB;

class DormantImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithMultipleSheets
{
    use WithConditionalSheets;
    
    public function conditionalSheets(): array
    {
        return [
            'Sheet1' => new DormantImport()
        ];
    }


    public function collection(Collection $rows)
    {

        DB::table('dormants')->truncate();

        foreach ($rows as $row) 
        {
            Dormant::create([            
                                'cust_ac_no'     => $row['cust_ac_no'],
                                'branch_code'      => $row['branch_code'],
                                'ac_desc' => $row['ac_desc'],
                                'cif' => $row['cif'],
                                'ac_stat_dormant' => $row['ac_stat_dormant'],
                                'eti_bus_seg' => $row['eti_business_segment_compt'],
            
            ]);
        }

    }

    public function batchSize(): int
    {
        return 100000;
    }

    public function chunkSize(): int
    {
        return 100000;
    }
}
