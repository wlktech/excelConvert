<?php

namespace App\Exports;

use App\Models\Address;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAddress implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Address::select('homeNo', 'road', 'ward', 'township')->get();
    }

    public function headings(): array
    {
        // Define column headings
        return [
            'အိမ်အမှတ်',
            'လမ်း',
            'ရပ်ကွက်',
            'မြို့',
            // Add more column names as needed
        ];
    }
}
