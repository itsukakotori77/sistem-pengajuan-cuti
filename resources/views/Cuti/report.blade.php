<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        th,td{
            font-size: 10px;
            text-align: left;
        }
        .table{
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }
        .th{
            border: 1px solid black;
            background: #000000;
            color: #fff;
        }
        .td{
            border: 1px solid black;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            margin-bottom: 40px;
        }
        .pull-left{
            text-align: left;
        }
        .pull-right{
            text-align: right;
        }

    </style>
</head>
<body>
    <!-- Kop Surat -->
    <header>
        <img src="{{ public_path('images/kop-surat.png') }}" alt="IMBU" style="width: 100%;">
    </header>
    <p class="pull-right">{{ date('d F Y') }}</p>
    
    <!-- Table 1 -->
    <table width="100%">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <!-- Kepada -->
        <tr>
            <td colspan="10" style="font-size: 14px;">Kepada Yth:</td>
        </tr>
        <tr>
            <td colspan="20" style="font-size: 14px;">Kepala Direktur PT. Sumber Berkah Logam</td>
        </tr>
        <tr>
            <td colspan="10" style="font-size: 14px;">Gg. Tirta Indah 2 No.200B, Leuweunggede</td>
        </tr>

        <!-- Spaze -->
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <p>Dengan perantaraan surat ini saya melaporkan data karyawan yang mengajukan cuti kepada Bapak Direktur, datanya sebagai berikut :</p>
    
    <!-- Table 2 -->
    <table class="table" style="margin-top: 20px;">
        <thead>
            <tr>
                <th class="th">ID Cuti</th>
                <th class="th">Nama</th>
                <th class="th">Rentang Cuti</th>
                <th class="th">Status</th>
                <th class="th">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cuti as $cuti)
                <tr>
                    <td class="td">{{ 'CTI' . $cuti->ID_Cuti }}</td>
                    <td class="td">{{ $cuti->Nama_Depan . ' ' . $cuti->Nama_Belakang }}</td>
                    <td class="td">{{ date('d/m/Y', strtotime($cuti->Tanggal_Mulai)) . ' - ' . date('d/m/Y', strtotime($cuti->Tanggal_Berakhir)) }}</td>
                    @if($cuti->Status == 0)
                        <td class="td">
                            <div class="text-center">
                                <span class="label label-default">Belum Disetujui</span>
                            </div>
                        </td>
                    @elseif($cuti->Status == 2)
                        <td class="td">
                            <div class="text-center">
                                <span class="label label-primary">Disetujui</span>
                            </div>
                        </td>
                    @else 
                        <td class="td">
                            <div class="text-center">
                                <span class="label label-danger">Tidak Disetujui</span>
                            </div>
                        </td>
                    @endif

                    @if($cuti->Catatan == '')
                        <td class="td">Kosong</td>
                    @else 
                        <td class="td">{{ $cuti->Catatan }}</td>
                    @endif 
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        Berkenaan dengan data diatas, saya mengusulkan untuk menerima laporan cuti ini.
        Atas Perhatiannya saya ucapkan terima kasih.
    </p>

    <table width="100%" style="margin-top: 150px;">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- TTD -->
            <tr>
                <td colspan="10">
                    <p class="pull-left" style="font-size: 14px;">Hormat Saya</p> 
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <!-- TTD 2 -->
            <tr>
                <td colspan="10">
                    <p class="pull-left" style="font-size: 14px;">Pimpinan Divisi</p> 
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>