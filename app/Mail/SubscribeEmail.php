<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $myPost;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->myPost = $post;
    }

    public function build(): SubscribeEmail
    {
        return $this->view('email.subscribe')->with('post', $this->myPost);
    }
}
