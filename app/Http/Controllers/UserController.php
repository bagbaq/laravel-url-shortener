<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function register_create() {
        return view('user.register');
    }

    public function register_store() {
        $data = \request()->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'email'    => 'required|email|max:255|unique:users'
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('home')->with('notification', 'Your account has been created');
    }

    public function login_create() {
        return view('user.login');
    }

    public function login_check() {
        $data = \request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = request()->remember_me == 'on' ? true : false;

        if (!auth()->attempt($data, $remember)) {
            return back()->withErrors(['status' => 'Your provided credentials could not be verified'])->withInput();
        }

        return redirect()->route('home')->with('notification', 'You have successfully logged in');
    }

    public function login_destroy() {
        auth()->logout();

        return redirect()->route('home')->with('notification', 'You are logged out');
    }

    public function my_links_create() {
        $user = auth()->user();

        return view('user.my-links', [
            'links' => $user->links
        ]);
    }

    public function new_link_create() {
        return view('user.new-link');
    }

    public function new_link_store() {
        $data = \request()->validate([
            'main_url' => 'required|url:http,https|max:65535',
            'length' => 'required|integer|between:4,64'
        ]);

        $data['shortened_url'] = unique_str($data['length'], 'urls', 'shortened_url');
        $data['send_email'] = \request()->send_email == 'on' ? true : false;
        Arr::pull($data, 'length');

        request()->user()->links()->create($data);

        return redirect()->route('my-links')->with('notification', 'New link has been added');
    }
}
