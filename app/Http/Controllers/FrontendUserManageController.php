<?php

namespace App\Http\Controllers;

use App\EventAttendance;
use App\Helpers\NexelitHelpers;
use App\Mail\BasicMail;
use App\ProductOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontendUserManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all_user()
    {
        $all_user = User::all();
        return view('backend.frontend-user.all-user')->with(['all_user' => $all_user]);
    }

    public function user_password_change(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ],
        [
            'password.required' => __('password is required'),
            'password.confirmed' => __('password does not matched'),
            'password.min' => __('password minimum length is 8'),
        ]);
        $user = User::findOrFail($request->ch_user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with(['msg' => __('Password Change Success..'), 'type' => 'success']);
    }

    public function user_update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'address' => 'nullable|string|max:191',
            'zipcode' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'phone' => 'nullable|string|max:191',
        ],[
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
        ]);

        User::find($request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with(['msg' => __('User Profile Update Success..'), 'type' => 'success']);
    }

    public function new_user_delete(Request $request, $id)
    {
        User::find($id)->delete();
        EventAttendance::where('user_id', $id)->delete();
        ProductOrder::where('user_id', $id)->delete();
        return redirect()->back()->with(['msg' => __('User Profile Deleted..'), 'type' => 'danger']);
    }

    public function new_user()
    {
        return view('backend.frontend-user.add-new-user');
    }

    public function new_user_add(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:191|unique:users',
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'address' => 'nullable|string|max:191',
            'zipcode' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'phone' => 'nullable|string|max:191',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email_verify_token' => \Str::random(8)
        ]);

        $verifyToken = $user->id ? User::where('id', $user->id)->select('email_verify_token')->first()?->email_verify_token : '';

        try {
            Mail::to($request->email)
                ->send(new BasicMail([
                    'subject' => __('Your user account has been created for').' '.get_static_option('site_'.get_default_language().'_title'),
                    'message' => '<h3>'. __('Your account credentials:') .'</h3> <br/><br/> <b>Username:</b> '.$request->username. '<br/><b>Password:</b> '.$request->password.'<br/><b>Verify code:</b> '.$verifyToken.'<br/><br/>'.__('Note: please, checkout your dashboard and change your password.'),
                ]));

        } catch (\Exception $e){
            return redirect()->back()->with(NexelitHelpers::item_delete($e->getMessage()));
        }
        return redirect()->back()->with(['msg' => __('New User Created..'), 'type' => 'success']);
    }

    public function bulk_action(Request $request){
        User::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function email_status(Request $request){
        User::where('id',$request->user_id)->update([
           'email_verified' => $request->email_verified
        ]);
        return redirect()->back()->with(['msg' => __('Email Verify Status Changed..'), 'type' => 'success']);
    }
}
