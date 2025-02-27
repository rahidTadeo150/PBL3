<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Instansi as dbInstansi;
use Illuminate\Http\Request;


class Instansi extends Controller
{
    public function directToIndex(Request $request)
    {
        $DataInstansiBeasiswa = dbInstansi::all();
        $TotalData = dbInstansi::all()->count();

        if ($request->Filter == 'Nama Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('nama_instansi', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Alamat Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('alamat', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Nomor Telephone') {
            $DataInstansiBeasiswa = dbInstansi::where('no_telephone', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Email Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('email', 'like', '%' . $request->search . '%')->get();
        }

        return view('admin.Instansi.IndexData', [
            'Datas' => $DataInstansiBeasiswa,
            'TotalData' => $TotalData,
        ]);
    }

    public function SelectionInstansiBeasiswa(Request $request)
    {
        $DataInstansiBeasiswa = dbInstansi::all();
        $TotalData = dbInstansi::all()->count();
        if ($request->Lomba) {
            $RouteIdentity = 'Lomba';
        } else if ($request->Beasiswa) {
            $RouteIdentity = 'Beasiswa';
        }

        if ($request->Filter == 'Nama Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('nama_instansi', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Alamat Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('alamat', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Nomor Telephone') {
            $DataInstansiBeasiswa = dbInstansi::where('no_telephone', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Email Instansi') {
            $DataInstansiBeasiswa = dbInstansi::where('email', 'like', '%' . $request->search . '%')->get();
        }

        return view('admin.Instansi.SelectInstansi', [
            'Datas' => $DataInstansiBeasiswa,
            'TotalData' => $TotalData,
            'RouteIdentity' => $RouteIdentity,
        ]);
    }

    public function directToCreateInstansiBeasiswa(Request $request)
    {
        return view('admin.Instansi.CreateData');
    }

    public function StoreDataInstansi(Request $request)
    {
        $ValidateData = $request->validate([
            'NamaInstansi' => ['required', 'max:62', 'min:3'],
            'NoTelephone' => ['required', 'max:13', 'min:11', 'regex:/^[0-9]+$/'],
            'Alamat' => ['required', 'max:100', 'min:10'],
            'Email' => ['required', 'max:62', 'min:5', 'email:rfc,dns'],
            'FotoInstansi' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);
        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        if ($request->FotoInstansi != null) {
            $ValidateData['FotoInstansi'] = $request->file('FotoInstansi')->store('Instansi', 'public');
        } else {
            $ValidateData['FotoInstansi'] = '\DefaultDatas\BeasiswaInstansi\DefaultProfiles.jpg';
        }
        dbInstansi::create([
            'nama_instansi' => $ValidateData['NamaInstansi'],
            'no_telephone' => $ValidateData['NoTelephone'],
            'email' => $ValidateData['Email'],
            'alamat' => $ValidateData['Alamat'],
            'foto_profile' => $ValidateData['FotoInstansi'],
            'account_admin_id' => $ValidateData['Administrator'],
        ]);

        session()->flash('Success', 'Data Prestasi Telah Di Tambahkan');

        return redirect(route('Instansi.Index'))->with('InstansiSuccessAdded', 'Data Instansi Telah Berhasil Di Tambahkan');
    }

    public function DeleteInstansi($id)
    {
        $instansi = dbInstansi::find($id);

        if ($instansi) {
            $instansi->delete();
            return redirect()->route('Instansi.Index')->with('success', 'Instansi berhasil dihapus.');
        } else {
            return redirect()->route('Instansi.Index')->with('error', 'Instansi tidak ditemukan.');
        }
    }

    public function EditInstansi(Request $request)
    {
        $InstansiRelation = ['Admin'];
        $Instansi = dbInstansi::find($request->IdInstansi);
        if (!$Instansi) {
            return redirect(route('Instansi.Index'))->withErrors(['error' => 'Data Instansi tidak ditemukan']);
        }

        return view('admin.Instansi.EditData', [
            'Instansi' => $Instansi,
        ]);
    }
    public function UpdateInstansi(Request $request)
    {
        $ValidateData = $request->validate([
            'NamaInstansi' => ['required', 'max:62', 'min:3'],
            'NoTelephone' => ['required', 'max:13', 'min:11', 'regex:/^[0-9]+$/'],
            'Alamat' => ['required', 'max:100', 'min:10'],
            'Email' => ['required', 'max:62', 'min:5', 'email:rfc,dns'],
            'FotoInstansi' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);

        $Instansi = dbInstansi::find($request->IdInstansi);

        if (!$Instansi) {
            return redirect(route('Instansi.Index'))->withErrors(['error' => 'Data Instansi tidak ditemukan']);
        }

        $ValidateData['Administrator'] = auth('Admin')->user()->id;

        if ($request->has('FotoInstansi')) {
            $ValidateData['FotoInstansi'] = $request->file('FotoInstansi')->store('/Instansi', 'public');
            $Instansi->update(['foto_profile' => $ValidateData['FotoInstansi']]);
        }

        $Instansi->update([
            'nama_instansi' => $ValidateData['NamaInstansi'],
            'no_telephone' => $ValidateData['NoTelephone'],
            'email' => $ValidateData['Email'],
            'alamat' => $ValidateData['Alamat'],
            'account_admin_id' => $ValidateData['Administrator'],
        ]);

        return redirect(route('Instansi.Index'))->with('Success', 'Data Instansi Berhasil Diperbarui');
    }
}
