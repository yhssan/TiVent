<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Event;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserController extends Controller
{
   
    public function welcome() {
        $data = Event::with('category')->where('status', 'active')->get();
        // dd($data);
        return view('welcome', compact('data'));
        
    }

    public function detail(Event $Event) {
        return view('detailevent',compact('Event'));
        // if (auth()->check()) {
        //     return view('detailevent',compact('Event'));
        // } else {
        //      return redirect()->route('login')->with('error', 'Login terlebih dahulu');
        // }
        
    }
    public function order(Request $request)  {

        $detailorder = DetailOrder::with('Event')
        ->wherenull('bukti_pembayaran')
        ->where('user_id', auth()->id())
        ->where('status_pembayaran', 'pending')
        ->latest()->get();

        return view('transaksi.order', compact('detailorder'));
        
    }
   
    public function postorder(Request $request, Event $Event)  {
        if (auth()->check()) {
            $request->validate([
                'banyak' => 'required|numeric|min:1'
            ]);
            
            $existingPendingOrder = DetailOrder::where('event_id', $Event->id)
                ->where('status_pembayaran', 'pending')
                ->wherenull('bukti_pembayaran')
                ->first();
    
            if ($existingPendingOrder) {
                $newQty = $existingPendingOrder->qty + $request->banyak;
    
                if ($newQty > $Event->stok) {
                    return redirect()->back()->with('notif', 'Maaf, stock tiket tidak mencukupi. ');
                }
    
                $existingPendingOrder->update([
                    'qty' => $newQty,
                    'pricetotal'=> $existingPendingOrder->pricetotal + ($Event->harga * $request->banyak),
                ]);
    
            } else {
                $existingPendingOrder = DetailOrder::where('event_id', $Event->id)
                    ->where('bukti_pembayaran', ['completed','rejected'])
                    ->first();
    
                if ($existingPendingOrder) {
                    DetailOrder::create([
                        'qty' => $request->banyak,
                        'user_id' => Auth::id(),
                        'event_id' => $Event->id,
                        'status_pembayaran' => 'pending',
                        'pricetotal' => $Event->harga * $request->banyak,
                    ]);
                } else {
                    DetailOrder::create([
                        'qty' => $request->banyak,
                        'user_id' => Auth::id(),
                        'event_id' => $Event->id,
                        'status_pembayaran' => 'pending',
                        'pricetotal' => $Event->harga * $request->banyak,
                    ]);
                }
    
                
            }
            return redirect()->route('order')->with('notif', 'Mohon selesaikan pembayaran');
        } else {
             return redirect()->route('login')->with('error', 'Login terlebih dahulu');
        }  
    }

    public function history()  {

        $orderHistory = DetailOrder::with('Event')
            ->where('user_id', auth()->id())
            ->whereIn('status_pembayaran', ['completed', 'rejected', 'pending'])
            ->whereNotNull('bukti_pembayaran')
            ->get();

        return view('user.history', compact('orderHistory'));
        
    }

    public function bayar(Request $request,DetailOrder $detailOrder) {
        $Event = $detailOrder->event;
        return view ('transaksi.bayar', compact('detailOrder','Event'));
        
    }
    
    public function postbayar(Request $request,DetailOrder $detailOrder) {
        $request->validate([
            'bukti_pembayaran' =>'required'
        ]);
        
        $order = Order::create([
            'user_id' => auth()->id(),
            'pricetotal' => $detailOrder->pricetotal,
            'code' => 'INV' . Str::random(8)
        ]);

        $detailOrder->update([
            'order_id' => $order->id,
            'bukti_pembayaran' => $request->bukti_pembayaran->store('img')
        ]);

        $event = $detailOrder->event;
        $event->save();

        return redirect()->route('history')->with('notif', 'Berhasil membayar');
    }

    public function batalkanpesanan(DetailOrder $detailOrder) {
        $detailOrder->delete();
        return redirect()->route('order')->with('notif', 'Pesanan berhasil dibatalkan');

        
    }
    public function printInvoiceTicket($id) {
        $detailOrder = DetailOrder::with(['order', 'event', 'user'])->find($id);
        if (!$detailOrder) {
            abort(404);
        }
        
        $data = [
            'detailOrder' =>$detailOrder,
        ];

        $pdf = PDF::loadView('transaksi.invoice-ticket', $data);

        return $pdf->download($detailOrder->order->code . '.pdf');
    }
}
