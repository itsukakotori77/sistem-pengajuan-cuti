<?php

namespace App\Http\Controllers;

use App\User;
use App\Cuti;
use App\Pegawai;
use App\Perizinan;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('layouts.master');
    }

    public function home()
    {
        // Query
        $cuti = Cuti::all();
        $pegawai = Pegawai::all();
        $perizinan = Perizinan::all();
        $employee = Pegawai::orderBy('ID_Pegawai', 'DESC')->take(5)->get();

        // Cuti Query
        $jenis_cuti = array(
            'cuti_tahunan' => count(Cuti::where('Jenis_Cuti', 1)->get()),
            'cuti_sakit' => count(Cuti::where('Jenis_Cuti', 2)->get()),
            'cuti_besar' => count(Cuti::where('Jenis_Cuti', 3)->get()),
            'cuti_bersama' => count(Cuti::where('Jenis_Cuti', 4)->get()),
            'cuti_penting' => count(Cuti::where('Jenis_Cuti', 5)->get()),
            'cuti_hamil' => count(Cuti::where('Jenis_Cuti', 6)->get()),
        );

        // $cutiTahunan = Cuti::where('Jenis_Cuti', 1)->get();
        // $cutiSakit = Cuti::where('Jenis_Cuti', 2)->get();
        // $cutiBesar = Cuti::where('Jenis_Cuti', 3)->get();
        // $cutiBersama = Cuti::where('Jenis_Cuti', 4)->get();
        // $cutiPenting = Cuti::where('Jenis_Cuti', 5)->get();
        // $cutiHamil = Cuti::where('Jenis_Cuti', 6)->get();

        return view('Home.home', compact('cuti', 'pegawai', 'perizinan', 'employee', 'jenis_cuti'));
        // return $jenis_cuti;
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('Otentikasi.profileFront', compact('user'));
    }
}
