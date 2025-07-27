<?php
namespace App\Exports;
use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class LocationExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = Location::all();
      return Location::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array {
      $createdDate = date("d-m-Y H:i A", strtotime($user->created_at));
      return [
        ++$this->index,
        $user->id,
        $user->street_address,
        $user->postal_code,
        $user->city,
        $user->state_provice,
        $user->country_name,
        $createdDate
      ];
  }

  public function headings(): array {
    return [
      'Sl.no',
      'Id',
      'Street Address',
      'Postal Code',
      'City',
      'State Provice',
      'Country Name',
      'Created Date'
    ];
  }


}




  ?>