<?php

  namespace App\Exports;

    use DB;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\WithMapping;
    use Maatwebsite\Excel\Concerns\Exportable;
    use Maatwebsite\Excel\Concerns\ShouldAutoSize;
    use Maatwebsite\Excel\Concerns\WithCustomStartCell;

    use App\Models\device;
    use App\Models\type;
    use App\Models\brand;
    use App\Models\site;
    use App\Models\location;
    use App\Models\rack;

class ExportsDevice implements WithCustomStartCell, ShouldAutoSize, FromCollection, WithHeadings, WithMapping {

    public function collection(){

        // return device::all();
        return device::with('types','brands','sites','locations','racks')->get();

    }

    public function map($device) : array {
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
            'Describtion',
            'Qrcode'
        ];
    }

    public function startCell(): string
    {
        return 'A5';
    }

}