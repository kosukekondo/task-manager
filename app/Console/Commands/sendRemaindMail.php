<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendRemaind;

use App\Remainder;

class sendRemaindMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an daily email';

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
        #配信可否の確認
        $remainder = Remainder::find(1);
        if ($remainder->send_stat == 1) {
            Mail::to('break.cardinal@gmail.com')->send(new SendRemaind());
        }
    }
}
