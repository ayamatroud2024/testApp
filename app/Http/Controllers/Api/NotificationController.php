<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
 use App\Traits\NotificationTrait;
 use Illuminate\Support\Facades\Auth;


class NotificationController extends ApiController
{

    use NotificationTrait;
    public function __construct()
    {
        $this->resource = NotificationResource::class;
        $this->model = app(Notification::class);
        $this->repositry = new Repository($this->model);
    }

    public function save(Request $request)
    {
        return $this->store($request->all());
    }

    public function edit($id, Request $request)
    {

        return $this->update($id, $request->all());

    }


    public function sendNotiToUser(Request $request)
    {
        $user = User::find($request->id);

        $token = $user->device_token;

        $this->send($request->body,$request->title,$token);

        $note = new Notification();

        $note->content = $request->body;
        $note->user_id = $user->id;
        $note->title = $request->title;

        $note->save();


        return $this->returnSuccessMessage(__('The notification has been sent successfully!'));

    }

    public function sendNotiToAll(Request $request)
    {

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $this->send($request->body,$request->title,$FcmToken,true);

        $users=User::whereNotNull('device_token')->get();

        foreach($users as $user){


            $note = new Notification();

            $note->content = $request->body;
            $note->user_id = $user->id;
            $note->title = $request->title;

            $note->save();

            }

        return $this->returnSuccessMessage(__('The notification has been sent successfully!'));

    }


     public function myNotifications()
    {

        // $advertisements = Auth::user()->advertisements;
        $notifications = Notification::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10) ;
        return $this->returnData('data',  NotificationResource::collection( $notifications ), __('Get  succesfully'));

    }
}
