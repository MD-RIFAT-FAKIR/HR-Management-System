<?php
namespace App\Exports;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class DepartmentExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = Request::all();
      return Department::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array {

      $created_date = date('d-m-Y H:i A', strtotime($user->created_at));

      return[
        ++$this->index,
        $user->id,
        $user->department_name,
        $user->manager_name,
        $user->street_address,
        $created_date
      ];
    } 

    public function headings(): array {
      return [
        'Sl.No',
        'Id',
        'Department Name',
        'Manager Name',
        'Location Name',
        'Created At'
      ];
    }



  }