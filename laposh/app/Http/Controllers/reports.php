<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel_info;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Reservation;
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

foreach ($data as $data) {
    $datamcount[(int)$data['month']] = $data['sum'];
}
$month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

for ($i = 1; $i <= 12; $i++) {
    $dataArr[$i]['month'] = $month[$i-1];
    if (!empty($datamcount[$i])) {
        $dataArr[$i]['sum'] = $datamcount[$i];
    } else {
        $dataArr[$i]['sum'] = 0;
    }
    
    
}
$datum=array_values($dataArr);
        return view('management.static.financial_report')->with('hotel_data',$hotel_data)->with('data',$datum)->with('payment_total',$payments_count);
    }


    public function weekly_data(){
        $hotel_data=Hotel_info::first();
        return view('management.static.weekly_report')->with('hotel_data',$hotel_data);
    }
    public function montly_data(){
        $hotel_data=Hotel_info::first();
        return view('management.static.montly_report')->with('hotel_data',$hotel_data);
    }
    public function annual_data(){
        $hotel_data=Hotel_info::first();
        return view('management.static.annual_report')->with('hotel_data',$hotel_data);
    }
}
