<?php
namespace App\Exports;
use App\Models\PayRoll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class PayrollExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = PayRoll::all();
      return PayRoll::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array {

      $created = date('d-m-Y H:i A', strtotime($user->created_at));
      $updated = date('d-m-Y H:i A', strtotime($user->updated_at));

      return [
        ++$this->index,
        $user->id,
        $user->name,
        $user->number_of_day_work,
        $user->bonus,
        $user->over_time,
        $user->gross_salary,
        $user->cash_advance,
        $user->late_hours,
        $user->absent_days,
        $user->sss_contribution,
        $user->philhealth,
        $user->total_deductions,
        $user->netpay,
        $user->payroll_monthly,
        $created,
        $updated,
      ];
    }

    public function headings(): array {
      return [
        'Sl.No',
        'ID',
        'Employee Name',
        'Number of Word Days',
        'Bonus',
        'Over Time',
        'Gross Salary',
        'Cash Advance',
        'Late Hours',
        'Absent Days',
        'SSS Contribution',
        'Philhealth',
        'Total Deductions',
        'Net Pay',
        'Pyroll Monthly',
        'Created',
        'Updated',
      ];
    }



  }