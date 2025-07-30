<?php
namespace App\Exports;
use App\Models\JobHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class JobHistoryExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = Request::all();
      return JobHistory::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array{
      $startDate = date('d-m-Y', strtotime($user->start_date));
      $endtDate = date('d-m-Y', strtotime($user->end_date));
      $createdAt = date('d-m-Y H:i A', strtotime($user->created_at));
      
      return[
        $user->id,
        $user->name.' '.$user->last_name,
        $user->job_title,
        $user->department_name,
        $startDate,
        $endtDate,
        $createdAt,
      ];
    }

    public function headings():array{
      return[
        'Id',
        'Employee Name',
        'Job Title',
        'Department Name',
        'Start Date',
        'End Date',
        'Created At'
      ];
    }
    
  }







?>