<?php 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class StripeController extends Controller
{
    public function checkout()
    {
        return view('stripe.checkout');
    }
 
    public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $totalPrice = $request->get('orderTotal');

    $orderTotalInCents = intval($totalPrice * 100);

    $cartItems = $request->session()->get('cart');

    if (!empty($cartItems)) {
        // Loop through each cart item
        foreach ($cartItems as $cartItem) {
            // Get the product associated with the cart item
            $product = $cartItem['product'];

            // Decrement the stock of the product by the quantity in the cart
            $product->stock -= $cartItem['quantity'];

            // Save the updated product
            $product->save();
        }

        // Clear the cart after successful payment
        $request->session()->forget('cart');
    }

    // Create a new Stripe Checkout Session
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'USD',
                    'unit_amount'  => $orderTotalInCents,
                    'product_data' => [
                        'name' => 'Order Total',
                    ],
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
        'cancel_url'  => route('checkout'),
    ]);

    // Redirect to the Stripe Checkout page
    return redirect()->away($session->url);
}

public function success(Request $request)
{
    // Clear the cart after successful payment
    $request->session()->forget('cart');

    // Redirect to the welcome page
    return redirect()->route('welcome');
}

    

    

}