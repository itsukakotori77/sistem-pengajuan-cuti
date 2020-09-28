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

    </style>
</head>
<body>
    <header>
        <img src="{{ public_path() . '/images/IMBUBlack.png' }}" alt="IMBU" style="width: 100px;">
    </header>

    <!-- Table 1 -->
    <center><b><h6>FORM PURCHASE REQUEST</h6></b></center>
    <table style="border-collapse;border-collapse: collapse; width:100%;">
        <tr rowspan="2">
            <th><b>IMBUPR00{{ $purchase->id }}</b></th>

        </tr>
        <tr>
            <!-- Tanggal Permintaan -->
            <th>Tanggal Permintaan</th>
            <td>{{ date('d - F - Y', strtotime($purchase->request_date)) }}</td>

            <!-- Travel Purpose -->
            <td style="width: 60px;"></td>
            <th>Direct Manager</th>
            <td>{{ $purchase->manager_name }}</td>
        </tr>
        <tr>
            <!-- Pengaju -->
            <th>Requestor</th>
            <td>{{ $purchase->requestor }}</td>

            <!-- Nama Event -->
            <td style="width: 60px;"></td>
            <th>Tanggal Jatuh Tempo</th>
            <td>{{ date('d - F - Y', strtotime($purchase->request_due_date)) }}</td>
        </tr>
        <tr>
            <!-- Tanggal Event -->
            <th>Posisi Requestor</th>
            <td>{{ $purchase->position_tile }}</td>

        </tr>
        <tr>
            <!-- Nama Pengajuan -->
            <th>Nama Pengajuan</th>
            <td>{{ $purchase->request_name }}</td>
        </tr>
    </table>
    
    <!-- Table 2 -->
    <table class="table" style="margin-top: 50px;">
        <thead>
            <tr>
                <th class="th">No</th>
                <th class="th">Item/Service*</th>
                <th class="th">Vendor*</th>
                <th class="th">Unit</th>
                <th class="th">Price</th>
                <th class="th">Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase->PurchaseRequestData as $purchaseData)
                <tr>
                    <td class="td">{{ $loop->iteration }}</td>
                    <td class="td">{{ $purchaseData->nama_barang }}</td>
                    <td class="td">{{ $purchaseData->vendor }}</td>
                    <td class="td"><center>{{ $purchaseData->jumlah_barang }}</center></td>
                    <td class="td">Rp. {{ $purchaseData->harga_barang }}</td>
                    <td class="td">Rp. {{ $purchaseData->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="th" colspan="5"><center>Total Harga</center></th>
                <th class="th">Rp. {{ $purchase->total }}</th>
            </tr>
        </tfoot>
    </table>

    <!-- Table 3 -->
    <table style="width:100%; margin-top: 300px; position: relative;">
        <tr>
            <th>(1) Requestor, </th>
            <th colspan="5">&nbsp;</th>
            <th>(2), Direct Manager</th>
            <th>(3), Director</th>
            <th>(4), Finance Approval</th>
        </tr>
        <tr>
            <td rowspan="3" height="120">
                <img src="{{ public_path() . '/images/blank.png' }}" alt="acc" style="width: 100px;">
                <br>
                <u>{{ $purchase->requestor }}</u>
                <br>
                <span style="margin-top: 5px;">
                    Tanggal : {{ date('d - F - Y') }} 
                </span>
            </td>
            <td colspan="5">&nbsp;</td>
            <td rowspan="3">
                @if($purchase->status1 == 2)
                    <img src="{{ public_path() . '/images/acc.png' }}" alt="acc" style="width: 100px;">
                @elseif($purchase->status1 == 0)
                    <img src="{{ public_path() . '/images/reject.png' }}" alt="reject" style="width: 100px;">
                @else
                    <img src="{{ public_path() . '/images/blank.png' }}" alt="acc" style="width: 100px;">
                @endif
                <br>
                <u>{{ $purchase->manager_name }}</u>
                <br>
                <span style="margin-top: 5px;">
                    Tanggal : {{ date('d - F - Y') }} 
                </span>
            </td>
            <td rowspan="3">
                @if($purchase->status3 == 2)
                    <img src="{{ public_path() . '/images/acc.png' }}" alt="acc" style="width: 100px;">
                @elseif($purchase->status3 == 0)
                    <img src="{{ public_path() . '/images/reject.png' }}" alt="reject" style="width: 100px;">
                @else
                    <img src="{{ public_path() . '/images/blank.png' }}" alt="acc" style="width: 100px;">
                @endif
                <br>
                <u>Peter Hermawan</u>
                <br>
                <span style="margin-top: 5px;">
                    Tanggal : {{ date('d - F - Y') }} 
                </span>
            </td>
            <td rowspan="3">
                @if($purchase->status4 == 2)
                    <img src="{{ public_path() . '/images/acc.png' }}" alt="acc" style="width: 100px;">
                @elseif($purchase->status4 == 0)
                    <img src="{{ public_path() . '/images/reject.png' }}" alt="reject" style="width: 100px;">
                @else
                    <img src="{{ public_path() . '/images/blank.png' }}" alt="acc" style="width: 100px;">
                @endif
                <br>
                <u>Miftha Khairiah</u>
                <br>
                <span style="margin-top: 5px;">
                    Tanggal : {{ date('d - F - Y') }} 
                </span>
            </td>
        </tr>
    </table> 
    
</body>
</html>
