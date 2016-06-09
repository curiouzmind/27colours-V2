<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Song;
use App\Like;
use App\Services\Mailers\UserMailer;

class SendSongLikeNotice extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $song;
    protected $like;
    protected $mailer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Song $song,Like $like)
    {
        $this->song= $song;
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
        $this->mailer->sendLikeSong($song,$like);
    }
}
