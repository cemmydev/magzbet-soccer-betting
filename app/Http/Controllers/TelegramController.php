<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    //

    public function make_message($bet) {
        $text = "<b>New Bet Announced</b>"."
New bet on event <i>".$bet->event."</i> has announced
"."<a href='https://magzbet.com/bets'>Check it out</a>";
        return $text;
    }

    public function subscribe(Request $request, $id) {
        $bet = Bet::find($id);

        if(!$bet) {
            Toastr::error('Invalid Bet information', "Failed");
        } else {
            $response = Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                'text' => $this->make_message($bet),
                'parse_mode' => 'HTML',
            ]);
            
            Toastr::success('Subscribe successfully', "Success");
        }
        
        return redirect()->route('admin.posts');
    }

    public function getUpdate() {
        $response = Telegram::getUpdates();
        return response() -> json($response);
    }
}
