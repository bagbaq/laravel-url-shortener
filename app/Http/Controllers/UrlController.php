<?php

namespace App\Http\Controllers;

use App\Mail\LinkVisitMail;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UrlController extends Controller
{
    /*
     * Check the short url if it really exists
     *
     * @param $short_link - shortened_url of link
     */
    public function check($short_link = null) {
        if ($short_link != null) {
            $check = Url::where('shortened_url', $short_link)->first();

            if ($check != null) {
                return UrlController::visit($check);
            }
        }

        return abort(404);
    }

    /*
     * Redirect user to desired page and increase value of 'visit' column
     *
     * @param $link - URL object to be visited
     *
     * @return RedirectResponse
     */
    public static function visit($link) : RedirectResponse {
        Url::where('id', $link->id)->increment('visits');

        if ($link->send_email) {
            $user = User::where('id', $link->user_id)->first();

            Mail::to($user->email)->send(new LinkVisitMail([
                'name'       => $user->username,
                'short_link' => $link->shortened_url
            ]));
        }

        return redirect()->away($link->main_url);
    }

    /*
     * Destroy the shortlink from database
     *
     * @param $url - The Url object to be deleted
     *
     * @return RedirectResponse
     */
    public function destroy(Url $url) : RedirectResponse {
        if (auth()->user()->id != $url->user->id) {
            return redirect()->route('home');
        }

        $url->delete();

        return redirect()->back()->with('notification', 'URL successfully deleted');
    }
}
