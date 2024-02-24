<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Event;
use App\Models\Log;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function events() {
        $Event = Event::all();
        return view('admin.admin', compact('Event'));
    }

    public function updateEventStatus(Event $event,Request $request){

        $request->validate([
            'status'=>'required|in:active,inactive',
        ]);

        $event->update([
            'status' => $request->status,
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'activity' => Auth::user()->role . ' ' . Auth::user()->name . ' ' . 'Merubah status event menjadi' . ' ' .$event->status,
        ]);

        return redirect()->route('admin');

        
    }

    public function tambah() {
        $data = Category::all();
        return view('admin.tambah', compact('data'));
        
    }
    public function posttambah(Request $request, Event $event) {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'map' => 'required',
            'foto' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'stok' => 'required',
            'category_id' => 'required',
        ]);
        
        Event::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'map' => $request->map,
            'foto' => $request->foto->store('img'),
            'status' => 'active',
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'activity' => Auth::user()->role . ' ' . Auth::user()->name . ' Menambah Event ' . $event->nama,
        ]);

        return redirect()->route('admin')->with('berhasil', 'Berhasil menambahkan event');
        
    }

    public function edit(Event $event) {
        $category = Category::all();
        return view('admin.edit', compact('event', 'category'));
        
    }

    public function postedit(Request $request , Event $event) {
        $data = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'map' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'stok' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img');
        } else {
            unset($data['foto']);
        }

        Log::create([
            'user_id' => auth()->id(),
            'activity' => Auth::user()->role . ' ' . Auth::user()->name . ' ' . ' Mengedit Event ' . $event->nama,
        ]);

        $event->update($data);
        return redirect()->route('admin')->with('berhasil', 'Data behasil diedit');

        
    }

    public function hapus(Event $event) {
        $event->delete();

        Log::create([
            'user_id' => auth()->id(),
            'activity' => Auth::user()->role .' '. Auth::user()->nama . ' Menghapus event ' . $event->nama,
        ]);

        return redirect()->route('admin')->with('hapus', 'Data Telah dihapus');
    }

    public function log() {
        $log = Log::all();
        return view('owner.log', compact('log'));
    }

    public function pendingOrders() {
        $pendingOrders = Order::with('detailOrder')->whereHas('detailOrder', function($query) {
            $query->where('status_pembayaran', 'pending');
        })->get();

        return view('kasir.pesanan', compact('pendingOrders'));
    }

    public function updateOrderStatus($id, Request $request) {
        $request ->validate([
            'status_pembayaran' => 'required|in:pending,completed,rejected',
        ]);

        $order = Order::where('id',$id)->first();
        $detailOrder = DetailOrder::where('order_id',$order->id)->first();
        $detailOrder ->status_pembayaran = $request->status_pembayaran;

        // mengurangi qty jika status pembayaran berhasil
        if ($detailOrder->status_pembayaran === 'completed') {
            $detailOrder->event->stok -= $detailOrder->qty;
        }

        if ($detailOrder->status_pembayaran === 'rejected') {
            $detailOrder->pricetotal = 0;
        }

        Log::create([
            'user_id' => auth()->id(),
            'activity' => Auth::user()->role . ' Mengkonfirmasi pembayaran menjadi ' . $detailOrder->status_pembayaran,
        ]);

        $detailOrder->event->save();
        $detailOrder->save();

        return redirect()->route('pesanan');

        
    }

    public function completedRejectedOrders(Request $request) {
        $completedRejectedOrders = Order::with('detailOrder')->whereHas('detailOrder', function($query){
            $query->wherein('status_pembayaran', ['completed', 'rejected']);
        });

        if ($request->has('start_date') && $request->has('end_date')) {
            //mendapatkan rentang harga dari input date
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            //memastikan format tanggal yang benar
            $startDate = date('Y-m-d', strtotime($startDate));
            $endDate = date('Y-m-d', strtotime($endDate));

            //menambahkan kondisi wherebwtween untuk menyaring order berdasarkan rentang tanggal
            $completedRejectedOrders->whereBetween('created_at',[$startDate . ' 00:00:00', $endDate . ' 23:59:59']);

        }

       

        $completedRejectedOrders = $completedRejectedOrders->get();
        
        return view('owner.riwayat', compact('completedRejectedOrders'));
    }
    public function printRiwayatTransaksi(Request $request) {
         // Menggunakan with() untuk memuat detailOrders dalam kueri utama
         $orders = Order::with('detailOrder')->whereHas('detailOrder', function ($query) {
            $query->whereIn('status_pembayaran', ['completed', 'rejected']);
        });
    
        // Mendapatkan rentang tanggal dari input date
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Memastikan format tanggal yang benar (telah diubah sebelumnya)
        // $startDate = date('Y-m-d', strtotime($startDate));
        // $endDate = date('Y-m-d', strtotime($endDate));
    
        // Filter orders berdasarkan rentang tanggal
        $orders->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
    
        // Mengambil data setelah filter
        $orders = $orders->get();
    
        // Menghasilkan file PDF dari view 'riwayat-pdf' dengan data yang dimasukkan
        $pdf = PDF::loadView('owner.riwayat-pdf', compact('orders'));
    
        // Mengunduh file PDF dengan nama tertentu
        return $pdf->download('Riwayat-Transaksi.pdf');
    
        
    }
}
