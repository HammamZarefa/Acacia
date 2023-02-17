<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\Post;
use App\Models\Project;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        $page_title = 'Dashboard';
        $data[][]='';
        // User Info
        $widget['total_posts'] = Post::count();
        $widget['published_post'] = Post::where('status','<> ','DRAFT')->count();
        $widget['projetcs'] = Project::count();
        $widget['subscriber'] = Subscriber::count();


//        // user Browsing, Country, Operating Log
//        $user_login_data = UserLogin::whereDate('created_at', '>=', \Carbon\Carbon::now()->subDay(30))->get(['browser', 'os', 'country']);
//
//        $chart['user_browser_counter'] = $user_login_data->groupBy('browser')->map(function ($item, $key) {
//            return collect($item)->count();
//        });
//        $chart['user_os_counter'] = $user_login_data->groupBy('os')->map(function ($item, $key) {
//            return collect($item)->count();
//        });
//        $chart['user_country_counter'] = $user_login_data->groupBy('country')->map(function ($item, $key) {
//            return collect($item)->count();
//        })->sort()->reverse()->take(5);
//
//        $latestUser = User::latest()->limit(6)->get();
        $empty_message = 'Data Not Found';

        return view('admin.dashboard', compact('page_title', 'widget','empty_message'));
    }


    public function profile()
    {
        $page_title = 'Profile';
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('page_title', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $user = Auth::guard('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = uploadImage($request->image, imagePath()['profile']['admin']['path'], imagePath()['profile']['admin']['size'], $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $page_title = 'Password Setting';
        $admin = Auth::guard('admin')->user();
        return view('admin.password', compact('page_title', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::guard('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password Do not match !!'];
            return back()->withErrors(['Invalid old password.']);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->route('admin.password')->withNotify($notify);
    }

    public function notifications(){
        $notifications = AdminNotification::orderBy('id','desc')->paginate(getPaginate());
        $page_title = 'Notifications';
        return view('admin.notifications',compact('page_title','notifications'));
    }


    public function notificationRead($id){
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        return redirect($notification->click_url);
    }


}
