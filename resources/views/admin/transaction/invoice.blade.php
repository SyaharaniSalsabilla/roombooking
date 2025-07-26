<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Nin Space</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f8f8;">

    <!-- Main Container -->
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f8f8f8; padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- Invoice Container -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 400px; background-color: #ffffff; border-radius: 8px; border: 1px solid #dddddd;">

                    <!-- Header -->
                    <tr>
                        <td style="text-align: center; padding: 20px; background-color: #ffffff; border-bottom: 2px solid #991b1b;">
                            <img src="https://anindhaloka.com/assets/front/image/Anindhaloka.png" alt="Nin Space Logo" style="height: 40px; max-width: 200px; display: block; margin: 0 auto;">
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 20px; color: #333333;">

                            <!-- Invoice Title -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="text-align: center; color: #991b1b; font-weight: bold; font-size: 18px; padding-bottom: 10px;">
                                        INVOICE
                                    </td>
                                </tr>
                            </table>

                            <!-- Booking Time -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="text-align: center; color: #991b1b; font-weight: bold; font-size: 16px; padding-bottom: 20px;">
                                        {{ date('Y-m-d H:i', strtotime($tanggal_awal)) }} <span style="color: black;">sampai</span> {{ date('Y-m-d H:i', strtotime($tanggal_akhir)) }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Info Section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f9f9f9; border-radius: 6px; margin-bottom: 15px;">
                                <tr>
                                    <td style="padding: 15px;">
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tr>
                                                <td style="font-weight: bold; color: #666666; font-size: 14px; padding: 5px 0;">Kode Transaksi:</td>
                                                <td style="text-align: right; font-size: 14px; padding: 5px 0;">{{ $kode_transaksi }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; color: #666666; font-size: 14px; padding: 5px 0;">Status:</td>
                                                <td style="text-align: right; font-size: 14px; padding: 5px 0;">
                                                    <span style="
                                                        padding: 4px 8px;
                                                        border-radius: 4px;
                                                        font-size: 12px;
                                                        font-weight: bold;
                                                        text-transform: uppercase;
                                                        @if($status == 'Menunggu pembayaran')
                                                            background-color: #fef3c7; color: #92400e;
                                                        @elseif($status == 'Pembayaran diterima')
                                                            background-color: #d1fae5; color: #065f46;
                                                        @elseif($status == 'Selesai')
                                                            background-color: #dbeafe; color: #1e40af;
                                                        @else
                                                            background-color: #fee2e2; color: #991b1b;
                                                        @endif
                                                    ">{{ $status }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            @if(count($ruangan) > 0)
                            <!-- Ruangan Section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 1px solid #eeeeee; padding-top: 15px;">
                                <tr>
                                    <td style="font-weight: bold; color: #991b1b; font-size: 16px; padding-bottom: 10px;">
                                        Ruangan
                                    </td>
                                </tr>
                                @foreach($ruangan as $room)
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin: 8px 0;">
                                            <tr>
                                                <td style="font-weight: bold; font-size: 16px; padding: 4px 0;">
                                                    {{ $room->nama_ruangan }}
                                                    @if($room->diskon > 0)
                                                        <span style="color: red; font-size: 14px;">(Diskon {{ $room->diskon }}%)</span>
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
                                                <td style="text-align: right; font-weight: 600; color: #333333; font-size: 16px; padding: 4px 0;">
                                                    IDR {{ number_format($harga_total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif

                            @if($fasilitas && count($fasilitas) > 0)
                            <!-- Fasilitas Section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 1px solid #eeeeee; padding-top: 15px;">
                                <tr>
                                    <td style="font-weight: bold; color: #991b1b; font-size: 16px; padding-bottom: 10px;">
                                        Fasilitas Tambahan
                                    </td>
                                </tr>
                                @foreach($fasilitas as $fas)
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin: 6px 0; padding-left: 10px;">
                                            <tr>
                                                <td style="font-size: 14px; color: #666666; padding: 3px 0;">{{ $fas->fs->nama_fasilitas }}</td>
                                                <td style="text-align: right; font-size: 14px; color: #666666; padding: 3px 0;">({{ $fas->kuantitas }}) - IDR {{ number_format($fas->fs->harga_satuan * $fas->kuantitas, 0, ',', '.') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif

                            <!-- Total Section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 2px dashed #999999; padding-top: 15px; margin-top: 15px;">
                                <tr>
                                    <td style="font-weight: bold; font-size: 18px; color: #991b1b; padding: 8px 0;">Total</td>
                                    <td style="text-align: right; font-weight: bold; font-size: 18px; color: #991b1b; padding: 8px 0;">IDR {{ number_format($harga_t, 0, ',', '.') }}</td>
                                </tr>
                            </table>

                            @if($note)
                            <!-- Notes Section -->
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-top: 1px solid #eeeeee; padding-top: 15px; margin-top: 15px;">
                                <tr>
                                    <td style="font-size: 14px; color: #666666; padding: 8px 0;">
                                        <strong>Catatan:</strong> {{ $note }}
                                    </td>
                                </tr>
                            </table>
                            @endif

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="text-align: center; padding: 20px; background-color: #f9f9f9; border-top: 1px solid #eeeeee; font-size: 12px; color: #666666;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="text-align: center; padding: 2px 0;">Terima kasih telah memilih Nin Space!</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 2px 0;">Jika ada pertanyaan, silakan hubungi kami.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <!-- Tombol Download -->
                @if(isset($downloadLink))
                <table align="center" style="margin-top: 20px;">
                    <tr>
                        <td align="center">
                            <a href="{{ $downloadLink }}" target="_blank" 
                                style="background-color: #991b1b; color: white; padding: 12px 24px;
                                text-decoration: none; border-radius: 6px; font-weight: bold;">
                                Download Invoice PDF
                            </a>
                        </td>
                    </tr>
                </table>
                @endif
            </td>
        </tr>
    </table>

</body>
</html>
