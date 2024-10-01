<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Catergory;
use App\Models\Order;
use App\Models\paypal_payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class HomeController extends Controller
{
    //Admin Home
    public function index_adminHome()
    {
        $product = Product::all()->count();
        $user = User::where('userType', 'user')->count();
        $order = Order::all()->count();
        return view('Admin.index', ['products' => $product, 'users' => $user, 'orders' => $order]);
    }

   //Home view
   public function home()
   {
    $catergory = Catergory::all();
    $product = Product::where('catergory', 'Fashion')->get();
    $product_ = Product::where('catergory', 'jewelries')->get();
    $product_data = Product::where('catergory', 'Electronics')->get();
    if(Auth::id())
    {
        $user = Auth::user();
        $user_id = $user->id;
        $cart_count = Cart::where('user_id', $user_id)->count();
    } else {
        $cart_count = "";
    }
    return view('home.index', ['product' => $product_data, 'products' => $product, 'product_' => $product_, 'catergory' => $catergory, 'cart_count' => $cart_count]);
   }


    //When user login
    public function login_home()
    {
        if(Auth::id())
    {
        $user = Auth::user();
        $user_id = $user->id;
        $cart_count = Cart::where('user_id', $user_id)->count();
    } else {
        $cart_count = "";
    }
        $catergory = Catergory::all();
        $product = Product::where('catergory', 'Fashion')->get();
        $product_ = Product::where('catergory', 'jewelries')->get();
        $product_data = Product::where('catergory', 'Electronics')->get();
        return view('home.index', ['product' => $product_data, 'products' => $product, 'product_' => $product_, 'catergory' => $catergory, 'cart_count' => $cart_count]);
    }

   
   //Display product details
   public function view_details($id)
   {
    if(Auth::id())
    {
        $user = Auth::user();
        $user_id = $user->id;
        $cart_count = Cart::where('user_id', $user_id)->count();
    } else {
        $cart_count = "";
    }
    $catergory = Catergory::all();
    $product_details = Product::find($id);
    return view('home.product_details', ['details' => $product_details, 'catergory' => $catergory, 'cart_count' => $cart_count]);
   }
       

   //Add product to cart
   public function Add_To_Cart($id)
   {
    $product_id = $id;
    $user = Auth::user();
    $user_id = $user->id;

    $cart = new Cart();

    $cart->user_id = $user_id;
    $cart->product_id = $product_id;

     $cart->save();
     toastr()->timeout(2000)->closeButton(true)->addSuccess('Added');
            return redirect()->back();

   }


   //user view their cart
   public function mycart()
   {

      $catergory = Catergory::all();

      if(Auth::id())
      {
        $user = Auth::user();
        $user_id = $user->id;

        $cart_count = Cart::where('user_id', $user_id)->count();
        $cart_data = Cart::where('user_id', $user_id)->get();

      } else {
        $cart_count = "";
      }

      return view('home.mycart', ['catergory' => $catergory, 'cart_count' => $cart_count, 'cart_data' => $cart_data]);

   }


   //if user place order
   public function placeOrder(Request $request)
   {
    $name = $request->name;
    $rec_address = $request->rec_addres;
    $phone = $request->phone;

    $user_id = Auth::user()->id;
    $cart = Cart::where('user_id', $user_id)->get();

    foreach($cart as $carts)
    {

    $order = new Order;
    
    $order->name = $name;
    $order->rec_addres = $rec_address;
    $order->phone = $phone;
    $order->price = $request->price;
    $order->user_id = $user_id;
    $order->product_id = $carts->product_id;

    $order->save();

    toastr()->timeout(2000)->closeButton(true)->addSuccess('Your order have been successfully submitted');

    }

    $remove_cart = Cart::where('user_id', $user_id)->get();
    foreach($remove_cart as $remove)
    {
        $data = Cart::find($remove->id);
        $data->delete();
    }

    return redirect()->back();

   

   }


   //user view their orders
   public function my_order()
   {
  
       
            $user = Auth::user();
            $user_id = $user->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
            $view_order = Order::where('user_id', $user_id)->get();
      
        
        $catergory = Catergory::all();
        return view('home.myorder', ['catergory' => $catergory, 'cart_count' => $cart_count, 'order' => $view_order]);
   }


   //Payment
   public function paypal(Request $request)
   {

    $provider = new PayPalClient;
    //set the apicredentail
    $provider->setApiCredentials(config('paypal'));
    //get the access token
    $provider->getAccessToken();
    //create order with response
    $response = $provider->createOrder([
                          "intent" => "CAPTURE",

                          'application_context' => [
                                     'return_url' => route('success'),
                                     'cancel_url' => route('cancel')
                          ],
                            "purchase_units" => [
                            [
                                "amount" => [
                                "currency_code" => "USD",
                                "value" => $request->price
                                ]
                              ]
                            ]
                                
    ]);

    /*   dd($response);  */

    if(isset($response['id']) && $response['id'] != null)

    {
        foreach($response['links'] as $link)

          {
            if($link['rel'] == 'approve')
            {
                
                session()->put('product_name', $request->product_name);
                session()->put('quantity', $request->quantity);
                return redirect()->away($link['href']);

            }
          }

    } else {
        return redirect()->route('cancel');
    }

   }
  

   //success
     public function success(Request $request)
     {
        $provider = new PayPalClient;
        //set the apicredentail
        $provider->setApiCredentials(config('paypal'));
        //get the access token
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

       /*  return $response; */

       /* dd($response); */
    if(isset($response['status']) && $response['status'] == 'COMPLETED')
    {
     
        $payment = new paypal_payment();

        $payment->payment_id = $response['id'];
        $payment->product_name = session()->get('product_name');
        $payment->quantity = session()->get('quantity');
        $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
        $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
        $payment->payer_name = $response['payer']['name']['given_name'];
        $payment->payer_email = $response['payer']['email_address'];
        $payment->payment_status = $response['status'];
        $payment->payment_method = 'PayPal';


        return "Payment successfully made....";

        $payment->save();

        unset($_SESSION['product_name']);
        unset($_SESSION['quantity']);


    } else {

        return redirect()->route('cancel');

    }



     }


     //cancel
     public function cancel()
     {

         return "Fail to proceed with payment....";
        
     }



     //All products view
     public function Allproduct()
     {

        $catergory = Catergory::all();

        if(Auth::id())
        {
          $user = Auth::user();
          $user_id = $user->id;
  
          $cart_count = Cart::where('user_id', $user_id)->count();
       
        } else {
          $cart_count = "";
        }
  
        $product = Product::paginate(6);
        return view('home.allproduct', ['catergory' => $catergory, 'cart_count' => $cart_count, 'products' => $product]);

     }


     //search for products handler
     public function search_product(Request $request)
     {
        $catergory = Catergory::all();
        if(Auth::id())
        {
          $user = Auth::user();
          $user_id = $user->id;
  
          $cart_count = Cart::where('user_id', $user_id)->count();
       
        } else {
          $cart_count = "";
        }

               $search = $request->search;
               $product = Product::where('product_title', 'like', '%'.$search.'%')->orWhere('catergory', 'like', '%'. $search .'%')->paginate(2);
               return view('home.allproduct', ['products' => $product, 'cart_count' => $cart_count, 'catergory' => $catergory] );

     }


     //User delete cart product
     public function delete_cart($id)
     {
     

         $delete_cart = Cart::destroy($id);
         toastr()->timeout(2000)->closeButton(true)->addSuccess('Deleted successfully');
         return redirect()->back();
     }

     //usercontact us area handler
     public function contact_us()
     {
        $catergory = Catergory::all();
        return view('home.contact_us', ['catergory' => $catergory]);
     }

}
