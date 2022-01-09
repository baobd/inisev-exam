<?php

namespace App\Jobs;

use App\Mail\SubscribeEmail;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscribeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $myPost;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->myPost = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SubscribeEmail($this->myPost);
        $website = $this->myPost->website;
        if ($website instanceof Website) {
            $subscribers = $website->users();
            foreach ($subscribers as $subscriber) {
                if ($subscriber instanceof User) {
                    if (! $this->myPost->hasSubscriber($subscriber)) {
                        sleep(60); // delay for sending over gmail
                        Mail::to($subscriber->email)->send($email);
                    }
                }
            }
        }
    }
}
