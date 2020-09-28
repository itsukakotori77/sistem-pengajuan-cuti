<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use PDF;
use App\Cuti;
use App\User;
use App\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PengajuanController extends Controller
{
    public function home()
    {
        return view('PengajuanCuti.home');
    }

    public function form()
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        return view('PengajuanCuti.pengajuan', compact('pegawai'));
    }

    public function pengajuan(Request $request)
    {
        // Request Validate
        $request->validate([
            'Jenis_Cuti' => 'required|numeric',
            'Tanggal_Mulai' => 'required',
            'Tanggal_Berakhir' => 'required',
            'Alasan' => 'required|string',
        ]);

        // Pegawai
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        // Insert Cuti
        $request->request->add(['Tanggal_Pengajuan' => Carbon::now()->format('Y-m-d')]);
        $request->request->add(['Tanggal_Mulai' => Carbon::createFromFormat('d/m/Y', $request->Tanggal_Mulai)->format('Y-m-d')]);
        $request->request->add(['Tanggal_Berakhir' => Carbon::createFromFormat('d/m/Y', $request->Tanggal_Berakhir)->format('Y-m-d')]);
        $request->request->add(['Persetujuan' => 1]);
        $request->request->add(['Status' => 0]);
        $request->request->add(['Pegawai_ID' => $pegawai->ID_Pegawai]);

        // Upload Gambar
        if($request->file('Kartu_Hamil') == '') 
        {
            $surat = NULL;
        } else {
            //Change Path of Picture
            $file = $request->file('Kartu_Hamil');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak; 

            // Croping Picture
            $image_resize = Image::make($file->getRealPath());              
            // $image_resize->resize(200, 200);
            $image_resize->save(public_path('asset/images/surat-hamil/' . $fileName));
            $surat = $fileName;
        }
        $request->request->add(['Surat_Hamil' => $surat]);

        $cuti = Cuti::create($request->all());
        return redirect('/pengajuan/cuti/selesai');
        // return $surat;
    }

    public function selesai()
    {
        return view('PengajuanCuti.selesai');
    }

    public function lihatPengajuan(Request $request)
    {
        // $cuti = Cuti::find($id);
        $data = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang')
                ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                ->leftJoin('users', 'users.id', '=', 'pegawai.user_id')
                ->orderBy('cuti.ID_Cuti', 'DESC')
                ->where('users.id', '=', Auth::user()->id)
                ->get();

        // return $data;
        if($request->ajax())
        {
            return Datatables::of($data)    
                    ->addIndexColumn()
                    ->editColumn('Tanggal_Pengajuan', function($data){
                        return date('d - F - Y', strtotime($data->Tanggal_Pengajuan));
                    })
                    ->editColumn('Status', function($data){
                        $status = '';

                        if($data->Status == 0)
                            $status = '<div class="text-center"><span class="label label-default">Belum Berjalan</span></div>';
                        elseif($data->Status == 1)
                            $status = '<div class="text-center"><span class="label bg-light-blue">Sedang Berjalan</span></div>';
                        elseif($data->Status == 2)
                            $status = '<div class="text-center"><span class="label bg-light-green">Telah Selesai</span></div>';
                        else 
                            $status = '<div class="text-center"><span class="label label-danger">Ditolak</span></div>';
                        
                        return $status;
                    })
                    ->addColumn('Nama', function($data){
                        return $data->Nama_Depan . ' ' . $data->Nama_Belakang;
                    })
                    ->addColumn('Cetak', function($data){
                        $cuti = '';

                        if($data->Status == 2 || $data->Status == 0 || $data->Persetujuan == 2)
                            $cuti =  
                            '
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-center d-inline">
                                            <button type="button" disabled id="btnSelesai" onclick="selesai(' . $data->ID_Cuti . ')" class="btn btn-success btn-sm"><i class="material-icons">not_interested</i></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center d-inline">
                                            <form action="'. url('/pengajuan/cuti/cetak/' . $data->ID_Cuti) .'" method="POST">
                                                ' . csrf_field() . '
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="material-icons">print</i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                            ';
                        else 
                        $cuti = 
                        '
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="text-center d-inline">
                                        <button type="button" id="btnSelesai" onclick="selesai(' . $data->ID_Cuti . ')" class="btn btn-success btn-sm"><i class="material-icons">not_interested</i></button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center d-inline">
                                        <form action="'. url('/pengajuan/cuti/cetak/' . $data->ID_Cuti) .'" method="POST">
                                            ' . csrf_field() . '
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="material-icons">print</i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        ';

                        return $cuti;
                       
                    })
                    ->rawColumns(['Cetak', 'Status'])
                    ->make(true);
        }
        
        return view('PengajuanCuti.lihat');

    }

    public function cetakPengajuan($id)
    {
        // $cuti = Cuti::find(9);
        $cuti = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang', 'pegawai.Jabatan', 'pegawai.Alamat', 'pegawai.Atasan' , 'pegawai.Divisi')
                ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                ->where('cuti.ID_Cuti', '=', $id)
                ->first();

        $jumlahHari = $this->dateBetween($cuti->Tanggal_Mulai, $cuti->Tanggal_Berakhir);

        $pdf = PDF::loadView('PengajuanCuti.print', compact('cuti', 'jumlahHari'))
                    ->setPaper('a4');
        // return $pdf->stream('surat-pengajuan' . date('Y-m-d_H-i-s'). '.pdf');
        return $pdf->download('surat-pengajuan-cuti' . date('Y-m-d_H-i-s'). '.pdf');
    }

    public function dateBetween($dateStart, $dateEnd)
    {
        $startTimeStamp = strtotime($dateStart);
        $endTimeStamp = strtotime($dateEnd);

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff/86400;  // 86400 seconds in one day
        
        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        return $numberDays;
    }

    public function selesaiCuti($id)
    {
        $cuti = Cuti::find($id);
        $cuti->Status = 2;
        $cuti->save();
        return $cuti;
    }

}
