<?php
  
namespace App\Console\Commands;
  
use Illuminate\Console\Command;
use Mail;
use App\Mail\MerryChristmas;
use App\Models\User;
  
class AuthoChristmas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:christmas';
  
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
  
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today=date("dd/mm/YYYY");
        if($today==date("25/12/YYYY")){
        $users = User::all();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new MerryChristmas($user));
            }
        }}
  
        return 0;
    }
}