<?php

namespace App\Imports;

use App\Models\DigitalProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;



class DigitalProductImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    

    public function model(array $rows)
    {
        
        return new DigitalProduct([
            'client_id'     => $row['clientid'],
            'product'      => $row['product'],
            'setup' => $row['setup']
        ]);

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
