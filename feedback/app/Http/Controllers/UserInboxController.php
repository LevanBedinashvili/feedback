<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserInboxController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function recived()
    {
        $messages = Message::where('reciver_id' , Auth::user()->id)->where('reciver_delete' , 0)->OrderBy('date_2', 'desc')->get();
        $current_date = Carbon::now()->locale('ka');
        return view('inbox.recived' , compact('messages' , 'current_date'));
    }

    public function sent()
    {
        $sentmessages = Message::where('user_id' , Auth::user()->id)->where('sender_delete' , 0)->OrderBy('date_2', 'desc')->get();
        $current_date = Carbon::now()->locale('ka');
        return view('inbox.sent', compact('sentmessages', 'current_date'));
    }

    public function compose()
    {
        return view('inbox.compose');
    }

    public function send(Request $request)
    {
        $reciver_id = User::select('id')->where('email' , $request->reciver_email)->first();

        if(!empty($reciver_id)) {
            if($reciver_id->id != Auth::user()->id) {
                $validator = Validator::make($request->all(), Message::rules());

                if ($validator->fails()) {
                    return back()->withDanger('სცადეთ თავიდან!');
                }
                $new_message = new Message;
                $new_message->user_id = Auth::user()->id;
                $new_message->reciver_id = $reciver_id->id;
                $new_message->title = $request->title;
                $new_message->text = $request->text;
                $new_message->date = date('Y-m-d');
                $new_message->date_2 = Carbon::now()->format('Y/m/d H:i:s');
                $new_message->sender_delete = 0;
                $new_message->reciver_delete = 0;
                $new_message->message_seen = 0;
                $new_message->save();
                return back()->withSuccess('წერილი წარმატებით გაიგზავნა!');
            }
            return back()->withDanger('თქვენს თავს ვერ გაუგზავნით წერილს!');
        }
        return back()->withDanger('ასეთი ელ.ფოსტა არ არსებობს!');
    }

    public function openmessage($id)
    {
        $msg = Message::where('id', $id)->first();

        if(!empty($msg)) {
            if(Auth::user()->id == $msg->user_id OR Auth::user()->id == $msg->reciver_id) {
                if(Auth::user()->id == $msg->user_id AND $msg->sender_delete == 0) {
                    return view('inbox.openmessage', compact('msg'));
                }
                if(Auth::user()->id == $msg->reciver_id AND $msg->reciver_delete == 0) {
                    if($msg->message_seen == 0){
                        $msgupdate = Message::findOrFail($id);
                        $msgupdate->message_seen = 1;
                        $msgupdate->save();
                    }
                    return view('inbox.openmessage', compact('msg'));
                }
                return back()->withDanger('ასეთი წერილი არ არსებობს');
            }
            return back()->withDanger('ასეთი წერილი არ არსებობს');
        }
        return back()->withDanger('ასეთი წერილი არ არსებობს');
    }

    public function MsgDelete(Request $request)
    {
            for($count = 0; $count < count($request['checkbox_value']); $count++)
            {
                $msg = Message::where('id', $request['checkbox_value'][$count])->first();

                if(Auth::user()->id == $msg->user_id OR Auth::user()->id == $msg->reciver_id) {

                    if(Auth::user()->id == $msg->reciver_id ) {

                        $statusupdate = Message::where('id',$request['checkbox_value'][$count])->first();
                        $statusupdate->reciver_delete = 1;
                        $statusupdate->save();
                    }
                    if(Auth::user()->id == $msg->user_id ) {
                        $statusupdate = Message::where('id',$request['checkbox_value'][$count])->first();
                        $statusupdate->sender_delete = 1;
                        $statusupdate->save();
                    }
                }
                return false;
            }
    }
}
