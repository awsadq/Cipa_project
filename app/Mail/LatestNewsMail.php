<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class LatestNewsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $news;

    public function __construct($news)
    {
        // Генерация excerpt прямо здесь:
        $news->excerpt = Str::limit(strip_tags($news->content), 200);
        $this->news = $news;
    }

    public function build()
    {
        return $this->subject('Последняя новость от ИПБА КР')
            ->view('emails.latest-news');

    }
}
