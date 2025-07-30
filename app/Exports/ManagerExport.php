<?php
namespace App\Exports;
use App\Models\Manager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class ManagerExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

   public function collection() {
      $request = Request::all();
      return Manager::getRecord($request);
  }


    protected $index = 0;

    public function map($user): array {
      return[
        ++$this->index,
        $user->id,
        $user->manager_name,
        $user->manager_email,
        $user->manager_mobile,
      ];
    }

    public function headings(): array {
      return[
       "Sl.No",
        "ID",
        "Manager Name",
        "Manager Email",
        "Manager Mobile",
      ];
    }

}