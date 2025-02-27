<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 1], $request->remember)) {
            if (Auth::user()->status == User::STATUS_INACTIVE) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Tài khoản chưa được kích hoạt. Hãy kiểm tra lại mail.');
            }
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email hoặc Password không đúng, xin hãy thử lại.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'status' => User::STATUS_INACTIVE,
            'type' => User::TYPE_USER,
            'role_id' => null,
        ]);
        try {
            $user->sendEmailVerificationNotification();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Đăng ký tài khoản thành công. Lỗi gửi email kích hoạt.');
        }
        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công. Vui lòng kiểm tra email để kích hoạt tài khoản.');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        // Validate the email address
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Attempt to send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check the status and redirect accordingly
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Attempt to reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        // Redirect based on the result
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
    }

    public function verifyUser($id, $hash)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('register')->with('error', 'Không tìm thấy tài khoản.');
        }
        if ($user->status == User::STATUS_ACTIVE) {
            return redirect()->route('home')->with('success', 'Tài khoản đã được kích hoạt trước đó.');
        }
        if (hash_equals(sha1($user->email), $hash)) {
            $user->status = User::STATUS_ACTIVE;
            $user->save();
            Auth::loginUsingId($user->id);
            return redirect()->route('home')->with('success', 'Tài khoản đã được kích hoạt thành công.');
        }
        return redirect()->route('login')->with('error', 'Kích hoạt tài khoản không thành công.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại sai!']);
        }
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'Mật khẩu mới không được trùng với mật khẩu hiện tại!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Thay đổi mật khẩu thành công!');
    }
}
