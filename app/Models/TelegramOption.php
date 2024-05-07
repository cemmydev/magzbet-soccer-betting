<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramOption extends Model
{
    use HasFactory;

    protected $fillable = ['message_title', 'message_description', 'message_link_to', 'message_link_text'];

    public function message($bet) {
        $text = '<b>'.$this->message_title."</b>\r\n".$this->message_description."\r\n<a href='".$this->message_link_to."'>".$this->message_link_text."</a>";
        $text = str_replace('$event$', "'$bet->event'", $text);
        $text = str_replace('$odds$', "'$bet->odds'", $text);
        return $text;
    }
}
