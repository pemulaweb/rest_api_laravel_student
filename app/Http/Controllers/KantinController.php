<?php

namespace App\Http\Controllers;

use App\Mail\UtangMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Kantin;
use App\Models\Food;
use App\Models\Drink;
use Illuminate\Support\Facades\DB;

class KantinController extends Controller
{
    public function addKantin(Request $request)
    {
        $data = new Kantin;
        $data->name = $request->name;
        $data->food_id = $request->food_id;
        $data->drink_id = $request->drink_id;
        $data->utang_id = $request->utang_id;

        $data->save();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }
    public function FoodKantin(Request $request)
    {
        $data = new Food;
        $data->name = $request->name;
        $data->harga = $request->harga;
        $data->save();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function getKantin()
    {
        $data = Kantin::all();
        return response()->json(['message' => 'this out menu is available', 'menu' => $data, 'and this our food' => $data->Food->foods, 'drink' => $data->Drink->drinks]);
    }
    public function getfood()
    {
        $data = Food::all();
        return response()->json(['message' => 'this our food is available', 'food' => $data,]);
    }
    public function addToCartFood($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return response()->json(['message' => 'sorry food unvaliable']);
        }
        $cart = session()->get('cart');
        //if cart kosong ini keluar
        if (!$cart) {
            $cart = [
                $id =>
                [
                    "name" => $food->name,
                    "quantity" => 1,
                    "harga" => $food->harga
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['message' => 'success add to cart', 'cart' => $cart]);
        }
        //if cart exits
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(['message' => 'success add to cart', 'cart' => $cart]);
        }
        //if cart not exist
        $cart['id'] = [
            "name" => $food->name,
            "quantity" => 1,
            "harga" => $food->harga
        ];
        session()->put('cart', $cart);
        return response()->json(['message' => 'success add to cart', 'cart' => $cart]);
    }
    public function kantinJoin()
    {
        $data = DB::table('kantins')
            ->join('food', 'food.id', '=', 'kantins.food_id')
            // ->join('drinks', 'drinks.id', '=', 'kantins.drink_id')
            ->select('kantins.food.name', 'food')
            ->get();
        return response()->json(['message' => 'join success ', 'data' => $data]);
    }
}