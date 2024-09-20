<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SummaryTaskMail;
use App\Models\Anonymous;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Traits\ResponseTrait;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    use ResponseTrait;

    /**
     * @var UserRepository
     */
    protected $userRepositry;

    public function __construct()
    {
        $this->userRepositry = new UserRepository(app(User::class));
    }

    public function login(AuthRequest $request)
    {
        if (!Auth::attempt(
            $request->only([
                'email',
                'password',
            ]))) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'msg' => __('Invalid credentials!'),
            ], 500);
        }


        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response(['status' => true, 'code' => 200, 'msg' => __('Log in success'), 'data' => [
            'token' => $accessToken,
            'user' => UserResource::make(Auth::user()),
        ]]);
    }




    public function store(UserRequest $request)
    {
        try {

            DB::beginTransaction();




            $user = $this->userRepositry->save($request);



            DB::commit();
            Auth::login($user);

            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            if ($user) {
                // return $this->returnData( 'user', UserResource::make($user), '');


                return response(['status' => true, 'code' => 200, 'msg' => __('User created succesfully'), 'data' => [
                    'token' => $accessToken,
                    'user' => UserResource::make(Auth::user()),
                ]]);
            }
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->returnError('Sorry! Failed in creating user');
        }
    }

    public function updateById(Request $request)
    {
        try {

            $user = User::find($request->user_id);
            if ($user) {

                if (isset($request->email)) {
                    $check = User::where('email', $request->email)
                        ->first();

                    if ($check) {

                        return $this->returnError('The email address is already used!');
                    }
                }





                $this->userRepositry->edit($request, $user);

                if ($request->password) {

                    $user->update([
                            'password' => Hash::make($request->password),
                        ]);

                }



                DB::commit();




                return $this->returnData('user', new UserResource($user), 'User updated successfully');


            }




            // unset($user->image);

            return $this->returnError('Sorry! Failed to find user');
        } catch (\Exception $e) {

            // return $e;

            return $this->returnError('Sorry! Failed in updating user');
        }
    }




    public function userProfile($id)
    {
        return $this->returnData('user', UserResource::make(User::find($id)), 'successful');
    }






    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();



        return $this->returnSuccessMessage('Done!');
    }



    public function updateDeviceToken(Request $request)
    {
        $user = Auth::user();
        $user->device_token = $request->device_token;
        $user->save();



        return $this->returnData('user', UserResource::make(User::find(Auth::user()->id)), 'successful');
    }




}
