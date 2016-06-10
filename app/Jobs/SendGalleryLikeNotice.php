<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Gallery;
use App\Like;
use App\Services\Mailers\UserMailer;


class SendGalleryLikeNotice extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $gallery;
    protected $like;
    protected $mailer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Gallery $gallery, Like $like)
    {
        $this->gallery= $gallery;
        $this->like= $like;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserMailer $mailer)
    {
        $this->mailer=$mailer;
        $this->mailer->sendLikeGallery($this->gallery,$this->like);
    }
}
