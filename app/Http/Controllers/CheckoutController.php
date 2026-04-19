<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);

        return view('checkout.show', compact('product'));
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active, 404);

        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_email' => ['required', 'email', 'max:100'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $order = DB::transaction(function () use ($data, $product) {
            $order = Order::create([
                ...$data,
                'order_number' => 'NG-'.now()->format('YmdHis').'-'.random_int(1000, 9999),
                'total_amount' => $product->price,
                'status' => 'awaiting_payment',
                'payment_status' => 'pending',
            ]);

            $order->items()->create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'unit_price' => $product->price,
                'quantity' => 1,
            ]);

            return $order;
        });

        return redirect()->route('checkout.result', $order)->with('success', 'سفارش شما ثبت شد. در این نسخه پرداخت به صورت شبیه‌سازی شده تایید شده است.');
    }

    public function result(Order $order)
    {
        if ($order->payment_status === 'pending') {
            $order->update([
                'payment_status' => 'paid',
                'status' => 'paid',
                'paid_at' => now(),
                'payment_reference' => 'SIM-'.random_int(100000, 999999),
            ]);
        }

        return view('checkout.result', ['order' => $order->load('items')]);
    }
}
