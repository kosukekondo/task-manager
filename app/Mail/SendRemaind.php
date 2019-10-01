<?php

namespace App\Mail;

use App\Task;
use App\Remainder;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRemaind extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $title;
    protected $tasks;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $today = new \Carbon\Carbon('today');
        $this->title = "【{$today->format('Y年m月d日')}】納期が近いタスク";

        $remainder = Remainder::find(1);
        $period_end = new \Carbon\Carbon("{$remainder->term} day");
        
        $this->tasks = Task::whereBetween('period', [$today, $period_end])
                            ->where('status_id', 1)
                            ->orderBy('period', 'asc')
                            ->get();

        return $this->view('remainders.mail')
                    ->from('break.cardinal@gmail.com')
                    ->subject($this->title)
                    ->with([
                        'title' => $this->title,
                        'tasks' => $this->tasks,
                      ]);
    }
}
