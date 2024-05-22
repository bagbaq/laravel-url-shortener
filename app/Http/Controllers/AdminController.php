<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function home_create() {
        return view('admin.home', [
            'user_count' => User::all()->count(),
            'link_count' => Url::all()->count()
        ]);
    }

    public function users_create() {
        return view('admin.users.index', [
            'users'      => User::orderBy('created_at', 'desc')->paginate(13)
        ]);
    }

    public function user_edit_create($id) {
        $user = User::where('id', $id)->first();

        if ($user == null) {
            return redirect()->route('admin-users')->with('notification', 'User cannot be found');
        }

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function user_edit_update($id) {
        $data = request()->validate([
           'username' => [
               'required',
               'min:3',
               'max:255',
               Rule::unique('users')->ignore($id, 'id')
           ],
           'email'    => [
               'required',
               'email',
               'max:255',
               Rule::unique('users')->ignore($id, 'id')
           ]
        ]);

        $data['admin'] = request()->admin == true ? 1 : 0;

        User::find($id)->update($data);

        return redirect()->back()->with('notification', 'User has been updated!');
    }

    public function user_destroy($id) {
        User::destroy($id);

        return redirect()->back()->with('notification', 'User has been deleted!');
    }

    public function links_create() {
        return view('admin.links.index', [
            'links'      => Url::orderBy('created_at', 'desc')->paginate(13)
        ]);
    }

    public function link_edit_create($id) {
        $link = Url::where('id', $id)->first();

        if ($link == null) {
            return redirect()->route('admin-links')->with('notification', 'User cannot be found');
        }

        return view('admin.links.edit', [
            'link' => $link
        ]);
    }

    public function link_edit_update($id) {
        $data = request()->validate([
           'shortened_url' => ['required', 'min:3', 'max:64', Rule::unique('urls', 'shortened_url')->ignore($id)],
           'main_url'      => 'required|url:http,https|max:65535',
        ]);

        $data['send_email'] = request()->send_email == 'on' ? true : false;

        Url::where('id', $id)->update($data);

        return redirect()->back()->with('notification', 'Link has updated');
    }

    public function link_destroy($id) {
        Url::destroy($id);

        return redirect()->route('admin-links')->with('notification', 'Link has been deleted!');
    }
}
