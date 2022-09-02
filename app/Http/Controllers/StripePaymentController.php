<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\StatusNotification;

use Notification;
use Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

class StripePaymentController extends Controller
{
    // public function stripe()
    // {
    //     $cart = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
        
    //     $data = [];
    //     // return $cart;
    //     $data['items'] = array_map(function ($item) use($cart) {
    //         $name=Product::where('id',$item['product_id'])->pluck('title');
    //         return [
    //             'name' =>$name ,
    //             'price' => $item['price'],
    //             'desc'  => 'Thank you for using stripe',
    //             'qty' => $item['quantity']
    //         ];
    //     }, $cart);
    //     $total = 0;
    //     foreach($data['items'] as $item) {
    //         $total += $item['price']*$item['qty'];
    //     }
    //     Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);
    //     $order_id = session()->get('id');
    //     return view('user.stripe')->with(compact('total','order_id'));
    // }

    public function stripePost(Request $request)
    {
        function calculateRealNumber($amount) {
            return intval(($amount)*100);
        }
        
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        $charge = Stripe\Charge::create([
            'amount' => calculateRealNumber($request->input('total_amount')),
            'currency'=>"usd",
            'source'=> $request->stripeToken,
            'description' =>'Thank you for using Stripe',
        ]);
        if($charge)
        {
            $order = new Order();
            $order_data = $request->all();
            $order->fill($order_data);
            $status = $order->save();
            if ($order){
                // dd($order->id);
                $users = User::where('role', 'admin')->first();
                Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);
                $details = [
                    'title' => 'New order created',
                    'actionURL' => route('order.show', $order->id),
                    'fas' => 'fa-file-alt'
                ];
                Notification::send($users, new StatusNotification($details));
            }
            request()->session()->flash('success','Your product successfully placed in order');
            return redirect()->route('home');
                
        }else{
            request()->session()->flash('Error','ORDER FAILED');
            return redirect()->route('home');
        }
    }
}
