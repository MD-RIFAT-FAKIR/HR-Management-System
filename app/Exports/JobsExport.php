<?php
namespace App\Exports;
use App\Models\job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class JobsExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = Request::all();
      return job::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array{
      $CreatedAt = date('d-m-Y', strtotime($user->created_at));
      return[
        ++$this->index,
        $user->id,
        $user->job_title,
        $user->min_salary,
        $user->max_salary,
        $CreatedAt,
      ];
    }

    public function headings():array{
      return[
        'S.No',
        'ID',
        'Job Title',
        'Min Salary',
        'Max Salary',
        'Created Date',
      ];
    }

  }







?>