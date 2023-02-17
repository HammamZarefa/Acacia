<?php
namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ManageUsersController extends Controller
{
    public function allUsers()
    {
        $page_title = 'Manage Users';
        $empty_message = 'No user found';
        $users = User::latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }

    public function activeUsers()
    {
        $page_title = 'Manage Active Users';
        $empty_message = 'No active user found';
        $users = User::active()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }

    public function bannedUsers()
    {
        $page_title = 'Banned Users';
        $empty_message = 'No banned user found';
        $users = User::banned()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }

    public function emailUnverifiedUsers()
    {
        $page_title = 'Email Unverified Users';
        $empty_message = 'No email unverified user found';
        $users = User::emailUnverified()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }
    public function emailVerifiedUsers()
    {
        $page_title = 'Email Verified Users';
        $empty_message = 'No email verified user found';
        $users = User::emailVerified()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }


    public function smsUnverifiedUsers()
    {
        $page_title = 'SMS Unverified Users';
        $empty_message = 'No sms unverified user found';
        $users = User::smsUnverified()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }
    public function smsVerifiedUsers()
    {
        $page_title = 'SMS Verified Users';
        $empty_message = 'No sms verified user found';
        $users = User::smsVerified()->latest()->paginate(getPaginate());
        return view('admin.users.list', compact('page_title', 'empty_message', 'users'));
    }



    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $users = User::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('mobile', 'like', "%$search%")
                ->orWhere('firstname', 'like', "%$search%")
                ->orWhere('lastname', 'like', "%$search%");
        });
        $page_title = '';
        switch ($scope) {
            case 'active':
                $page_title .= 'Active ';
                $users = $users->where('status', 1);
                break;
            case 'banned':
                $page_title .= 'Banned';
                $users = $users->where('status', 0);
                break;
            case 'emailUnverified':
                $page_title .= 'Email Unerified ';
                $users = $users->where('ev', 0);
                break;
            case 'smsUnverified':
                $page_title .= 'SMS Unverified ';
                $users = $users->where('sv', 0);
                break;
        }
        $users = $users->paginate(getPaginate());
        $page_title .= 'User Search - ' . $search;
        $empty_message = 'No search result found';
        return view('admin.users.list', compact('page_title', 'search', 'scope', 'empty_message', 'users'));
    }


    public function detail($id)
    {
        $page_title = 'User Detail';
        $user = User::findOrFail($id);

//        $totalDeposit = Deposit::where('user_id',$user->id)->where('status',1)->sum('amount');
//        $totalTransaction = Transaction::where('user_id',$user->id)->count();
//        $total_spent = Order::where('status', '!=', 4)->sum('price');
//
//        $widget['total_order'] = Order::where('user_id', $user->id)->count();
//        $widget['pending_order'] = Order::where('user_id', $user->id)->pending()->count();
//        $widget['processing_order'] = Order::where('user_id', $user->id)->processing()->count();
//        $widget['completed_order'] = Order::where('user_id', $user->id)->completed()->count();
//        $widget['cancelled_order'] = Order::where('user_id', $user->id)->cancelled()->count();
//        $widget['refunded_order'] = Order::where('user_id', $user->id)->refunded()->count();

        return view('admin.users.detail', compact('page_title', 'user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'email' => 'required|email|max:160|unique:users,email,' . $user->id,
        ]);

        if ($request->email != $user->email && User::whereEmail($request->email)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Email already exists.'];
            return back()->withNotify($notify);
        }
        if ($request->mobile != $user->mobile && User::where('mobile', $request->mobile)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Phone number already exists.'];
            return back()->withNotify($notify);
        }

        $user->mobile = $request->mobile;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->address = [
                            'address' => $request->address,
                            'city' => $request->city,
                            'state' => $request->state,
                            'zip' => $request->zip,
                            'country' => $request->country,
                        ];
        $user->status = $request->status ? 1 : 0;
        $user->ev = $request->ev ? 1 : 0;
        $user->sv = $request->sv ? 1 : 0;
        $user->ts = $request->ts ? 1 : 0;
        $user->tv = $request->tv ? 1 : 0;
        $user->save();

        $notify[] = ['success', 'User detail has been updated'];
        return redirect()->back()->withNotify($notify);
    }

    public function addSubBalance(Request $request, $id)
    {
        $request->validate(['amount' => 'required|numeric|gt:0']);

        $user = User::findOrFail($id);
        $amount = getAmount($request->amount);
        $general = GeneralSetting::first(['cur_text','cur_sym']);
        $trx = getTrx();

        if ($request->act) {
            $user->balance += $amount;
            $user->save();
            $notify[] = ['success', $general->cur_sym . $amount . ' has been added to ' . $user->username . ' balance'];


            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($user->balance);
            $transaction->charge = 0;
            $transaction->trx_type = '+';
            $transaction->details = 'Added Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($user, 'BAL_ADD', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($user->balance),
            ]);

        } else {
            if ($amount > $user->balance) {
                $notify[] = ['error', $user->username . ' has insufficient balance.'];
                return back()->withNotify($notify);
            }
            $user->balance -= $amount;
            $user->save();



            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($user->balance);
            $transaction->charge = 0;
            $transaction->trx_type = '-';
            $transaction->details = 'Subtract Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($user, 'BAL_SUB', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($user->balance)
            ]);
            $notify[] = ['success', $general->cur_sym . $amount . ' has been subtracted from ' . $user->username . ' balance'];
        }
        return back()->withNotify($notify);
    }


    public function userLoginHistory($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'User Login History - ' . $user->username;
        $empty_message = 'No users login found.';
        $login_logs = $user->login_logs()->latest()->paginate(getPaginate());
        return view('admin.users.logins', compact('page_title', 'empty_message', 'login_logs'));
    }



    public function showEmailSingleForm($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'Send Email To: ' . $user->username;
        return view('admin.users.email_single', compact('page_title', 'user'));
    }

    public function sendEmailSingle(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = User::findOrFail($id);
        sendGeneralEmail($user->email, $request->subject, $request->message, $user->username);
        $notify[] = ['success', $user->username . ' will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function transactions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Transactions : ' . $user->username;
            $transactions = $user->transactions()->where('trx', $search)->with('user')->latest()->paginate(getPaginate());
            $empty_message = 'No transactions';
            return view('admin.reports.transactions', compact('page_title', 'search', 'user', 'transactions', 'empty_message'));
        }
        $page_title = 'User Transactions : ' . $user->username;
        $transactions = $user->transactions()->with('user')->latest()->paginate(getPaginate());
        $empty_message = 'No transactions';
        return view('admin.reports.transactions', compact('page_title', 'user', 'transactions', 'empty_message'));
    }

    public function deposits(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userId = $user->id;
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Deposits : ' . $user->username;
            $deposits = $user->deposits()->where('trx', $search)->latest()->paginate(getPaginate());
            $empty_message = 'No deposits';
            return view('admin.deposit.log', compact('page_title', 'search', 'user', 'deposits', 'empty_message','userId'));
        }

        $page_title = 'User Deposit : ' . $user->username;
        $deposits = $user->deposits()->latest()->paginate(getPaginate());
        $empty_message = 'No deposits';
        $scope = 'all';
        return view('admin.deposit.log', compact('page_title', 'user', 'deposits', 'empty_message','userId','scope'));
    }


    public function depViaMethod($method,$type = null,$userId){
        $method = Gateway::where('alias',$method)->firstOrFail();
        $user = User::findOrFail($userId);
        if ($type == 'approved') {
            $page_title = 'Approved Payment Via '.$method->name;
            $deposits = Deposit::where('method_code','>=',1000)->where('user_id',$user->id)->where('method_code',$method->code)->where('status', 1)->latest()->with(['user', 'gateway'])->paginate(getPaginate());
        }elseif($type == 'rejected'){
            $page_title = 'Rejected Payment Via '.$method->name;
            $deposits = Deposit::where('method_code','>=',1000)->where('user_id',$user->id)->where('method_code',$method->code)->where('status', 3)->latest()->with(['user', 'gateway'])->paginate(getPaginate());
        }elseif($type == 'successful'){
            $page_title = 'Successful Payment Via '.$method->name;
            $deposits = Deposit::where('status', 1)->where('user_id',$user->id)->where('method_code',$method->code)->latest()->with(['user', 'gateway'])->paginate(getPaginate());
        }elseif($type == 'pending'){
            $page_title = 'Pending Payment Via '.$method->name;
            $deposits = Deposit::where('method_code','>=',1000)->where('user_id',$user->id)->where('method_code',$method->code)->where('status', 2)->latest()->with(['user', 'gateway'])->paginate(getPaginate());
        }else{
            $page_title = 'Payment Via '.$method->name;
            $deposits = Deposit::where('status','!=',0)->where('user_id',$user->id)->where('method_code',$method->code)->latest()->with(['user', 'gateway'])->paginate(getPaginate());
        }
        $page_title = 'Deposit History: '.$user->username.' Via '.$method->name;
        $methodAlias = $method->alias;
        $empty_message = 'Deposit Log';
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits','methodAlias','userId'));
    }


    public function showEmailAllForm()
    {
        $page_title = 'Send Email To All Users';
        return view('admin.users.email_all', compact('page_title'));
    }

    public function sendEmailAll(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (User::where('status', 1)->cursor() as $user) {
            sendGeneralEmail($user->email, $request->subject, $request->message, $user->username);
        }

        $notify[] = ['success', 'All users will receive an email shortly.'];
        return back()->withNotify($notify);
    }
}
