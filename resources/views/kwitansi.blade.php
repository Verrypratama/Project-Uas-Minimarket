<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Penjualan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receipt {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt">
            <div class="receipt-header">
                <h2>Kwitansi Penjualan</h2>
                <p>Mini Market</p>
                <hr>
            </div>
            <div class="receipt-body">
                <div class="row mb-4">
                    <div class="col-6">
                        {{-- <h5>Pembeli:</h5> --}}
                        {{-- <p>Nama Pembeli</p> --}}
                    </div>
                    {{-- <div class="col-6 text-right">
                        <h5>Tanggal:</h5>
                        <p>01-01-2024</p>
                    </div> --}}
                </div>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $jml=0; $har=0?>
                        @foreach($nama_produk as $np )
                        <tr>
                            <td>{{ $np }}</td>
                            <?php $temp = $harga[$har++]?>
                            <td>Rp{{  $temp }} </td>
                            <?php $sesi = $jumlah[$jml++]?>
                            <td>{{ $sesi}}</td>
                            <td>{{ $sesi*$temp}}</td>
                        </tr>

                     @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12 text-right">
                        <h4>Total Pembayaran: <strong>Rp {{ $total }}</strong></h4>
                    </div>
                </div>
            </div>
            <div class="receipt-footer">
                <hr>
                <p>Terima kasih telah berbelanja di Mini Market kami</p>
                <button class="btn btn-light"><a href="/dashboard/">Kembali</a></button>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
