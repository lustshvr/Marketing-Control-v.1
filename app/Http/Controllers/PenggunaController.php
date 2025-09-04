<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\Settings;

use App\Models\LogPengguna;
use App\Models\Modul;
use App\Models\CalonKlien;
use App\Models\AktivitasProspek;
use App\Models\Klien;
use App\Models\PenggunaanModul;
use App\Models\TagihanKlien;
use App\Models\Notifikasi;
use App\Exports\CalonKlienExport;
use App\Exports\KlienExport;
use App\Exports\AktivitasProspekExport;
use App\Exports\ModulExport;
use App\Exports\PenggunaanModulExport;
use App\Exports\TagihanKlienExport;
use App\Exports\NotifikasiExport;
use App\Exports\LogPenggunaExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;

class PenggunaController extends BaseController
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
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }

        $klien = Klien::count();
        $calon_klien = CalonKlien::count();
        $modul = Modul::count();
        $pengguna = User::where('peran','pengguna')->count();


        $settings = Settings::find(1);
        return view('layouts.app', [
            'title'=>'Admin: Dashboard',
            'user'=>$user,
            'klien'=>$klien,
            'calon_klien'=>$calon_klien,
            'modul'=>$modul,
            'pengguna'=>$pengguna,
            'settings'=>$settings,
            'content'=>resource_path('views/pengguna/home/index.blade.php')
        ]);
    }
    public function modul(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                // creating the billboard data
                $modul = Modul::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Modul',
                    'keterangan'=>'Menambahkan data modul baru '.$data['nama']
                ]);
                return redirect('/pengguna/modul');
            }else{
                $settings = Settings::find(1);
                return view('layouts.app', [
                    'title'=>'Admin: Modul Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'content'=>resource_path('views/pengguna/modul/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $modul = Modul::find($id);
                    if($modul){
                        $modul->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Modul',
                        'keterangan'=>'Mengubah data modul '.$data['nama']
                    ]);
                    return redirect('/pengguna/modul?t=edit&id='.$id);
                }else{
                    $modul = Modul::find($id)->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Modul',
                        'user'=>$user,
                        'modul'=>$modul,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/modul/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/jabatan');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $modul = Modul::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Modul',
                    'keterangan'=>'Menghapus data modul '.$data['nama']
                ]);
                if($modul){
                    $modul->delete();
                }
            }
            return redirect('/pengguna/modul');
        }else{
            $settings = Settings::find(1);
            $modul = Modul::all()->toArray();
            foreach($modul as $index => $item){
                $modul[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $modul[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Master Modul',
                'user'=>$user,
                'settings'=>$settings,
                'modul'=>$modul,
                'content'=>resource_path('views/pengguna/modul/index.blade.php')
            ]);
        }
    }
    public function calon_klien(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                // creating the billboard data
                $calon_klien = CalonKlien::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Calon Klien',
                    'keterangan'=>'Menambahkan data calon klien baru '.$data['nama']
                ]);
                return redirect('/pengguna/calon-klien');
            }else{
                $settings = Settings::find(1);
                return view('layouts.app', [
                    'title'=>'Admin: Calon Klien Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'content'=>resource_path('views/pengguna/calon-klien/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $calon_klien = CalonKlien::find($id);
                    if($calon_klien){
                        $calon_klien->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Calon Klien',
                        'keterangan'=>'Mengubah data calon klien '.$data['nama']
                    ]);
                    return redirect('/pengguna/calon-klien?t=edit&id='.$id);
                }else{
                    $calon_klien = CalonKlien::find($id)->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Calon Klien',
                        'user'=>$user,
                        'calon_klien'=>$calon_klien,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/calon-klien/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/jabatan');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $calon_klien = CalonKlien::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Calon Klien',
                    'keterangan'=>'Menghapus data calon klien '.$data['nama']
                ]);
                if($calon_klien){
                    $calon_klien->delete();
                }
            }
            return redirect('/pengguna/calon-klien');
        }else{
            $settings = Settings::find(1);
            $calon_klien = CalonKlien::all()->toArray();
            foreach($calon_klien as $index => $item){
                $calon_klien[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $calon_klien[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Data Calon Klien',
                'user'=>$user,
                'settings'=>$settings,
                'calon_klien'=>$calon_klien,
                'content'=>resource_path('views/pengguna/calon-klien/index.blade.php')
            ]);
        }
    }
    public function aktivitas_prospek(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                $data['user_id'] = $user->id;
                // creating the billboard data
                $aktivitas_prospek = AktivitasProspek::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Aktivitas Prospek',
                    'keterangan'=>'Menambahkan data aktivitas prospek'
                ]);
                return redirect('/pengguna/aktivitas-prospek');
            }else{
                $settings = Settings::find(1);
                $calon_klien = CalonKlien::all()->toArray();
                return view('layouts.app', [
                    'title'=>'Admin: Aktivitas Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'calon_klien'=>$calon_klien,
                    'content'=>resource_path('views/pengguna/aktivitas-prospek/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $aktivitas_prospek = AktivitasProspek::find($id);
                    if($aktivitas_prospek){
                        $aktivitas_prospek->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Aktivitas Prospek',
                        'keterangan'=>'Mengubah data aktivitas prospek'
                    ]);
                    return redirect('/pengguna/aktivitas-prospek?t=edit&id='.$id);
                }else{
                    $aktivitas_prospek = AktivitasProspek::find($id)->toArray();
                    $calon_klien = CalonKlien::all()->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Aktivitas',
                        'user'=>$user,
                        'aktivitas_prospek'=>$aktivitas_prospek,
                        'settings'=>$settings,
                        'calon_klien'=>$calon_klien,
                        'content'=>resource_path('views/pengguna/aktivitas-prospek/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/jabatan');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $aktivitas_prospek = AktivitasProspek::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Aktivitas Prospek',
                    'keterangan'=>'Menghapus data aktivitas prospek'
                ]);
                if($aktivitas_prospek){
                    $aktivitas_prospek->delete();
                }
            }
            return redirect('/pengguna/aktivitas-prospek');
        }else{
            $settings = Settings::find(1);
            $aktivitas_prospek = AktivitasProspek::with(['calon','user'])->where('user_id', $user->id)->get()->toArray();
            foreach($aktivitas_prospek as $index => $item){
                $aktivitas_prospek[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $aktivitas_prospek[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Data Aktivitas Prospek',
                'user'=>$user,
                'settings'=>$settings,
                'aktivitas_prospek'=>$aktivitas_prospek,
                'content'=>resource_path('views/pengguna/aktivitas-prospek/index.blade.php')
            ]);
        }
    }
    public function klien(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                // creating the billboard data
                $klien = Klien::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Klien Baru',
                    'keterangan'=>'Menambahkan data data klien '.$data['nama']
                ]);
                return redirect('/pengguna/klien');
            }else{
                $settings = Settings::find(1);
                return view('layouts.app', [
                    'title'=>'Admin: Klien Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'content'=>resource_path('views/pengguna/klien/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $klien = Klien::find($id);
                    if($klien){
                        $klien->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Klien',
                        'keterangan'=>'Mengubah data data klien '.$data['nama']
                    ]);
                    return redirect('/pengguna/klien?t=edit&id='.$id);
                }else{
                    $klien = Klien::find($id)->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Calon Klien',
                        'user'=>$user,
                        'klien'=>$klien,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/klien/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/klien');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $klien = Klien::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Klien',
                    'keterangan'=>'Menghapus data data klien '.$data['nama']
                ]);
                if($klien){
                    $klien->delete();
                }
            }
            return redirect('/pengguna/klien');
        }else{
            $settings = Settings::find(1);
            $klien = Klien::all()->toArray();
            foreach($klien as $index => $item){
                $klien[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $klien[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Data Klien',
                'user'=>$user,
                'settings'=>$settings,
                'klien'=>$klien,
                'content'=>resource_path('views/pengguna/klien/index.blade.php')
            ]);
        }
    }
    public function penggunaan_modul(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                // creating the billboard data
                $penggunaan_modul = PenggunaanModul::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Penggunaan Modul',
                    'keterangan'=>'Menambahkan data penggunaan modul '.$data['catatan']
                ]);
                return redirect('/pengguna/penggunaan-modul');
            }else{
                $settings = Settings::find(1);
                $modul = Modul::all()->toArray();
                $klien = Klien::all()->toArray();
                return view('layouts.app', [
                    'title'=>'Admin: Penggunaan Modul Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'klien'=>$klien,
                    'modul'=>$modul,
                    'content'=>resource_path('views/pengguna/penggunaan-modul/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $penggunaan_modul = PenggunaanModul::find($id);
                    if($penggunaan_modul){
                        $penggunaan_modul->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Penggunaan Modul',
                        'keterangan'=>'Mengubah data penggunaan modul '.$data['catatan']
                    ]);
                    return redirect('/pengguna/penggunaan-modul?t=edit&id='.$id);
                }else{
                    $penggunaan_modul = PenggunaanModul::find($id)->toArray();
                    $modul = Modul::all()->toArray();
                    $klien = Klien::all()->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Penggunaan Modul',
                        'user'=>$user,
                        'klien'=>$klien,
                        'modul'=>$modul,
                        'penggunaan_modul'=>$penggunaan_modul,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/penggunaan-modul/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/klien');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $penggunaan_modul = PenggunaanModul::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Penggunaan Modul',
                    'keterangan'=>'Menghapus data penggunaan modul '.$data['catatan']
                ]);
                if($penggunaan_modul){
                    $penggunaan_modul->delete();
                }
            }
            return redirect('/pengguna/penggunaan-modul');
        }else{
            $settings = Settings::find(1);
            $penggunaan_modul = PenggunaanModul::with(['klien','modul'])->get()->toArray();
            foreach($penggunaan_modul as $index => $item){
                $penggunaan_modul[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $penggunaan_modul[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Penggunaan Modul',
                'user'=>$user,
                'settings'=>$settings,
                'penggunaan_modul'=>$penggunaan_modul,
                'content'=>resource_path('views/pengguna/penggunaan-modul/index.blade.php')
            ]);
        }
    }
    public function tagihan_klien(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                // creating the billboard data
                $tagihan_klien = TagihanKlien::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Tagihan Klien',
                    'keterangan'=>'Menambahkan data tagihan klien'
                ]);
                return redirect('/pengguna/tagihan-klien');
            }else{
                $settings = Settings::find(1);
                $klien = Klien::all()->toArray();
                return view('layouts.app', [
                    'title'=>'Admin: Tagihan Klien Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'klien'=>$klien,
                    'content'=>resource_path('views/pengguna/tagihan-klien/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    // creating the billboard data
                    $tagihan_klien = TagihanKlien::find($id);
                    if($tagihan_klien){
                        $tagihan_klien->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Tagihan Klien',
                        'keterangan'=>'Mengubah data tagihan klien'
                    ]);
                    return redirect('/pengguna/tagihan-klien?t=edit&id='.$id);
                }else{
                    $tagihan_klien = TagihanKlien::with(['klien'])->find($id)->toArray();
                    $klien = Klien::all()->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Tagihan Klien',
                        'user'=>$user,
                        'klien'=>$klien,
                        'tagihan_klien'=>$tagihan_klien,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/tagihan-klien/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/klien');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $tagihan_klien = TagihanKlien::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Tagihan Klien',
                    'keterangan'=>'Menghapus data tagihan klien'
                ]);
                if($tagihan_klien){
                    $tagihan_klien->delete();
                }
            }
            return redirect('/pengguna/tagihan-klien');
        }else{
            $settings = Settings::find(1);
            $tagihan_klien = TagihanKlien::with(['klien'])->get()->toArray();
            foreach($tagihan_klien as $index => $item){
                $tagihan_klien[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $tagihan_klien[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
            }
            return view('layouts.app', [
                'title'=>'Admin: Data Tagihan Klien',
                'user'=>$user,
                'settings'=>$settings,
                'tagihan_klien'=>$tagihan_klien,
                'content'=>resource_path('views/pengguna/tagihan-klien/index.blade.php')
            ]);
        }
    }
    public function notifikasi_tagihan(Request $request){
        $user = $this->get_user($request);
        if(!$user){
            return redirect('/login');
        }

        if($user->peran !== 'pengguna'){
            return redirect('/'.$user->peran);
        }
        $mode = $request->input('t','');

        if($mode === 'add'){
            if($request->isMethod('post')){
                $data = $request->all();
                if($data['status'] === 'Terkirim'){
                    $data['terkirim_pada'] = Carbon::now();
                }
                $notifikasi = Notifikasi::create($data);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menambahkan Data Notifikasi Tagihan',
                    'keterangan'=>'Menambahkan data notifikasi tagihan klien'
                ]);
                return redirect('/pengguna/notifikasi-tagihan');
            }else{
                $settings = Settings::find(1);
                $tagihan_klien = TagihanKlien::with(['klien'])->get()->toArray();
                return view('layouts.app', [
                    'title'=>'Admin: Notifikasi Tagihan Baru',
                    'user'=>$user,
                    'settings'=>$settings,
                    'tagihan_klien'=>$tagihan_klien,
                    'content'=>resource_path('views/pengguna/notifikasi-tagihan/add.blade.php')
                ]);
            }
        }elseif($mode === 'edit'){
            $id = $request->input('id', null);
            if($id){
                if($request->isMethod('post')){
                    $data = $request->all();
                    if($data['status'] === 'Terkirim'){
                        $data['terkirim_pada'] = Carbon::now();
                    }
                    // creating the billboard data
                    $notifikasi = Notifikasi::find($id);
                    if($notifikasi){
                        $notifikasi->update($data);
                    }
                    LogPengguna::create([
                        'user_id'=>$user->id,
                        'aktivitas'=>'Mengubah Data Notifikasi Tagihan',
                        'keterangan'=>'Mengubah data notifikasi tagihan klien'
                    ]);
                    return redirect('/pengguna/notifikasi-tagihan?t=edit&id='.$id);
                }else{
                    $notifikasi = Notifikasi::with(['tagihan.klien'])->find($id)->toArray();
                    $settings = Settings::find(1);
                    return view('layouts.app', [
                        'title'=>'Admin: Edit Tagihan Klien',
                        'user'=>$user,
                        'notifikasi'=>$notifikasi,
                        'settings'=>$settings,
                        'content'=>resource_path('views/pengguna/notifikasi-tagihan/edit.blade.php')
                    ]);
                }
            }
            return redirect('/pengguna/klien');
        }elseif($mode === 'delete'){
            $id = $request->input('id', null);
            if($id){
                $notifikasi_tagihan = Notifikasi::find($id);
                LogPengguna::create([
                    'user_id'=>$user->id,
                    'aktivitas'=>'Menghapus Data Notifikasi Tagihan',
                    'keterangan'=>'Menghapus data notifikasi tagihan klien'
                ]);
                if($notifikasi_tagihan){
                    $notifikasi_tagihan->delete();
                }
            }
            return redirect('/pengguna/notifikasi-tagihan');
        }else{
            $settings = Settings::find(1);
            $notifikasi_tagihan = Notifikasi::with(['tagihan.klien'])->get()->toArray();
            foreach($notifikasi_tagihan as $index => $item){
                $notifikasi_tagihan[$index]['created_at'] = date('d-m-Y H:i:s', strtotime($item['created_at']));
                $notifikasi_tagihan[$index]['updated_at'] = date('d-m-Y H:i:s', strtotime($item['updated_at']));
                if(isset($notifikasi_tagihan[$index]['terkirim_pada'])){
                    $notifikasi_tagihan[$index]['terkirim_pada'] = date('d-m-Y H:i:s', strtotime($item['terkirim_pada']));
                }else{
                    $notifikasi_tagihan[$index]['terkirim_pada'] = '-';
                }
            }
            return view('layouts.app', [
                'title'=>'Admin: Data Notifikasi Tagihan',
                'user'=>$user,
                'settings'=>$settings,
                'notifikasi_tagihan'=>$notifikasi_tagihan,
                'content'=>resource_path('views/pengguna/notifikasi-tagihan/index.blade.php')
            ]);
        }
    }

    public function exportCalonKlien(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'calon_klien_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new CalonKlienExport, $filename);
    }

    public function exportKlien(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'klien_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new KlienExport, $filename);
    }

    public function exportAktivitasProspek(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'aktivitas_prospek_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new AktivitasProspekExport, $filename);
    }

    public function exportModul(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'modul_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new ModulExport, $filename);
    }

    public function exportPenggunaanModul(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'penggunaan_modul_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new PenggunaanModulExport, $filename);
    }

    public function exportTagihanKlien(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'tagihan_klien_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new TagihanKlienExport, $filename);
    }

    public function exportNotifikasi(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'notifikasi_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new NotifikasiExport, $filename);
    }

    public function exportLogPengguna(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filename = 'log_pengguna_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new LogPenggunaExport, $filename);
    }

    public function catatan(Request $request)
    {
        $user = $this->get_user($request);
        if (!$user) {
            return redirect('/login');
        }

        if ($user->peran !== 'pengguna') {
            return redirect('/' . $user->peran);
        }

        $filter = $request->input('filter', 'semua');
        $settings = Settings::find(1);

        // Get data based on filter
        $data = [];

        if ($filter === 'semua' || $filter === 'calon_klien') {
            $calon_klien = CalonKlien::all();
            foreach ($calon_klien as $item) {
                $data[] = [
                    'id' => $item->id,
                    'jenis' => 'Calon Klien',
                    'nama' => $item->nama,
                    'catatan' => $item->catatan ?? '-',
                    'pembuat' => 'System',
                    'tanggal' => $item->created_at,
                    'status' => $item->tahap ?? '-'
                ];
            }
        }

        if ($filter === 'semua' || $filter === 'klien') {
            $klien = Klien::all();
            foreach ($klien as $item) {
                $data[] = [
                    'id' => $item->id,
                    'jenis' => 'Klien',
                    'nama' => $item->nama,
                    'catatan' => $item->catatan ?? '-',
                    'pembuat' => 'System',
                    'tanggal' => $item->created_at,
                    'status' => $item->jenjang ?? '-'
                ];
            }
        }

        if ($filter === 'semua' || $filter === 'prospek') {
            $aktivitas_prospek = AktivitasProspek::with(['calon', 'user'])->get();
            foreach ($aktivitas_prospek as $item) {
                $data[] = [
                    'id' => $item->id,
                    'jenis' => 'Aktivitas Prospek',
                    'nama' => $item->calon ? $item->calon->nama : '-',
                    'catatan' => $item->catatan ?? '-',
                    'pembuat' => $item->user ? $item->user->nama : '-',
                    'tanggal' => $item->created_at,
                    'status' => $item->jenis ?? '-'
                ];
            }
        }

        return view('layouts.app', [
            'title' => 'Pengguna: Data Catatan',
            'user' => $user,
            'settings' => $settings,
            'data_catatan' => $data,
            'filter' => $filter,
            'content' => resource_path('views/pengguna/catatan/index.blade.php')
        ]);
    }
}
