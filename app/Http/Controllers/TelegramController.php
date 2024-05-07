<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\TelegramOption;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    //
    public function subscribe(Request $request, $id) {
        $bet = Bet::find($id);

        $opt = TelegramOption::all()->first();
        $text = $opt->message($bet);

        if(!$bet) {
            Toastr::error('Invalid Bet information', "Failed");
        } else {
            $response = Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                'text' => $text,
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

    public function index() {
        $opt = TelegramOption::all()->first();

        return view('admin.telegram')->with('opt', $opt);
    }

    public function update(Request $request) {
        $request->validate([
            'message_description'=>'required',
            'message_link_to'=>'url',
        ]);

        TelegramOption::all()->first()->update($request->all());

        return redirect()->route('admin.telegram');
    }
}
