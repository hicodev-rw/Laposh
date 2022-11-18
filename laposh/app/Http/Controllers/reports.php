<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel_info;
use App\Models\Payment;
use Carbon\Carbon;
use DB;
class reports extends Controller
{
    public function financial(){
        $hotel_data=Hotel_info::first();
        $payments=Payment::whereYear('created_at', date('Y'))->get();
        $payments_count = 0;
        foreach ($payments as $revenue) {
            $payments_count += $revenue->amount;
        }


        //monthwise payments data
        $data = Payment::select(
        DB::raw("(DATE_FORMAT(created_at, '%m')) as month"),
        DB::raw("(sum(amount)) as sum"))
        ->whereYear('created_at', date('Y'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
        ->get();

$datamcount = [];
$dataArr = [];

foreach ($data as $key => $value) {
    $datamcount[(int)$key] = $value;
}
$month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

for ($i = 1; $i <= 12; $i++) {
    $dataArr[$i]['month'] = $month[$i-1];
    if (!empty($datamcount[$i])) {
        $dataArr[$i] = $datamcount[$i];
    } else {
        $dataArr[$i] = 0;
    }
    
    
}
return $dataArr;
$datum=array_values($dataArr);
        return view('management.static.financial_report')->with('hotel_data',$hotel_data)->with('data',$datum)->with('payment_total',$payments_count);
    }

}
