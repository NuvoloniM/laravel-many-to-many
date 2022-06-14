<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// importo il model dei post per poter usare i dati nella mail
use App\Models\Post;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;
    // importando e usando i dati dei post meglio renderli private
    private $new_post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_post)
    {
        // mi passo i dati del post
        $this->post = $new_post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // cambio la vista perchè creo la views in una caltella mail e poi nella cartella relativa ai post
        // poichè per utilizzare i dati di post devo usare il $this, per passarmi i dati alla views devo passarlo in un modo diverso
        return $this->view('mails.posts.create', ['post' => $this->post]);
    }
}
