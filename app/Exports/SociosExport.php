<?php

namespace App\Exports;

use App\Models\Socios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class SociosExport implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    var $numref;
    public function __construct()
    {


    }

    public function view(): View
    {
        $socios=Socios::where('ingreso',1)->get();
        //$clientes = Cliente::all();
        $this->numref = count($socios);

        return view('export.socios', [
            'clientes' => $socios,
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        // TODO: Implement title() method.
        return 'Socios' ;
    }
    /**
     * @inheritDoc
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],

                    ]
                ];
                $styleArrayCabecera =
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => '007bff']
                        ],
                        'font' => [
                            'bold' => true,
                            'color' => ['argb' => 'FFFFFF']
                        ]
                    ];
                $event->sheet->getDelegate()->getStyle('A1:E1')->applyFromArray($styleArrayCabecera);
                $event->sheet->getDelegate()->getStyle('A1:E' . ($this->numref+1))->applyFromArray($styleArray);


            },
        ];
    }
}
