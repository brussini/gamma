<?php

namespace App\Imports;

use App\Models\Segmentation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class SegmentImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Segmentation([
            'br'     => $row['br'],
            'gl_code'      => $row['gl_code'],
            'ccy_code' => $row['ccy_code'],
            'cust_ac_no' => $row['cust_ac_no'],
            'cust_no' => $row['cust_no'],
            'ac_desc' => $row['ac_desc'],
            'account_class' => $row['account_class'],
            'cust_mis_1' => $row['cust_mis_1'],
            'cust_mis_2' => $row['cust_mis_2'],
            'comp_mis_4' => $row['comp_mis_4'],
            'cust_mis_7' => $row['cust_mis_7'],
            'solde' => $row['solde'],
            'bu' => $row['bu'],
            'segment' => $row['segment'],
            'type' => $row['type'],
            
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
