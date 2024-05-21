<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .invoice {
        width: 80%;
        margin: 0 auto;
    }
    .header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .header .left,
    .header .right {
        width: 45%;
    }
    .invoice h2 {
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #000;
        padding: 8px;
    }
    .footer {
        margin-top: 20px;
        position: fixed;
        bottom: 20px; /* Sesuaikan dengan jarak dari bawah yang Anda inginkan */
        right: 150px; /* Sesuaikan dengan jarak dari kanan yang Anda inginkan */
    }
    .footer .left,
    .footer .right {
        width: 50%;
    }
    .signature-box {
        height: 100px;
        width: 200px;
        border: 1px solid #000;
        margin-top: 20px;
    }
    .right {
        text-align: right;
        margin-right: 20px;
        margin-left: 50%; /* Mengatur teks di dalamnya ke kanan */
    }

    .text-uppercase{
        text-transform: uppercase;

    }
</style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <div class="left">
                <img src="{{ public_path("images/logo.png") }}" alt="">
                <p>{{$tanggal}}</p>
            </div>
            <div class="right">
                <p>Nama Customer: &nbsp; {{ $transactions->customer->nama}}</p>
                <p>No Transaksi: &nbsp; {{ $transactions->id}}</p>
                <p>Motor: &nbsp; {{ $transactions->customer->jenis_kendaraan}}</p>
                <p >No Kendaraan: &nbsp;<span class="text-uppercase">{{ $transactions->customer->no_kendaraan}}</span> </p>
            </div>
        </div>
        <h2>Invoice</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Jenis</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemsUsed as $price => $itemName)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $itemName }}</td>
                    <td>{{ $loop->first ? 'Jasa' : 'Sparepart' }}</td>
                    <td>1</td> <!-- Misalkan setiap item memiliki qty 1, sesuaikan dengan logika Anda -->
                    <td>{{$price}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total</td>
                    <td>{{ $formatPrice }}</td>
                </tr>
                <tr> <td colspan="4">Terbilang</td>
                    <td>{{ $terbilang}}</td></tr>
            </tfoot>
        </table>
        <div class="footer">
            <div class="">

                <p>Bandung {{$tanggal}}</p>

            </div>
            <div class="">
                <p>Hormat Kami,</p>
                <div class="signature-box"></div>
                <p>{{ $transactions->user->name }}</p>
            </div>
        </div>
    </div>
</body>
</html>
