<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;
use App\Http\Requests\StripeRequest;
use App\Models\Stripe;
use App\Models\User;
use App\Models\StripeRefund;

class StripeController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function stripeShow()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        return view('user.stripegateway',compact('data','categories'));
    }

    public function stripeSubmit(StripeRequest $request)
    {
        
        $validated = $request->validated();
         $stripe = new \Stripe\StripeClient(
            'sk_test_51M2obIILFiwzPDQAuZdBxGP92yGLo2j4RtpFZ7vgzUKMX9VZwnFEMQbebNH7DVtes0U4YCkBZ4KnSlYpZpekNqRI00gmRGAqCM'
        );
       
        $customer = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs at https://www.stripe.com/docs/api)',
        ]);
         
        $card = $stripe->tokens->create([
            'card' => [
                'number' => $request['number'],
                'exp_month' => $request['exp_month'],
                'exp_year' => $request['exp_year'],
                'cvc' => $request['cvv'],
            ],
        ]);
       
        $customer_charge = $stripe->charges->create([
                'amount' => $request['amount']*100,
                'currency' => 'usd',
                'source' => $card->id,
                'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
        ]);

       $stripe_created = Stripe::create(['user_id'=>auth()->user()->id,
                        'customer_id'=>$customer->id,
                        'card_id' => $card->id,
                        'charge_id' => $customer_charge->id,
                        'amount' => $request['amount'],
                      ]);
        if($stripe_created)
        {
            return back()->with('success','Payment Successful');
        }
        else
        {
            return back()->with('error','Payment Not Successful');
        }
    }

    public function stripeList()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        $stripe = Stripe::with('user')->get();
        // dd($stripe);
        return view('user.stripelist',compact('stripe','data','categories')); 
    }

    public function stripeRefund(Request $request,$charge_id)
    {
        $sk = new \Stripe\StripeClient(
            'sk_test_51M2obIILFiwzPDQAuZdBxGP92yGLo2j4RtpFZ7vgzUKMX9VZwnFEMQbebNH7DVtes0U4YCkBZ4KnSlYpZpekNqRI00gmRGAqCM'
        );
        $auth = Stripe::where('charge_id',$charge_id)->first();
        // $user = User::where('id',$auth->user_id)->first();
        $refund = $sk->refunds->create([
                            'charge' => $auth->charge_id,
                            ]);
        $stripe_refund  = StripeRefund::create(['user_id'=>auth()->user()->id,
                              'charge_id'=>$refund->charge,
                              'amount' => $auth->amount,
                             ]);

        if($stripe_refund)
        {
            $auth->delete();
            return back()->with('success','Refunded Successfull');
        }else{
            return back()->with('error','Not Refunded');
        }
    }
}