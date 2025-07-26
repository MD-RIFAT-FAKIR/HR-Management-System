<?php
namespace App\Exports;
use App\Models\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class CountryExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {
    
     public function collection() {
      $request = Request::all();
      return Country::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array{
      $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
      $endDate = date('d-m-Y H:i A', strtotime($user->updated_at));
    
      return[
        ++ $this->index,
        $user->id,
        $user->country_name,
        $user->region_name,
        $startDate,
        $endDate
      ];
    }

    public function headings():array{
      return[
        'Sl No',
        'Id',
        'Country Name',
        'Region Name',
        'Start Date',
        'End Date'
      ];
    }


  }






?>