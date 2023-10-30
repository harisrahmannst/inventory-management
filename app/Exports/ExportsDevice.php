<?php

  namespace App\Exports;

    use DB;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\WithMapping;
    use Maatwebsite\Excel\Concerns\Exportable;
    use Maatwebsite\Excel\Concerns\ShouldAutoSize;
    use Maatwebsite\Excel\Concerns\WithCustomStartCell;
    use Maatwebsite\Excel\Concerns\WithDrawings;
    use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
    use App\Exports\ExportsDevice;
    use Maatwebsite\Excel\Facades\Excel;

    use App\Models\device;
    use App\Models\type;
    use App\Models\brand;
    use App\Models\site;
    use App\Models\location;
    use App\Models\rack;

class ExportsDevice implements WithDrawings, WithCustomStartCell, ShouldAutoSize, FromCollection, WithHeadings, WithMapping {

    use Exportable;

    private $devices;
    private $drawings;

    public function __construct($devices)
    {
        $this->devices = $devices;
        $this->drawings = [];
    }

    public function drawings()
    {
        return $this->drawings;
    }

    public function map($device): array
    {
        // Map data perangkat ke dalam array
        return [
            $device->id,
            $device->device_name,
            $device->types['name_type'],
            $device->brands['name_brand'],
            $device->serial_number,
            $device->sites['name_site'],
            $device->locations['name_location'],
            $device->racks['name_rack'],
            $device->device_status,
            $device->image,
            $device->device_describtion,
            $device->qrcode
        ];
    }

    public function headings(): array
    {
        // Definisikan judul kolom
        return [
            'No',
            'Device Name',
            'Type',
            'Brand',
            'Serial Number',
            'Site',
            'Location',
            'Rack',
            'Status',
            'Image',
            'Description',
            'Qrcode'
        ];
    }

    public function collection()
    {
        // Ambil data perangkat berdasarkan ID yang diberikan
        return Device::whereIn('id', $this->devices)->get();
    }

    public function addDrawing($drawing)
    {
        $this->drawings[] = $drawing;
    }

    public function startCell(): string
    {
        return 'A5';
    }

}