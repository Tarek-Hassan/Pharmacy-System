<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\NotifyInactiveUser;
use Carbon\Carbon;
use App\User;
class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'notify:users-not-logged-in-for-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Inactive Users more than 30 days not loginIn';

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
     * @return mixed
     */
    public function handle()
    {
        // use this for test

        $limit = Carbon::now()->subDay(30);
        $inactive_user = User::where('last_login', '<', $limit)->get();

        foreach ($inactive_user as $user) {
            $user->notify(new NotifyInactiveUser());
        }
    }
}
