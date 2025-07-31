<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PayRoll;

class PayRollController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = PayRoll::getRecord($request);
        return view("backend.payrolls.list", $data);
    }

    public function Add() {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view("backend.payrolls.add", $data);
    }

    public function Store(Request $request) {

            $user = new PayRoll;

            $user->employee_id        = trim($request->employee_id);
            $user->number_of_day_work = trim($request->number_of_day_work);
            $user->bonus              = trim($request->bonus);
            $user->over_time          = trim($request->over_time);
            $user->gross_salary       = trim($request->gross_salary);
            $user->cash_advance       = trim($request->cash_advance);
            $user->late_hours         = trim($request->late_hours);
            $user->absent_days        = trim($request->absent_days);
            $user->sss_contribution   = trim($request->sss_contribution);
            $user->philhealth         = trim($request->philhealth);
            $user->total_deductions   = trim($request->total_deductions);
            $user->netpay             = trim($request->netpay);
            $user->payroll_monthly    = trim($request->payroll_monthly);
            $user->save();
            return redirect('admin/payroll')->with('success','Pay Roll Saved Successfully');

    }

    public function View($id) {
        $data['getRecord'] = PayRoll::findOrFail($id);
        return view('backend.payrolls.view', $data);
    }

    public function Edit($id) {
        $data['payRoll'] = PayRoll::findOrFail($id);
        $data['user'] = User::where('is_role', '=', 0)->get();
        return View('backend.payrolls.edit', $data);
    }

    public function Update(Request $request, $id) {
        $user = PayRoll::findOrFail($id);

        $user->employee_id        = trim($request->employee_id);
        $user->number_of_day_work = trim($request->number_of_day_work);
        $user->bonus              = trim($request->bonus);
        $user->over_time          = trim($request->over_time);
        $user->gross_salary       = trim($request->gross_salary);
        $user->cash_advance       = trim($request->cash_advance);
        $user->late_hours         = trim($request->late_hours);
        $user->absent_days        = trim($request->absent_days);
        $user->sss_contribution   = trim($request->sss_contribution);
        $user->philhealth         = trim($request->philhealth);
        $user->total_deductions   = trim($request->total_deductions);
        $user->netpay             = trim($request->netpay);
        $user->payroll_monthly    = trim($request->payroll_monthly);
        $user->save();
        return redirect('admin/payroll')->with('success','Pay Roll Updated Successfully');
    }
}
