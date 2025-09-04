<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

use App\Models\Criteria;
use App\Models\Credit;
use App\Models\User;

use App\Models\Settings;
use Illuminate\Support\Facades\Hash;

use App\Models\PublikasiKarya;
use App\Models\Pengabdian;
use App\Models\PoinCreditUmum;
use App\Models\PoinCreditJenis;
use App\Models\PoinCreditCapaian;
use App\Models\PoinCreditKegiatan;

use App\Models\ProgramStudi;
use App\Models\CreditPengajaran;

use Illuminate\Support\Carbon;
use App\Models\LogPengguna;

class Controller extends BaseController
{
    public function get_user(Request $request){
        try {
            $token = $request->cookie('token');

            if (!$token) {
                return response()->json(['message' => 'Token not found'], 400);
            }

            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }

        return $user;
    }
    public function home(Request $request){
        $user = $this->get_user($request);

        if($user && isset($user->role)){
            $role =  $user->role;
            if($role === 'admin'){
                return redirect('/admin');
            }else if($role === 'staf'){
                return redirect('/staf');
            }
            return redirect('/dosen');
        }

        // auto redirect to login page
        return redirect('/login');
    }
    public function profile(Request $request){
        $user = $this->get_user($request);

        if(!$user){
            return redirect('/login');
        }
        
        $id = $user->id;

        if($request->isMethod('post')){
            $data = $request->all();

            if(!empty($data['new_password'])){
                $data['password'] = Hash::make($data['new_password']);
            }

            if($data['aktif'] === 'aktif'){
                $data['aktif'] = true;
            }else{
                $data['aktif'] = false;
            }

            // creating the billboard data
            $user = User::find($id);
            if($user){
                $user->update($data);
            }
            LogPengguna::create([
                'user_id'=>$user->id,
                'aktivitas'=>'Mengubah Data Profil',
                'keterangan'=>'Mengubah data profil akun'
            ]);
            return redirect('/profile');
        }else{
            $akun = User::find($id)->toArray();
            $settings = Settings::find(1);
            return view('layouts.app', [
                'title'=>'Edit Akun',
                'user'=>$user,
                'akun'=>$akun,
                'settings'=>$settings,
                'content'=>resource_path('views/profile.blade.php')
            ]);
        }
    }
}
