<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
 use  AuthenticatesUsers;

protected $maxAttmpts=2;

protected $decayMinutes=5;


    public function showLogin()
    {
        return view('auth.login');
    }
    public function doLogin(Request $request)
    {
        $email    = $request->username;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        if ($user) {

            if (\Auth::attempt(['email' => $email, 'password' => $password, 'id_role'=>1 ])) {
                return redirect()->to('jurusan');
            } elseif(\Auth::attempt(['email' => $email, 'password' => $password, 'id_role'=>2 ])) {
               
                 return redirect()->to('grupkelas');
            }else{

                 \Session::flash('class', 'alert-danger');
                \Session::flash('message', 'Username dan password salah');
            }
        } else {
            \Session::flash('class', 'alert-danger');
            \Session::flash('message', 'Username dan password salah!');
        }
        return redirect()->to('/');
    }

    public function doLogout()
    {
        \Auth::logout();

        return redirect()->to('/');
    }

    public function dashboard()
    {
        $events   = $this->convertToArray(Event::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
        $meetings = $this->convertToArray(Meeting::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());

        return view('hrms.dashboard', compact('events', 'meetings'));
    }

    public function welcome()
    {
        return view('hrms.auth.welcome');
    }

    public function notFound()
    {
        return view('hrms.auth.not_found');
    }

    public function profil()
    {
        return view('profil.profil');
    }

    public function doRegister(Request $request)
    {
        return view('hrms.auth.register');
    }

    public function calendar()
    {
        return view('hrms.auth.calendar');
    }

    public function changePassword()
    {
        return view('hrms.auth.change');
    }

    public function ubah()
    {
        return view('auth.ubah-password');
    }

    public function Change(Request $request)
{
  $password = $request->lama;
  $user     = User::where('id', \Auth::user()->id)->first();
  if (Hash::check($password, $user->password)) {
    $user->password = bcrypt($request->baru);
    $user->save();
    \Auth::logout();
  return redirect()->to('/')->with('message', 'Password berhasil diubah! LOGIN kembali dangan password baru.');
  } else {
    \Alert::error('Gagal Ganti Password',' ganti password tidak berhasil');

    return redirect()->back();
  }
}
    public function resetPassword()
    {
        return view('hrms.auth.reset');
    }

    public function processPasswordReset(Request $request)
    {
        $email = $request->email;
        $user  = User::where('email', $email)->first();

        if ($user) {
            $string = strtolower(str_random(6));


            $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                $message->from('no-reply@dipi-ip.com', 'Digital IP Insights');
                $message->to($user->email, $user->name)->subject('Your new password');
            });

            \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

            return redirect()->to('/')->with('message', 'Login with your new password received on your email');
        } else {
            return redirect()->to('/')->with('message', 'Your email is not registered');
        }

    }

    public function convertToArray($values)
    {
        $result = [];
        foreach ($values as $key => $value) {
            $result[$key] = $value;
        }

        return $result;
    }
}
