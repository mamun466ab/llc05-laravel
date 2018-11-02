<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NotifyInactiveUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email inactive users';

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
        $limit = Carbon::now()->subDay(7);

        $inactive_users = User::where('last_login', '<', '2018-11-03 16:49:01')->get();

        foreach ($inactive_users as $user) {
            $user->notify(new NotifyInactiveUser());
            $this->info('Email sent to '.$user->email);
        }
    }
}
