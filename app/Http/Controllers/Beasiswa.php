<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Tingkatan;
use App\Models\Beasiswa as dbBeasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Beasiswa extends Controller
{
    public function directToIndexBeasiswa(Request $request)
    {
        $TotalDatas = dbBeasiswa::all()->count();
        $DataBeasiswa = dbBeasiswa::with('instansi')->orderBy('created_at', 'desc')->get();

        if ($request->Filter == 'Nama Beasiswa') {
            $DataBeasiswa = dbBeasiswa::where('nama_beasiswa', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'Instansi Beasiswa') {
            $DataBeasiswa = dbBeasiswa::whereHas('instansi', function ($query) use ($request) {
                $query->where('nama_instansi', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'Link Beasiswa') {
            $DataBeasiswa = dbBeasiswa::where('link_pendaftaran', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get();
        }

        return view('admin.beasiswa.IndexData', [
            'Datas' => $DataBeasiswa,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToIndexHistoryBeasiswa(Request $request)
    {
        $DataBeasiswa = dbBeasiswa::with('Instansi')->onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        $TotalDatas = dbBeasiswa::onlyTrashed()->count();
        return view('admin.beasiswa.IndexHistoryData', [
            'Datas' => $DataBeasiswa,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToCreateBeasiswa(Request $request)
    {
        $DataInstansi = Instansi::find($request->IdInstansi);
        $Tingkatan = Tingkatan::all();
        return view('admin.beasiswa.CreateData', [
            'DataInstansi' => $DataInstansi,
            'Tingkatan' => $Tingkatan,
        ]);
    }

    public function StoreDataBeasiswa(Request $request)
    {
        $ValidateData = $request->validate([
            'IdInstansi' => ['required'],
            'NamaBeasiswa' => ['required', 'max:100', 'min:5'],
            'LinkPendaftaran' => ['required', 'min:3'],
            'TanggalPendaftaran' => ['required'],
            'TanggalPenutupan' => ['required'],
            'Tingkatan' => ['required'],
            'Persyaratan' => ['required'],
            'FotoBeasiswa' => ['required', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);
        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $ValidateData['FotoBeasiswa'] = $request->file('FotoBeasiswa')->store('\Beasiswa', 'public');

        dbBeasiswa::create([
            'nama_beasiswa' => $ValidateData['NamaBeasiswa'],
            'instansi_id' => $ValidateData['IdInstansi'],
            'link_pendaftaran' => $ValidateData['LinkPendaftaran'],
            'persyaratan' => $ValidateData['Persyaratan'],
            'tanggal_pendaftaran' => $ValidateData['TanggalPendaftaran'],
            'tanggal_penutupan' => $ValidateData['TanggalPenutupan'],
            'foto_beasiswa' => $ValidateData['FotoBeasiswa'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'status_id' => 1,
            'admin_id' => $ValidateData['Administrator'],
        ]);
        return redirect(route('Beasiswa.Index'))->with('InstansiSuccessAdded', 'Data Instansi Telah Berhasil Di Tambahkan');
    }

    public function directToDetailBeasiswa(Request $request)
    {
        $BeasiswaRelation = ['Tingkatan', 'Instansi', 'Status', 'Admin'];

        $DataBeasiswa = dbBeasiswa::find($request->id);
        $DataBeasiswa->load($BeasiswaRelation);

        return view('admin.beasiswa.DetailData', [
            'Data' => $DataBeasiswa
        ]);
    }

    public function DeleteBeasiswa(Request $request)
    {
        $DataPicker = dbBeasiswa::find($request->IdBeasiswa);
        $DataPicker->update([
            'status_id' => 2,
        ]);
        $DataPicker->delete();
        session()->flash('Success', 'Data Prestasi Telah Di Hapus');
        return redirect(route('Beasiswa.Index'));
    }

    public function EditBeasiswa(Request $request)
    {
        $BeasiswaRelation = ['Tingkatan', 'Instansi', 'Status', 'Admin'];

        $DataBeasiswa = dbBeasiswa::find($request->IdObject)->load($BeasiswaRelation);
        $DataInstansi = Instansi::find($request->IdInstansi);
        $DataTingkatan = Tingkatan::all();

        $PendaftaranParshed = Carbon::createFromFormat('d-m-Y', $DataBeasiswa->tanggal_pendaftaran)->format('Y-m-d');
        $PenutupanParshed = Carbon::createFromFormat('d-m-Y', $DataBeasiswa->tanggal_penutupan)->format('Y-m-d');
        return view('admin.beasiswa.EditData', [
            'DataBeasiswa' => $DataBeasiswa,
            'TanggalPendaftaran' => $PendaftaranParshed,
            'TanggalPenutupan' => $PenutupanParshed,
            'DataInstansi' => $DataInstansi,
            'Tingkatan' => $DataTingkatan,
        ]);
    }

    public function UpdateBeasiswa(Request $request)
    {
        $ValidateData = $request->validate([
            'IdInstansi' => ['required'],
            'NamaBeasiswa' => ['required', 'max:100', 'min:3'],
            'LinkPendaftaran' => ['required', 'min:3'],
            'TanggalPendaftaran' => ['required'],
            'TanggalPenutupan' => ['required'],
            'Tingkatan' => ['required'],
            'Persyaratan' => ['required'],
            'FotoBeasiswa' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);
        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $DataPicker = dbBeasiswa::find($request->IdBeasiswa);
        $DataPicker->update([
            'nama_beasiswa' => $ValidateData['NamaBeasiswa'],
            'instansi_id' => $ValidateData['IdInstansi'],
            'link_pendaftaran' => $ValidateData['LinkPendaftaran'],
            'persyaratan' => $ValidateData['Persyaratan'],
            'tanggal_pendaftaran' => $ValidateData['TanggalPendaftaran'],
            'tanggal_penutupan' => $ValidateData['TanggalPenutupan'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'status_id' => 1,
            'admin_id' => $ValidateData['Administrator'],
        ]);
        if ($request->has('FotoBeasiswa')) {
            $ValidateData['FotoBeasiswa'] = $request->file('FotoBeasiswa')->store('\Beasiswa', 'public');
            $DataPicker->update([
                'foto_beasiswa' => $ValidateData['FotoBeasiswa'],
            ]);
        }
        return redirect(route('Beasiswa.Detail', ['id' => $DataPicker]));
    }

    public function RestoreBeasiswa(Request $request)
    {
        $DataPicker = dbBeasiswa::withTrashed()->find($request->IdBeasiswa);
        $DataPicker->restore();

        session()->flash('Success', 'Data Prestasi Telah Di Kembalikan');

        return redirect(route('Beasiswa.Index'));
    }
}
