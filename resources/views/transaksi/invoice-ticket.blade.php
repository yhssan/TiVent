
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 20px;
        }
        h3 {
            text-align: center;
            color: #333;
        }
        h2 {
            text-align: right;
            color: #333;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .column-6 {
            width: calc(50% - 20px);
            float: left;
            margin-right: 20px;
        }


        .invoice-details {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   <div class="column-6">
    <div class="card">
        <p>
            <h1>Invoice</h1>
            <h2>Tivent</h2>
        </p>
    
        <div class="invoice-details">
            <p>Nama: {{ $detailOrder->user->nama }}</p>
            <p>Email: {{ $detailOrder->user->email }}</p>
            <p>Order Code: {{ $detailOrder->order->code }}</p>
            <p>{{ $detailOrder->event->nama }}</p>
            <p>Tanggal : {{ $detailOrder->event->tanggal }}</p>
            <p>Waktu : {{ $detailOrder->event->waktu }}</p>
            <p>Lokasi : {{ $detailOrder->event->lokasi }}</p>
        </div>
    
        <hr>
    
        <table>
            <thead>
                <tr>
                    <th>Tiket</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $detailOrder->qty }}</td>                     
                        <td>{{ number_format($detailOrder->event->harga, 0, ',', '.') }}</td>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total Harga: {{ number_format($detailOrder->pricetotal, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    
        <hr>
        <h4>
            Perlihatkan Invoice Ke Pihak Penanggung Jawab Loket <br> 
            Untuk Mendapatkan Ticket Fisik </h4>
       </div>

        <footer> 
            <h3>Terima Kasih Telah Membeli Tiket di Website Kami</h3>
        </footer>
   </div>

</body>
</html>
