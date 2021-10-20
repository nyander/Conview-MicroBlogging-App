<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Post;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $liker;
    public $poster;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Post $poster)
    {
        $this->liker = $liker;
        $this->poster = $poster;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_liked')
            ->subject('Someone Liked yout post');
    }
}
