<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - ANINDHALOKA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: black;
            background: #f5f5f5;
            padding: 20px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            width: 100%;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .header table {
            width: 100%;
            border-collapse: collapse;
        }
        .logo-section {
            vertical-align: top;
        }
        .logo {
            width: 30px;
            height: 30px;
            background: #ddd;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
            color: #666;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }
        .company-name {
            font-size: 18px;
            font-weight: bold;
            color: black;
            display: inline-block;
            vertical-align: middle;
        }
        .invoice-title {
            text-align: right;
            vertical-align: top;
        }
        .invoice-title h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .invoice-number {
            color: #666;
            font-size: 14px;
        }
        .due-date {
            font-weight: bold;
            margin-bottom: 20px;
            color: black;
        }
        .three-column-section {
            width: 100%;
            margin-bottom: 20px;
        }
        .three-column-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .three-column-section td {
            vertical-align: top;
            width: 33.33%;
            padding-right: 20px;
        }
        .three-column-section td:last-child {
            padding-right: 0;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
            color: black;
        }
        .three-column-section p {
            margin-bottom: 3px;
            font-size: 11px;
        }
        .reference-section {
            margin-bottom: 20px;
            padding: 10px 0;
            border-top: 1px solid #eee;
        }
        .total-amount {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }
        .order-id {
            color: #666;
            margin-bottom: 30px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: black;
        }
        .items-table th {
            background: #f8f8f8;
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            font-weight: bold;
        }
        .items-table td {
            padding: 8px 10px;
            border: 1px solid #ddd;
        }
        .items-table .text-right {
            text-align: right;
        }
        .items-table .text-center {
            text-align: center;
        }
        .totals-section {
            width: 300px;
            margin-left: auto;
            margin-bottom: 30px;
            color: black;
        }
        .totals-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .totals-row {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .totals-row.final {
            font-weight: bold;
            border-bottom: 2px solid #333;
            margin-top: 10px;
            padding-top: 10px;
        }
        .totals-row td {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .totals-row.final td {
            font-weight: bold;
            border-bottom: 2px solid #333;
            padding-top: 15px;
        }
        .signature-section {
            text-align: right;
            margin-bottom: 30px;
        }
        .signature-box {
            display: inline-block;
            text-align: center;
            margin-top: 20px;
        }
        .signature-label {
            font-style: italic;
            color: #666;
            margin-bottom: 5px;
        }
        .signature-line {
            width: 150px;
            border-bottom: 1px solid #333;
            margin: 0 auto 5px auto;
        }
        .footer-sections {
            width: 100%;
        }
        .footer-sections table {
            width: 100%;
            border-collapse: collapse;
        }
        .footer-sections td {
            vertical-align: top;
            width: 50%;
            padding-right: 30px;
        }
        .footer-sections td:last-child {
            padding-right: 0;
        }
        .footer-sections h3 {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .footer-sections p, .footer-sections h4 {
            font-size: 10px;
            line-height: 1.5;
            color: #666;
        }
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .invoice-container {
                box-shadow: none;
                padding: 20px;
            }
        }
        @media (max-width: 768px) {
            .three-column-section table,
            .footer-sections table {
                display: block;
            }
            .three-column-section td,
            .footer-sections td {
                display: block;
                width: 100%;
                padding-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <table>
                <tr>
                    <td class="logo-section" style="width: 50%; vertical-align: top;">
                        <img src="D:\A kuliah billa\Smt 7\TA\roombooking\public\assets\front\image\Anindhaloka.png" alt="Nin Space Logo" style="max-height: 40px;">
                    </td>

                    <!-- <td class="logo-section" style="width: 50%; vertical-align: top;">
                        <div class="logo">
                            <img src="https://anindhaloka.com/assets/front/image/Anindhaloka%20Logo.png" alt="Anindhaloka Logo" style="height: 30px; object-fit: contain;">
                            <img src="D:\A kuliah billa\Smt 7\TA\roombooking\public\assets\front\image\Anindhaloka Logo.png" alt="Anindhaloka Logo" style="height: 30px; object-fit: contain;">
                        </div>
                        <div class="company-name">ANINDHALOKA</div>
                    </td> -->
                    <td class="invoice-title" style="width: 50%; text-align: right; vertical-align: top; color: black;">
                        <h1>INVOICE</h1>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Due Date -->
        <div class="due-date">{{ date('Y-m-d H:i', strtotime($tanggal_awal)) }} <span style="color: black;">sampai</span> {{ date('Y-m-d H:i', strtotime($tanggal_akhir)) }}</div>

        <!-- Three Column Section: From, Bill to, Status -->
        <div class="three-column-section">
            <table>
                <tr>
                    <td style="vertical-align: top; width: 33.33%; padding-right: 20px; color: black;">
                        <div class="section-title">Dari:</div>
                        <p><strong>ANINDHALOKA</strong></p>
                        <p>Jl. YRS No.20</p>
                        <p>Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan</p>
                        <p>Daerah Khusus Ibukota Jakarta, 12330</p>
                        <p>www.anindhaloka.com</p>
                        <p>ninspacecenter@gmail.com</p>
                        <p>+62 856-9565-8645</p>
                    </td>
                    <td style="vertical-align: top; width: 33.33%; padding-right: 20px; color: black;">
                        <div class="section-title">Kepada:</div>
                        <p><strong>{{ $nama }}</strong></p>
                        <p>{{ $email }}</p>
                        <p>{{ $telepon }}</p>
                    </td>
                    <td style="vertical-align: top; width: 33.33%; color: black;">
                        <div class="section-title">Status Transaksi:</div>
                        <p><strong>{{ $status }}</strong></p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Total Amount (Left Aligned) -->
        <div class="total-amount" style="color: black;">Total : {{ number_format($harga_t) }}</div>
        <div class="order-id">Kode Transaksi : {{ $kode_transaksi }}</div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="color: black;">Deskripsi</th>
                    <th class="text-center" style="color: black;">Satuan</th>
                    <th class="text-right" style="color: black;">Harga Satuan (IDR)</th>
                    <th class="text-right" style="color: black;">Total (IDR)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ruangan as $room)
                <tr>
                    <td style="color: black;">
                        {{ $room->nama_ruangan }}
                        @if($room->diskon > 0)
                            <span style="color: red;">(Diskon {{ $room->diskon }}%)</span>
                        @php
                            $harga_diskon = $room->harga - $room->harga * ($room->diskon / 100);
                            $harga_total = $harga_diskon * $waktu;
                        @endphp
                        @else
                        @php
                            $harga_total = $room->harga * $waktu;
                        @endphp
                        @endif
                    </td>
                    <td class="text-center" style="color: black;">1</td>
                    <td class="text-right" style="color: black;">{{ number_format($harga_total) }}</td>
                    <td class="text-right" style="color: black;">{{ number_format($harga_total) }}</td>
                </tr>
                @endforeach
                @foreach($fasilitas as $fs)
                <tr>
                    <td style="color: black;">{{ $fs->fs->nama_fasilitas }}</td>
                    <td class="text-center" style="color: black;">{{ $fs->kuantitas }}</td>
                    <td class="text-right" style="color: black;">{{ number_format($fs->fs->harga_satuan) }}</td>
                    <td class="text-right" style="color: black;">{{ number_format($fs->fs->harga_satuan * $fs->kuantitas) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals Section -->
        <div class="totals-section">
            <table>
                <tr class="totals-row final">
                    <td style="text-align: left;">Total</td>
                    <td style="text-align: right;">Rp. {{ number_format($harga_t) }}</td>
                </tr>
            </table>
        </div>

        <!-- Signature Section -->
        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-label">signature</div>
                <div class="signature-line"></div>
                <div style="color: black;">
                    <strong>Elitua Hamonangan Simarmata</strong>
                </div>
            </div>
        </div>

        <!-- Footer Sections -->
        <div class="footer-sections">
            <table>
                <tr>
                    <td style="vertical-align: top; width: 100%; color: black;">
                        <div class="notes-section">
                            <h3>Catatan</h3>
                            <h4>{{$note}}</h4>
                            <h4>Terima kasih telah memilih Nin Space!. Jika ada pertanyaan, silakan hubungi kami.</h4>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
