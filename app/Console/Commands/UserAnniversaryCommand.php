<?php

namespace App\Console\Commands;

use App\Jobs\UserAnniversaryJob;
use App\Mail\BirthdayMail;
use App\Mail\UserAnniversaryMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class UserAnniversaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:inactiveusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mail all inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $today= Carbon::now()->format('m-d');
        $users= User::where('created_at','LIKE','%'.$today.'%')->get();


        if($users){
            foreach($users as $user){
                $this->line('mail sending... to '.$user->email);
                dispatch(new UserAnniversaryJob($user));
            }
            
            $this->info('mail successfully send!');
        }else{
            $this->line('No user found!');
        }
        
    }
}
