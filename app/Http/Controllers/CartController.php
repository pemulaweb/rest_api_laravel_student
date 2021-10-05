<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Food;
use App\Models\Keranjang;
class CartController extends Controller
{
    public function store(Request $request){
      $data = Food::findOrFail($request->input('food_id'));
      Cart::add(
        $data->id,
        $data->name,
        $request->input('quantity'),
        $data->harga / 100,
      );
      $cart = Cart::content();
      $acc = Keranjang::create($cart);
      // $row = $cart->rowId;
      return response()->json(['message' => 'success add cart', 'cart' => $cart, ]);
    }

    // version add cart into database 
  function addToCart(Request $request)
  {
   $food = Food::findOrFail($request->input('food_id'));
   $itung = $request->input('quantity');
   $take = $food->harga / 100;
   $hasil = $take * $itung;
    
   return response()->json(['message' => 'success', 'food' => $hasil]);
  }
 
  function removeCart($id)
  {
    Cart::destroy($id);
    return redirect('cartlist');
  }
  // function orderNow()
  // {
  //   $userId = Session::get('user')['id'];
  //   $total = $products = DB::table('cart')
  //   ->join('products', 'cart.product_id', '=', 'products.id')
  //   ->where('cart.user_id', $userId)
  //     ->sum('products.price');

  //   return view('ordernow', ['total' => $total]);
  // }
  // function orderPlace(Request $req)
  // {
  //   $userId = Session::get('user')['id'];
  //   $allCart = Cart::where('user_id', $userId)->get();
  //   foreach ($allCart as $cart) {
  //     $order = new Order;
  //     $order->product_id = $cart['product_id'];
  //     $order->user_id = $cart['user_id'];
  //     $order->status = "pending";
  //     $order->payment_method = $req->payment;
  //     $order->payment_status = "pending";
  //     $order->address = $req->address;
  //     $order->save();
  //     Cart::where('user_id', $userId)->delete();
  //   }
  //   $req->input();
  //   return redirect('/');
  // }
  // function myOrders()
  // {
  //   $userId = Session::get('user')['id'];
  //   $orders = DB::table('orders')
  //   ->join('products', 'orders.product_id', '=', 'products.id')
  //   ->where('orders.user_id', $userId)
  //     ->get();

  //   return view('myorders', ['orders' => $orders]);
  // }


    
}