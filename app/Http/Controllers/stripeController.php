<?php

namespace App\Http\Controllers;

use App\Models\enrollmentModel;
use Illuminate\Http\Request;
use Session;
use Stripe;

class stripeController extends Controller
{
    //

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Stripe\Charge::create([
            "amount" => $request->course_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Edukate payment from Maaz"
        ]);
        if ($charge->status === 'succeeded') {
            // Get the user ID and course ID from the request or session
            $userId = $request->user_id;
            $courseId = $request->course_id;
            // Update the enrollment status to true
            $enrollment = enrollmentModel::where('user_id', $userId)->where('course_id', $courseId)->first();
            if ($enrollment) {
                $enrollment->status == true;
                $enrollment->update();
            }

            Session::flash('success', 'Payment successful!');

            return redirect()->route('order');
        }
    }
}
