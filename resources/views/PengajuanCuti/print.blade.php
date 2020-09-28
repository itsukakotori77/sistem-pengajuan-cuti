<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan</title>
    <style>
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
        <img src="{{ public_path('images/kop-surat-2.png') }}" style="width: 100%;">
        <!-- <img src="public/images/kop-surat.png" > -->
    </header>
    <p class="pull-right">Bandung, {{ date('d F Y') }}</p>

    <!-- Table -->
    <table style="width: 100%">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>&nbsp;</td>
            </tr>
    
            <!-- Kepada -->
            <tr>
                <td colspan="10">Kepada Yth:</td>
            </tr>
            <tr>
                @if($cuti->Divisi == 1)
                    <td colspan="20">Kepala Divisi Bubut PT. Sumber Berkah Logam</td>
                @elseif($cuti->Divisi == 2)
                    <td colspan="20">Kepala Divisi Miling PT. Sumber Berkah Logam</td>
                @elseif($cuti->Divisi == 3)
                    <td colspan="20">Kepala Divisi Pengelasan PT. Sumber Berkah Logam</td>
                @elseif($cuti->Divisi == 4)
                    <td colspan="20">Kepala Divisi Pengecoran PT. Sumber Berkah Logam</td>
                @elseif($cuti->Divisi == 5)
                    <td colspan="20">Kepala Divisi Perangkaian PT. Sumber Berkah Logam</td>
                @elseif($cuti->Divisi == 6)
                    <td colspan="20">Kepala Divisi Gudang PT. Sumber Berkah Logam</td>
                @else
                    <td colspan="20">Kepala Divisi Operasional PT. Sumber Berkah Logam</td>
                @endif
            </tr>
            <tr>
                <td colspan="10">Gg. Tirta Indah 2 No.200B, Leuweunggede</td>
            </tr>
    
            <!-- Null -->
            <tr>
                <td>&nbsp;</td>
            </tr>
            
            <!-- Dengan Hormat -->
            <tr>
                <td colspan="10">Dengan Hormat,</td>
            </tr>
    
            <!-- Null -->
            <tr>
                <td>&nbsp;</td>
            </tr>
    
            <!-- TTD -->
            <tr>
                <td colspan="10">Saya yang bertanda tangan dibawah ini :</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
            </tr>

            <!-- Nama -->
            <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="5">Nama</td>
                <td>:</td>
                <td colspan="10">{{ $cuti->Nama_Depan . ' ' . $cuti->Nama_Belakang }}</td>
            </tr>

            <!-- Jabatan -->
            <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="5">Jabatan</td>
                <td>:</td>
                @if($cuti->Jabatan == 1)
                    <td colspan="10">Direktur</td>
                @elseif($cuti->Jabatan == 2)
                    <td colspan="10">Manager</td>
                @elseif($cuti->Jabatan == 3)
                    <td colspan="10">Keuangan</td>
                @elseif($cuti->Jabatan == 4)
                    <td colspan="10">Purchasing</td>
                @else 
                    <td colspan="10">Administrasi</td>
                @endif
            </tr>

            <!-- Alamat -->
            <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="5">Alamat</td>
                <td>:</td>
                <td colspan="20">Gg. Tirta Indah 2 No.200B, Leuweunggede</td>
            </tr>

            <!-- Lama cuti -->
            <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="5">Lama Cuti</td>
                <td>:</td>
                <td colspan="20">{{ date('d F Y', strtotime($cuti->Tanggal_Mulai)) . ' - ' . date('d F Y', strtotime($cuti->Tanggal_Berakhir)) }}</td>
            </tr>

            <!-- Deskripsi -->
            <tr>
                <td colspan="40">
                    <p>
                        Dengan surat ini saya bermaksud untuk memohon cuti kerja selama <strong>{{ $jumlahHari }}  
                        hari kerja </strong>, hal ini dikarenakan <strong>{{ $cuti->Alasan }}</strong>.
                        Demikian surat cuti kerja ini saya ajukan. Atas perhatian serta kebijaksanaannya saya ucapkapkan 
                        terimakasih.
                    </p>
                </td>
            </tr>

        </tbody>
    </table>

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
                    <p class="pull-left">Hormat Saya</p> 
                </td>
                <td colspan="10">
                    <div class="pull-left">
                        <img src="{{ public_path('images/blank.png') }}" alt="" class="pull-right" style="width: 100px;">
                    </div>
                </td>
                <td colspan="3">
                    <p class="pull-right" style="margin-right: 10px;">Persetujuan</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <!-- TTD 2 -->
            <tr>
                <td colspan="10">
                    <p class="pull-left">{{ $cuti->Nama_Depan . ' ' . $cuti->Nama_Belakang }}</p> 
                </td>
                <td colspan="10">
                    <img src="{{ public_path('images/blank.png') }}" alt="" class="pull-right" style="width: 100px;">
                </td>
                <td colspan="3">
                    @if($cuti->Persetujuan == 2)
                        <img src="{{ public_path('images/acc.png') }}" alt="" class="pull-right" style="width: 100px; margin-left: 160px;">
                    @elseif($cuti->Persetujuan == 0)
                        <img src="{{ public_path('images/reject.png') }}" alt="" class="pull-right" style="width: 100px; margin-left: 160px;">
                    @else 
                        <img src="{{ public_path('images/blank.png') }}" alt="" class="pull-right" style="width: 100px; margin-left: 160px;">
                    @endif
                    <p class="pull-right">Kepala Divisi</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>