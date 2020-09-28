<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    
    <!-- Table 2 -->
    <table class="table" style="margin-top: 50px;">
        <thead>
            <tr>
                <th class="th">Nomor</th>
                <th class="th">ID Cuti</th>
                <th class="th">Nama</th>
                <th class="th">Rentang Cuti</th>
                <th class="th">Status</th>
                <th class="th">Catatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
            </tr>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

    <!-- Table 3 -->
    
    
</body>
</html>

</body>
</html>