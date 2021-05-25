<?php

namespace App\Imports;

use App\Models\DigitalProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;



class DigitalProductImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithMultipleSheets, ShouldQueue
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'DigitalProduct' => new DigitalProductImport()
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DigitalProduct::updateOrcreate([            
            'client_id'     => $row['clientid']
            ],[    
                                'product'      => $row['product'],
                                'setup' => $row['setup'],
            
            ]);
        }

    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
