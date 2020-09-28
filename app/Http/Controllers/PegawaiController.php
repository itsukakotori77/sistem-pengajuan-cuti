<?php

namespace App\Http\Controllers;

use DataTables;
use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query
        $data = Pegawai::latest()->get();

        // Datatables
        if($request->ajax())
        {
            // Return Datatables
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('Nama', function($data){
                            return $data->Nama_Depan . ' ' . $data->Nama_Belakang;
                        })
                        ->editColumn('Foto', function($data){
                            $foto = '';
                            
                            if($data->Foto == NULL)
                                $foto = '<div class="text-center"><img src="' . asset('asset/images/foto-user/user.png') . '"alt="" style="width: 70px; border-radius: 50%;"></div>';
                            else 
                                $foto = '<div class="text-center"><img src="'. asset('asset/images/foto-user/' . $data->Foto) .'"alt="" style="width: 70px; border-radius: 50%;"></div>';

                            return $foto;
                        })
                        ->editColumn('Jenis_Kelamin', function($data){
                            $jenis_kelamin = '';

                            if($data->Jenis_Kelamin == 1)
                                $jenis_kelamin = 'Laki - laki';
                            else 
                                $jenis_kelamin = 'Perempuan';

                            return $jenis_kelamin;
                        })
                        ->editColumn('Jabatan', function($data){
                            $jabatan = '';
                            
                            if($data->Jabatan == 1)
                                $jabatan = 'Direktur';
                            elseif($data->Jabatan == 2)
                                $jabatan = 'Manager';
                            elseif($data->Jabatan == 3)
                                $jabatan = 'Keuangan';
                            elseif($data->Jabatan == 4)
                                $jabatan = 'Purchasing';
                            else 
                                $jabatan = 'Administrasi';

                            return $jabatan;
                        })
                        ->editColumn('Divisi', function($data){
                            $divisi = '';

                            if($data->Divisi == 1)
                                $divisi = 'Bubut';
                            elseif($data->Divisi == 2)
                                $divisi = 'Miling';
                            elseif($data->Divisi == 3)
                                $divisi = 'Pengelasan';
                            elseif($data->Divisi == 4)
                                $divisi = 'Pengecoran';
                            elseif($data->Divisi == 5)
                                $divisi = 'Perangkaian';
                            elseif($data->Divisi == 6)
                                $divisi = 'Gudang';
                            else 
                                $divisi = 'Operasional';
                            
                            return $divisi;
                        })
                        ->addColumn('aksi', function($data){
                            // return 'test';
                            
                            return '<div class="text-center">
                                        <a href="' . url('/pegawai/' . $data->ID_Pegawai) .  '" class="btn btn-info btn-xs waves-effect"><i class="material-icons">perm_identity</i></a> 
                                        <button class="btn bg-lime btn-xs waves-effect" onclick="updateData(' . $data->ID_Pegawai . ')"><i class="material-icons">edit</i></button> 
                                    </div>';
                            
                        })
                        ->rawColumns(['aksi', 'Foto'])
                        ->make(true);
        }
        
        return view('Pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validasi
        $request->validate([
            'Nama_Depan' => 'required|string',
            'Nama_Belakang' => 'required|string',
            'Jenis_Kelamin' => 'required|numeric',
            'Alamat' => 'required|string',
            'Tempat_Lahir' => 'required|string',
            'Tanggal_Lahir' => 'required',
            'Jabatan' => 'required|numeric',
            'Divisi' => 'required|numeric',
        ]);

        // User Objek Add
        $user = new User;
        $user->name = $request->Nama_Depan;
        $user->email = $request->Email;
        $user->password = Hash::make('pegawai123');
        $user->remember_token = Str::random(60);
        $user->role = $request->Jabatan;
        $user->status = 1;

        // Upload Gambar
        if($request->file('Foto_Avatar') == '') 
        {
            $avatar = NULL;
        } else {
            //Change Path of Picture
            $file = $request->file('Foto_Avatar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak; 

            // Croping Picture
            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(200, 200);
            $image_resize->save(public_path('asset/images/foto-user/' . $fileName));
            $avatar = $fileName;
        }
        $user->avatar = $avatar;
        $user->save();

        // Objek Pegawai
        $request->request->add(['user_id' => $user->id]);
        $request->request->add(['Foto' => $avatar]);
        $request->request->add(['Tanggal_Lahir' => Carbon::createFromFormat('d/m/Y', $request->Tanggal_Lahir)->format('Y-m-d')]);
        $pegawai = Pegawai::create($request->all());

        return $pegawai;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        $user = User::find($pegawai->user_id);

        return view('Pegawai.show', compact('pegawai', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return $pegawai;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->Nama_Depan = $request->Nama_Depan;
        $pegawai->Nama_Belakang = $request->Nama_Belakang;
        $pegawai->Jenis_Kelamin = $request->Jenis_Kelamin;
        $pegawai->Alamat = $request->Alamat;
        $pegawai->Tempat_Lahir = $request->Tempat_Lahir;
        $pegawai->Tanggal_Lahir = Carbon::createFromFormat('d/m/Y', $request->Tanggal_Lahir)->format('Y-m-d');
        $pegawai->Jabatan = $request->Jabatan;
        $pegawai->Divisi = $request->Divisi;
        $pegawai->Atasan = $request->Atasan;

        $user = User::find($pegawai->user_id);
        $user->role = $request->Jabatan;
        $user->save();

        // Upload Gambar
        if($request->file('Foto_Avatar') != '') 
        {
            //Change Path of Picture
            $file = $request->file('Foto_Avatar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak; 

            // Croping Picture
            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(200, 200);
            $image_resize->save(public_path('asset/images/foto-user/' . $fileName));
            $avatar = $fileName;
            $pegawai->Foto = $avatar;
        } 

        $pegawai->save();

        return $pegawai;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }

    public function getDataPegawai()
    {
        $pegawai = Pegawai::all();
        return $pegawai;
    }

    
}
