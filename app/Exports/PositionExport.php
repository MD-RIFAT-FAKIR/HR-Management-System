<?php
namespace App\Exports;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class PositionExport implements FromCollection, ShouldAutoSize, 
  WithMapping, WithHeadings {

    public function collection() {
      $request = Position::all();
      return Position::getRecord($request);
    }

    public function headings(): array {
      return [
        "Sl.No",
        "ID",
        "Position Name",
        "Daily Rate",
        "Monthly Rate",
        "Working Days Per Month",
        "Created Date",
        "Updated Date",
      ];
    }

    protected $index = 0;

    public function map($user): array {
      $created_date = date('d-m-Y H:i A', strtotime($user->created_at));
      $updated_date = date('d-m-Y H:i A', strtotime($user->updated_at));
      return [
        ++$this->index,
        $user->id,
        $user->position_name,
        $user->daily_rate,
        $user->monthly_rate,
        $user->working_days_per_month,
        $created_date,
        $updated_date,
      ];
    }

}