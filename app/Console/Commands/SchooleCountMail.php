<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Schoole;
use App\Jobs\SendEmail;
Use App\User;
class SchooleCountMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'studentCount:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to admin with studdent counts';

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
        //
        $admins = User::where('role', 'Admin')->get();
        $schooles = Schoole::withCount('students')->get();
        foreach ($admins as $key => $admin) {
            $email_data = [
                'template_path' => 'emails.admin.student-count',
                'subject' => 'Student Count',
                'schooles' => $schooles,
                'receiver_email' => $admin->email
            ];
            SendEmail::dispatch($email_data);
        }
    }
}
