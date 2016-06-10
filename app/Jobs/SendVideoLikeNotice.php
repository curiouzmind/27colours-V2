<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Video;
use App\Like;
use App\Services\Mailers\UserMailer;

class SendVideoLikeNotice extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $video;
    protected $like;
    protected $mailer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video, Like $like)
    {
        $this->video= $video;
        $this->like= $like;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserMailer $mailer)
    {
        $this->mailer= $mailer;
         $this->mailer->sendLikeVideo($this->video,$this->like);
    }
}
