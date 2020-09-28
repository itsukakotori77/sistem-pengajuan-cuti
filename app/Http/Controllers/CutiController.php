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

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $divisi = Pegawai::select('pegawai.Divisi')
                    ->leftJoin('users', 'users.id', '=', 'pegawai.user_id')
                    ->where('users.id', '=', Auth::user()->id)
                    ->first();

        $data = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang')
                    ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                    ->orderBy('ID_Cuti', 'DESC')
                    ->where('pegawai.Divisi', '=', $divisi->Divisi)
                    ->get();

        if($request->ajax())
        {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Nama_Pengaju', function($data){
                        return $data->Nama_Depan . ' ' . $data->Nama_Belakang;
                    })
                    ->editColumn('Tanggal_Pengajuan', function($data){
                        return '<div class="text-center">' . date('d - m -  Y', strtotime($data->Tanggal_Pengajuan)) . '</div>';
                    })
                    ->addColumn('Periode', function($data){
                        return date('d/m/Y', strtotime($data->Tanggal_Mulai)) . ' <strong>-</strong> ' .  date('d/m/Y', strtotime($data->Tanggal_Berakhir)); 
                    })
                    ->editColumn('Jenis_Cuti', function($data){
                        $jenis = '';

                        if($data->Jenis_Cuti == 1)
                            $jenis = '<div class="text-center">Cuti Tahunan</div>';
                        elseif($data->Jenis_Cuti == 2)
                            $jenis = '<div class="text-center">Cuti Sakit</div>';
                        elseif($data->Jenis_Cuti == 3)
                            $jenis = '<div class="text-center">Cuti Besar</div>';
                        elseif($data->Jenis_Cuti == 4)
                            $jenis = '<div class="text-center">Cuti Bersama</div>';
                        elseif($data->Jenis_Cuti == 5)
                            $jenis = '<div class="text-center">Cuti Penting</div>';
                        else 
                            $jenis = '<div class="text-center">Cuti Hamil</div>';

                        return $jenis;
                    })
                    ->editColumn('Persetujuan', function($data){
                        $persetujuan = '';

                        // Condition
                        if($data->Persetujuan == 1)
                            $persetujuan = '<div class="text-center"><span class="label label-default">Belum Disetujui</span></div>';
                        elseif($data->Persetujuan == 2)
                            $persetujuan = '<div class="text-center"><span class="label label-primary">Disetujui</span></div>';
                        else 
                            $persetujuan = '<div class="text-center"><span class="label label-danger">Tidak Disetujui</span></div>';
                        
                        return $persetujuan;
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
                    ->editColumn('Surat_Hamil', function($data){
                        $surat = '';

                        if($data->Surat_Hamil != '')
                            $surat = 
                            '
                                <div class="text-center">
                                    <a href="#" onclick="modalImg(' . $data->ID_Cuti . ')">
                                        <img src="' . asset('asset/images/surat-hamil/' . $data->Surat_Hamil) . '" alt="" style="width: 100px;">
                                    </a>
                                </div>
                            ';
                        else 
                            $surat = '<div class="text-center"><span class="label bg-deep-orange">Tidak ada surat hamil</span></div>';
                        
                        return $surat;
                        
                    })
                    ->addColumn('Aksi', function($data){
                        $button = '<div class="text-center"><button class="btn btn-primary btn-xs" onclick="status(' . $data->ID_Cuti . ')"><i class="material-icons">contacts</i></button></div>';

                        // if($data->Persetujuan == 1)
                        //     $button = '<div class="text-center"><button class="btn btn-primary btn-xs" onclick="status(' . $data->ID_Cuti . ')"><i class="material-icons">contacts</i></button></div>';
                        // else 
                        //     $button = '<div class="text-center"><button disabled class="btn btn-primary btn-xs" onclick="status(' . $data->ID_Cuti . ')"><i class="material-icons">contacts</i></button></div>';

                        return $button;
                    })
                    ->rawColumns(['Aksi', 'Jenis_Cuti', 'Persetujuan', 'Status', 'Tanggal_Pengajuan', 'Periode', 'Surat_Hamil'])
                    ->make(true);
        }

        return view('Cuti.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        return view('Pengajuan.pengajuan', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $cuti = Cuti::create($request->all());
        return redirect('/pengajuan/selesai');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang')
                    ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                    ->orderBy('ID_Cuti', 'DESC')
                    ->where('cuti.ID_Cuti' , '=', $id)
                    ->first();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        //
    }

    public function pengajuanSelesai()
    {
        return view('Pengajuan.selesai');
    }

    public function laporanDisetujui()
    {
        $cuti = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang', 'perizinan.Catatan')
                    ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                    ->rightJoin('perizinan', 'perizinan.Cuti_ID', '=', 'cuti.ID_Cuti')
                    ->where('cuti.Persetujuan', '=', 2)
                    ->get();

        $pdf = PDF::loadView('Cuti.report', compact('cuti'))
                    ->setPaper('a4');

        // return $pdf->stream('laporan-pengajuan' . date('Y-m-d_H-i-s'). '.pdf');
        return $pdf->download('laporan-pengajuan-cuti-disetujui' . date('Y-m-d_H-i-s'). '.pdf');
    }

    public function laporanTidakDisetujui()
    {
        $cuti = Cuti::select('cuti.*', 'pegawai.Nama_Depan', 'pegawai.Nama_Belakang', 'perizinan.Catatan')
                    ->leftJoin('pegawai', 'pegawai.ID_Pegawai', '=', 'cuti.Pegawai_ID')
                    ->rightJoin('perizinan', 'perizinan.Cuti_ID', '=', 'cuti.ID_Cuti')
                    ->where('cuti.Persetujuan', '=', 0)
                    ->get();

        $pdf = PDF::loadView('Cuti.report', compact('cuti'))
                    ->setPaper('a4');

        // return $pdf->stream('laporan-pengajuan' . date('Y-m-d_H-i-s'). '.pdf');
        return $pdf->download('laporan-pengajuan-cuti-tidak-disetujui' . date('Y-m-d_H-i-s'). '.pdf');
    }
}
