<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use App\Cuti;
use App\Pegawai;
use App\Perizinan;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Perizinan::latest()->get();

        if($request->ajax())
        {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('Catatan', function($data){
                        $catatan = $data->Catatan;

                        if($data->Catatan == '')
                            $catatan = 'kosong';
                        
                        return $catatan;
                    })
                    ->editColumn('Status_Perizinan', function($data){
                        $status = '';

                        if($data->Status_Perizinan == 1)
                            $status = '<div class="text-center"><span class="label label-success">Disetujui</span></div>';
                        else 
                            $status = '<div class="text-center"><span class="label label-danger">Tidak Disetujui</span></div>';
                        
                        return $status;
                    })
                    ->editColumn('Tanggal_Persetujuan', function($data){
                        return date('d F Y', strtotime($data->Tanggal_Persetujuan));
                    })
                    ->addColumn('Aksi', function($data){
                        return 
                            '<div class="text-center">
                                <form action="'. url('/pengajuan/cuti/cetak/' . $data->Cuti_ID) .'" method="POST">
                                    ' . csrf_field() . '
                                    <button type="submit" class="btn btn-primary btn-xs"><i class="material-icons">print</i></button>
                                </form>
                            </div>';
                    })
                    ->rawColumns(['Aksi', 'Tanggal_Persetujuan', 'Status_Perizinan'])
                    ->make(true);
        }

        return view('Perizinan.index');
        // return $data;
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Perizinan  $perizinan
     * @return \Illuminate\Http\Response
     */
    public function show(Perizinan $perizinan)
    {
        //
    }

    public function perizinanCuti(Request $request, $id)
    {
        // Cuti
        $cuti = Cuti::find($request->Cuti_ID);
        if($request->Status_Perizinan == 1)
        {
            $cuti->Persetujuan = 2;
            $cuti->Status = 1;
        }else {
            $cuti->Persetujuan = 0;
            $cuti->Status = 3;
        }
        $cuti->save();

        // Perizinan
        $pegawai = Pegawai::where('user_id', '=', Auth::user()->id)->first();
        $request->request->add([
            'Tanggal_Persetujuan' => Carbon::now()->format('Y-m-d'),
            'Pemegang_Persetujuan' => $pegawai->Nama_Depan . ' ' . $pegawai->Nama_Belakang,
        ]);
        Perizinan::create($request->all());

        return True;
    }
}
