<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lomba as dbLomba;
use App\Models\Instansi;
use App\Models\Tingkatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Lomba extends Controller
{
    public function directToIndexLomba(Request $request)
    {
        $TotalDatas = dbLomba::all()->count();
        $DataLomba = dbLomba::with('Instansi')->orderBy('created_at', 'desc')->get();
        if ($request->Filter == 'Nama Perlombaan') {
            $DataLomba = dbLomba::where('nama_perlombaan', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'Instansi Perlombaan') {
            $DataLomba = dbLomba::whereHas('instansi', function ($query) use ($request) {
                $query->where('nama_instansi', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'Link Perlombaan') {
            $DataLomba = dbLomba::where('link_pendaftaran', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get();
        }

        return view('admin.Lomba.IndexData', [
            'Datas' => $DataLomba,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToIndexHistoryLomba()
    {
        $DataLomba = dbLomba::onlyTrashed()->get()->load('Instansi');
        $TotalDatas = dbLomba::onlyTrashed()->count();
        return view('admin.Lomba.IndexHistoryData', [
            'Datas' => $DataLomba,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToCreateLomba(Request $request)
    {
        $DataInstansi = Instansi::find($request->IdInstansi);
        $Tingkatan = Tingkatan::all();
        return view('admin.Lomba.CreateData', [
            'DataInstansi' => $DataInstansi,
            'Tingkatan' => $Tingkatan,
        ]);
    }

    public function StoreDataLomba(Request $request)
    {
        $ValidateData = $request->validate([
            'IdInstansi' => ['required'],
            'NamaPerlombaan' => ['required', 'max:100', 'min:5'],
            'LinkPendaftaran' => ['required', 'min:3'],
            'TanggalPendaftaran' => ['required'],
            'TanggalPenutupan' => ['required'],
            'Tingkatan' => ['required'],
            'Persyaratan' => ['required', 'min:10'],
            'FotoLomba' => ['required', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);
        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $ValidateData['FotoLomba'] = $request->file('FotoLomba')->store('\Lomba', 'public');
        dbLomba::create([
            'nama_perlombaan' => $ValidateData['NamaPerlombaan'],
            'instansi_id' => $ValidateData['IdInstansi'],
            'link_pendaftaran' => $ValidateData['LinkPendaftaran'],
            'persyaratan' => $ValidateData['Persyaratan'],
            'tanggal_pendaftaran' => $ValidateData['TanggalPendaftaran'],
            'tanggal_penutupan' => $ValidateData['TanggalPenutupan'],
            'foto_lomba' => $ValidateData['FotoLomba'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'status_id' => 1,
            'admin_id' => $ValidateData['Administrator'],
        ]);

        session()->flash('Success', 'Data Prestasi Telah Di Tambahkan');

        return redirect(route('Lomba.Index'))->with('InstansiSuccessAdded', 'Data Instansi Telah Berhasil Di Tambahkan');
    }

    public function directToDetailLomba(Request $request)
    {
        $LombaRelation = ['Tingkatan', 'Instansi', 'Status', 'Admin'];

        $DataLomba = dbLomba::find($request->id);
        $DataLomba->load($LombaRelation);

        return view('admin.Lomba.DetailData', [
            'Data' => $DataLomba
        ]);
    }

    public function EditLomba(Request $request)
    {
        $LombaRelation = ['Tingkatan', 'Instansi', 'Status', 'Admin'];

        $DataLomba = dbLomba::find($request->IdObject)->load($LombaRelation);
        $DataInstansi = Instansi::find($request->IdInstansi);
        $DataTingkatan = Tingkatan::all();

        $PendaftaranParshed = Carbon::createFromFormat('d-m-Y', $DataLomba->tanggal_pendaftaran)->format('Y-m-d');
        $PenutupanParshed = Carbon::createFromFormat('d-m-Y', $DataLomba->tanggal_penutupan)->format('Y-m-d');

        return view('admin.Lomba.EditData', [
            'DataLomba' => $DataLomba,
            'TanggalPendaftaran' => $PendaftaranParshed,
            'TanggalPenutupan' => $PenutupanParshed,
            'DataInstansi' => $DataInstansi,
            'Tingkatan' => $DataTingkatan,
        ]);
    }

    public function UpdateLomba(Request $request)
    {

        $ValidateData = $request->validate([
            'IdInstansi' => ['required'],
            'NamaPerlombaan' => ['required', 'max:100', 'min:5'],
            'LinkPendaftaran' => ['required', 'min:3'],
            'TanggalPendaftaran' => ['required'],
            'TanggalPenutupan' => ['required'],
            'Tingkatan' => ['required'],
            'Persyaratan' => ['required', 'min:10', 'max:255'],
            'FotoLomba' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);
        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $DataPicker = dbLomba::find($request->IdLomba);
        $DataPicker->update([
            'nama_perlombaan' => $ValidateData['NamaPerlombaan'],
            'instansi_id' => $ValidateData['IdInstansi'],
            'link_pendaftaran' => $ValidateData['LinkPendaftaran'],
            'persyaratan' => $ValidateData['Persyaratan'],
            'tanggal_pendaftaran' => $ValidateData['TanggalPendaftaran'],
            'tanggal_penutupan' => $ValidateData['TanggalPenutupan'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'status_id' => 1,
            'admin_id' => $ValidateData['Administrator'],
        ]);
        if ($request->has('FotoLomba')) {
            $ValidateData['FotoLomba'] = $request->file('FotoLomba')->store('\Lomba', 'public');
            $DataPicker->update([
                'foto_lomba' => $ValidateData['FotoLomba'],
            ]);
        }

        return redirect(route('Lomba.Detail', ['id' => $DataPicker]));
    }

    public function DeleteLomba(Request $request)
    {
        $DataPicker = dbLomba::find($request->IdLomba);

        $DataPicker->update([
            'status_id' => 2,
        ]);

        $DataPicker->delete();
        session()->flash('Success', 'Data Prestasi Telah Di Hapus');

        return redirect(route('Lomba.Index'));
    }

    public function RestoreLomba(Request $request)
    {
        $DataPicker = dbLomba::withTrashed()->find($request->IdLomba);

        $DataPicker->restore();

        session()->flash('Success', 'Data Prestasi Telah Di Kembalikan');

        return redirect(route('Lomba.Index'));
    }
}
