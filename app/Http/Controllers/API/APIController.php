<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class APIController extends Controller
{
    public function get_token(Request $request) {
        $credentials = request()->only(['username', 'password']);

        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function link_store(Request $request) {
        $data = request()->validate([
            'main_url' => 'required|url:http,https|max:65535',
            'length' => 'required|integer|between:4,64',
            'send_email' => 'required|boolean'
        ], [
            'send_email.boolean' => 'The send_email field must be 1 (true) or 0 (false).'
        ]);

        $data['shortened_url'] = unique_str($data['length'], 'urls', 'shortened_url');
        Arr::pull($data, 'length');

        $created = request()->user()->links()->create($data);

        return response()->json(['message' => 'success', 'link' => $created]);
    }

    public function link_read(Request $request, $id) {
        return Url::where('id', $id)->where('user_id', $request->user()->id)->first() ?? ['message' => 'Link id not found'];
    }

    public function link_read_all(Request $request) {
        return $request->user()->links;
    }

    public function link_update(Request $request, $id) {
        $ownership = Url::where('id', $id)->where('user_id', $request->user()->id)->count();

        if (!$ownership) return ['message' => 'Link is not owned or id not found'];

        $data = request()->validate([
            'main_url' => 'required_without:send_email|url:http,https|max:65535',
            'send_email' => 'required_without:main_url|boolean'
        ], [
            'send_email.boolean' => 'The send_email field must be 1 (true) or 0 (false).'
        ]);

        return Url::whereId($id)->update($data) == true ? ['message' => 'success'] : ['message' => 'Link couldn\'t updated'];
    }

    public function link_destroy(Request $request, $id) {
        $ownership = Url::where('id', $id)->where('user_id', $request->user()->id)->count();

        if (!$ownership) return ['message' => 'Link is not owned or id not found'];

        return Url::destroy($id) == true ? ['message' => 'success'] : ['message' => 'Link id not found'];
    }

}
