<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

/**
 *
 */
class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        try {
            $product = Product::findOrFail($request->get('product'));
//            dd($request->user(),$request->paymentMethod);

            //Because it's reqiured for successful payments in India https://stripe.com/docs/india-accept-international-payments

            $userInformation = [
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'address' => [
                    'line1' => '510 Townsend St',
                    'postal_code' => '31341',
                    'city' => 'Ahmedabad',
                    'state' => 'Gujarat',
                    'country' => 'India',
                ],
            ];
            $request->user()
                ->newSubscription($product->slug, $product->stripe_price)
                ->quantity(1)
                ->trialDays(14)
                ->create($request->paymentMethod, $userInformation);
            return redirect()->route('home')->with('success', 'Your product subscribed successfully');
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('home')]
            );
        }


    }
}
