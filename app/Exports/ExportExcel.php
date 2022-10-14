<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\ImportExcelModel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;


class ExportExcel implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'User Name',
            'User Email',
            'User Mobile',
            'Created Date and Time',
        ];
    } 

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:D1')->getFont()->setSize(14)->setBold(true);
            },
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->mobile,
            date('Y-m-d H:i:s',strtotime($user->created_at))
        ];
    }
    
    public function collection()
    {
        return ImportExcelModel::select('name','email','mobile','created_at')->get();
    }

}
