<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Koncert;
use App\Models\order;
use Illuminate\Support\Facades\Mail;
use App\Mail\TickerMail;

class ItemsController extends Controller
{
    public function index(Request $request) {

        $query = Item::query();

        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->input('category') . '%' );
        }

        $items = $query->get();
        $Koncerts = Koncert::all();
        return view('Items.index', compact('items', 'Koncerts'));
    }

    public function ShowTicket(Koncert $Koncert){
        return view('Items.ShowTicket', compact('Koncert'));
    }

    public function show(item $item){
        return view('Items.item', compact('item'));
    }

    public function BuyTicket(Koncert $Koncert){
        return view('Items.BuyTicket', compact('Koncert'));
    }

    public function BuyTickeStore(Request $request,$order)
    {
        $koncert = Koncert::findOrFail($order); // тут у нас собранный есть по id концерт
        $total = $koncert->price * $request->input('quanity'); // $koncert->price туту мы указываем его
        $koncert->quantity -= $request->input('quanity');
        $koncert->save();
        if($koncert->quantity <= $request->input('quanity')){
            return redirect()->back()->with('error', 'Билетов столько нет сколько вы хотите купить');
        }
        $order = order::create([
            'user_id' => auth()->user()->id,
            'koncert_id' => $koncert->id,
            'price' => $total,
            'email' => $request->input('email'),
            'quanity' => $request->input('quanity'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ]);

        Mail::to($order['email'])->send(new TickerMail($order));
        return redirect()->route('index');
    }

    public function StoreyShop()
    {
        $orders = order::where('user_id',auth()->user()->id)->get();
        return view('Items.StoreyShop', compact('orders'));
    }

}
