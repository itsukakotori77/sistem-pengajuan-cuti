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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query
        $data = User::latest()->get();

        // Datatables
        if($request->ajax())
        {
            // return datatables
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('avatar', function($data){
                            $avatar = '';
                    
                            if($data->avatar == NULL)
                                $avatar = '<div class="text-center"><img src="' . asset('asset/images/foto-user/user.png') . '"alt="" style="width: 70px; border-radius: 50%;"></div>';
                            else 
                                $avatar = '<div class="text-center"><img src="'. asset('asset/images/foto-user/' . $data->avatar) .'"alt="" style="width: 70px; border-radius: 50%;"></div>';

                            return $avatar;
                        })
                        ->editColumn('role', function($data){
                            $role = '';

                            if($data->role == 1)
                                $role = 'Direktur';
                            elseif($data->role == 2)
                                $role = 'Manager';
                            elseif($data->role == 3)
                                $role = 'Keuangan';
                            elseif($data->role == 4)
                                $role = 'Purchasing';
                            else 
                                $role = 'Administrasi';

                            return $role;
                        })
                        ->editColumn('status', function($data){
                            $status = '';

                            if($data->status == 1)
                                $status = '<div class="text-center"><span class="label label-success">Aktif</span></div>';
                            else 
                                $status = '<div class="text-center"><span class="label label-danger">Tidak Aktif</span></div>';
                            
                            return $status;

                        })
                        ->addColumn('aksi', function($data){
                            // Variable Public
                            $status = '';

                            // Condition
                            if($data->status == 1)
                                $status = '<div class="text-center"> 
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">loop</i></button>
                                                    <ul class="dropdown-menu" style="margin-left: -60px;">
                                                        <li><a onclick="statusAktif(' . $data->id . ')">Tidak Aktif</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            ';
                            else 
                                $status = '<div class="text-center"> 
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">loop</i></button>
                                                    <ul class="dropdown-menu" style="margin-left: -60px;">
                                                        <li><a onclick="statusAktif(' . $data->id . ')">Aktif</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            ';

                            return $status;
                        })
                        ->rawColumns(['avatar', 'status', 'aksi'])
                        ->make(true);
        }

        return view('User.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::latest()->get();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $pegawai = Pegawai::where('user_id', '=', $id)->first();

        return view('Otentikasi.profile', compact('user', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->Username;

        if($request->Password != '')
            $user->password = Hash::make($request->Password);

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
            $user->avatar = $avatar;
        } 
        $user->save();

        return back()->with('message', 'Update profile telah selesai dilakukan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubahStatus($id)
    {
        // Queyr
        $user = User::find($id);
        
        // Condition
        if($user->status == 1)
            $user->status = 0;
        else 
            $user->status = 1;
        
        $user->save();

        return $user;
    }
}
