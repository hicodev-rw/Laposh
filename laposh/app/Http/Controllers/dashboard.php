<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Category;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class dashboard extends Controller
{
    public function index()
    {
        $past_week_start=Carbon::now()->subWeek()->startOfWeek();
        $past_week_end=Carbon::now()->subWeek()->endOfWeek();
        $b1=(Reservation::where('created_at', ">",$past_week_end)->count())+(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->count());
        if($b1!=0){
        $booking_stats=(((Reservation::where('created_at', ">",$past_week_end)->count())-(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->count()))/$b1)*100;
        }
        else{
            $booking_stats=0;
        }
        $bo=Reservation::where('created_at', ">",$past_week_end)->where('status_id',2)->count()+Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',2)->count();
        if($bo!==0){
        $ongoing_stats=(((Reservation::where('created_at', ">",$past_week_end)->where('status_id',2)->count())-(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',2)->count()))/$bo)*100;
    }
    else{
        $ongoing_stats=0; 
    }
    $bc=Reservation::where('created_at', ">",$past_week_end)->where('status_id',3)->count()+Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',2)->count();
    if($bc!=0){

        $closed_stats=(((Reservation::where('created_at', ">",$past_week_end)->where('status_id',3)->count())-(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',3)->count()))/$bc)*100;
    }
    else{
        $closed_stats=0; 
    }

    $bcl=(Reservation::where('created_at', ">",$past_week_end)->where('status_id',4)->count())+(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',4)->count());
    if($bcl!=0){
        $cancelled_stats=(((Reservation::where('created_at', ">",$past_week_end)->where('status_id',4)->count())-(Reservation::whereBetween('created_at', [$past_week_start,$past_week_end])->where('status_id',4)->count()))/$bcl)*100;
    }
    else{
        $cancelled_stats=0; 
    }

    $clients_stats=(User::where('created_at','>', $past_week_end)->whereNot('Role','client')->count());

        $bookings=count(Reservation::all());
        $ongoing=count(Reservation::all()->where('status_id','=',2));
        $cancelled=count(Reservation::all()->where('status_id','=',4));
        $closed=count(Reservation::all()->where('status_id','=',3));
        $rooms=count(Room::all());
        $categories=count(Category::all());
        $clients=count(User::where('role','client')->get());
        $users=count(User::whereNot('role','client')->get());
        $payments_count=Payment::sum('amount');
        $payments=Payment::all();

        $data = Reservation::select('id', 'check_in_date')
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->check_in_date)->format('m');
        });

    $datamcount = [];
    $dataArr = [];

    foreach ($data as $key => $value) {
        $datamcount[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($datamcount[$i])) {
            $dataArr[$i]['count'] = $datamcount[$i];
        } else {
            $dataArr[$i]['count'] = 0;
        }
        $dataArr[$i]['month'] = $month[$i - 1];
    }
    $graph=array_values($dataArr);



//past year data
    $data2 = Reservation::select('id', 'check_in_date')
    ->whereYear('check_in_date', date('Y', strtotime('-1 year')))
    ->get()
    ->groupBy(function ($date) {
        return Carbon::parse($date->check_in_date)->format('m');
    });

$data2mcount = [];
$data2Arr = [];

foreach ($data2 as $key => $value) {
    $data2mcount[(int)$key] = count($value);
}

$month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

for ($i = 1; $i <= 12; $i++) {
    if (!empty($data2mcount[$i])) {
        $data2Arr[$i]['count'] = $data2mcount[$i];
    } else {
        $data2Arr[$i]['count'] = 0;
    }
    $data2Arr[$i]['month'] = $month[$i - 1];
}
$graph2=array_values($data2Arr);



//this year data
$data3 = Reservation::select('id', 'check_in_date')
    ->whereYear('check_in_date', date('Y'))
    ->get()
    ->groupBy(function ($date) {
        return Carbon::parse($date->check_in_date)->format('m');
    });

$data3mcount = [];
$data3Arr = [];


foreach ($data3 as $key => $value) {
    $data3mcount[(int)$key] = count($value);
}
$month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

for ($i = 1; $i <= 12; $i++) {
    if (!empty($data3mcount[$i])) {
        $data3Arr[$i]['count'] = $data3mcount[$i];
    } else {
        $data3Arr[$i]['count'] = 0;
    }
    $data3Arr[$i]['month'] = $month[$i - 1];
}
$graph3=array_values($data3Arr);

//cancelling

$data4 = Reservation::select('id', 'check_in_date')
    ->where('status_id', 4)
    ->get()
    ->groupBy(function ($date) {
        return Carbon::parse($date->check_in_date)->format('m');
    });

$data4mcount = [];
$data4Arr = [];


foreach ($data4 as $key => $value) {
    $data4mcount[(int)$key] = count($value);
}
$month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

for ($i = 1; $i <= 12; $i++) {
    if (!empty($data4mcount[$i])) {
        $data4Arr[$i]['count'] = $data4mcount[$i];
    } else {
        $data4Arr[$i]['count'] = 0;
    }
    $data4Arr[$i]['month'] = $month[$i - 1];
}
$graph4=array_values($data4Arr);



//top booked room

      return view('management.static.index')->with('bookings',$bookings)->with('ongoing',$ongoing)->with('clients',$clients)->with('users',$users)->with('rooms',$rooms)->with('categories',$categories)->with('closed',$closed)->with('cancelled',$cancelled)->with('payments',$payments)->with('payments_count',$payments_count)->with('booking_stats',$booking_stats)->with('ongoing_stats',$ongoing_stats)->with('cancelled_stats',$cancelled_stats)->with('closed_stats',$closed_stats)->with('clients_stats',$clients_stats)->with('graph',$graph)->with('graph2',$graph2)->with('graph3',$graph3)->with('graph4',$graph4);
    }
}
