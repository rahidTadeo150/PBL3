<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryPrestasi;
use App\Models\Mahasiswa;
use App\Models\MahasiswaPrestasi;
use App\Models\Prestasi;
use App\Models\Tingkatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PrestasiMahasiswa extends Controller
{
    public function DirectToIndexPrestasi(Request $request)
    {
        if (empty($request->search)) {
            $DataPrestasi = MahasiswaPrestasi::with('Mahasiswa')->orderBy('created_at', 'desc')->get();
        }
        $TotalDatas = MahasiswaPrestasi::all()->count();

        if ($request->Filter == 'Nama Mahasiswa') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Mahasiswa', function ($query) use ($request) {
                $query->where('nama_mahasiswa', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'nim') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Mahasiswa', function ($query) use ($request) {
                $query->where('nim', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->Filter == 'Nama Perlombaan') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Prestasi', function ($query) use ($request) {
                $query->where('nama_perlombaan', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'desc')->get();
        }

        return view('admin.Prestasi.IndexData', [
            'Datas' => $DataPrestasi,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToIndexHistoryPrestasi()
    {
        $DataPrestasi = MahasiswaPrestasi::with('Mahasiswa')->orderBy('created_at', 'desc')->onlyTrashed()->get();
        $TotalDatas = MahasiswaPrestasi::onlyTrashed()->count();

        return view('admin.Prestasi.IndexHistoryData', [
            'Datas' => $DataPrestasi,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function SelectionMahasiswa()
    {
        $DataMahasiswa = Mahasiswa::with('Prodi')->orderBy('created_at', 'desc')->get();
        $TotalDatas = Mahasiswa::all()->count();

        return view('admin.Prestasi.SelectMahasiswa', [
            'Datas' => $DataMahasiswa,
            'TotalDatas' => $TotalDatas,
        ]);
    }

    public function directToCreatePrestasi(Request $request)
    {
        $DataMahasiswa = Mahasiswa::find($request->IdMahasiswa);
        $Tingkatan = Tingkatan::all();
        $CategoryPerlombaan = CategoryPrestasi::all();

        return view('admin.Prestasi.CreateData', [
            'DataMahasiswa' => $DataMahasiswa,
            'Tingkatan' => $Tingkatan,
            'Category' => $CategoryPerlombaan,
        ]);
    }

    public function StoreDataPrestasi(Request $request)
    {
        $ValidateData = $request->validate([
            'IdMahasiswa' => ['required'],
            'NamaPerlombaan' => ['required', 'max:200', 'min:4'],
            'UrutanPrestasi' => ['required', 'min:5', 'max:50'],
            'TanggalPerlombaan' => ['required'],
            'Tingkatan' => ['required'],
            'CategoryPerlombaan' => ['required'],
            'FotoPrestasi' => ['required', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);

        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $ValidateData['FotoPrestasi'] = $request->file('FotoPrestasi')->store('/Prestasi');

        $CreatePrestasi = Prestasi::firstOrCreate([
            'nama_perlombaan' => ucwords(strtolower($ValidateData['NamaPerlombaan'])),
            'tanggal_perlombaan' => $ValidateData['TanggalPerlombaan'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'category_prestasi_id' => $ValidateData['CategoryPerlombaan'],
            'foto_bukti_prestasi' => 'unavailable',
        ]);
        $CreatePrestasi->update([
            'foto_bukti_prestasi' => $ValidateData['FotoPrestasi'],
        ]);

        session()->flash('Success', 'Data Prestasi Telah Di Tambahkan');

        MahasiswaPrestasi::create([
            'mahasiswa_id' => $ValidateData['IdMahasiswa'],
            'prestasi_id' => $CreatePrestasi->id,
            'posisi_juara' => $ValidateData['UrutanPrestasi'],
            'admin_id' => $ValidateData['Administrator'],
        ]);

        return redirect(route('Prestasi.Index'))->with('InstansiSuccessAdded', 'Data Instansi Telah Berhasil Di Tambahkan');
    }

    public function DeletePrestasi(Request $request)
    {
        $DataPicker = MahasiswaPrestasi::find($request->IdPrestasi);

        $DataPicker->delete();

        Prestasi::leftJoin('mahasiswa_prestasi', 'prestasi.id', '=', 'mahasiswa_prestasi.prestasi_id')->whereNull('mahasiswa_prestasi.prestasi_id')->delete();

        session()->flash('Success', 'Data Prestasi Telah Di Hapus');

        return redirect(route('Prestasi.Index'));
    }

    public function EditPrestasi(Request $request)
    {
        $DataPrestasi = MahasiswaPrestasi::find($request->IdPrestasi);
        if ($request->ChangesMahasiswa) {
            $DataMahasiswa = Mahasiswa::find($request->IdMahasiswa);
        } else {
            $DataMahasiswa = Mahasiswa::find($DataPrestasi->Mahasiswa->id);
        }

        $Tingkatan = Tingkatan::all();
        $CategoryPerlombaan = CategoryPrestasi::all();

        return view('admin.Prestasi.EditData', [
            'Data' => $DataPrestasi,
            'DataMahasiswa' => $DataMahasiswa,
            'Tingkatan' => $Tingkatan,
            'Category' => $CategoryPerlombaan,
        ]);
    }

    public function UpdatePrestasi(Request $request)
    {
        $ValidateData = $request->validate([
            'IdMahasiswa' => ['required'],
            'IdPrestasi' => ['required'],
            'IdEdit' => ['required'],
            'NamaPerlombaan' => ['required', 'max:200', 'min:4'],
            'UrutanPrestasi' => ['required', 'min:5', 'max:50'],
            'TanggalPerlombaan' => ['required'],
            'Tingkatan' => ['required'],
            'CategoryPerlombaan' => ['required'],
            'FotoPrestasi' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);

        $ValidateData['Administrator'] = auth('Admin')->user()->id;
        $PrestasiPicker = Prestasi::find($ValidateData['IdPrestasi']);
        $MahasiswaPrestasiPicker = MahasiswaPrestasi::find($ValidateData['IdEdit']);

        $PrestasiPicker->update([
            'mahasiswa_id' => $ValidateData['IdMahasiswa'],
            'nama_perlombaan' => $ValidateData['NamaPerlombaan'],
            'tanggal_perlombaan' => $ValidateData['TanggalPerlombaan'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'category_prestasi_id' => $ValidateData['CategoryPerlombaan'],
        ]);

        if ($request->has('FotoPrestasi')) {
            Storage::delete($PrestasiPicker->foto_bukti_prestasi);
            $ValidateData['FotoPrestasi'] = $request->file('FotoPrestasi')->store('/Prestasi');
            $PrestasiPicker->update([
                'foto_bukti_prestasi' => $ValidateData['FotoPrestasi'],
            ]);
        }
        $Mahasiswa = Mahasiswa::find($ValidateData['IdMahasiswa']);

        if (!$Mahasiswa) {
            session()->flash('Error', 'Mahasiswa tidak ditemukan');
            return redirect()->back();
        }
        $PrestasiPicker = Prestasi::find($ValidateData['IdPrestasi']);
        $Mahasiswa = $PrestasiPicker->mahasiswaPrestasi()->find($ValidateData['IdEdit'])->mahasiswa;

        $MahasiswaPrestasiPicker->update([
            'prestasi_id' => $PrestasiPicker->id,
            'posisi_juara' => $ValidateData['UrutanPrestasi'],
        ]);

        session()->flash('Success', 'Data Prestasi Telah Di Edit');

        return redirect(route('Prestasi.Index', ['IdPrestasi' => $MahasiswaPrestasiPicker->id]));
    }

    public function RestorePrestasi(Request $request)
    {
        $PrestasiPicker = Prestasi::withTrashed()->find($request->IdPrestasi);
        $MahasiswaPrestasiPicker = MahasiswaPrestasi::withTrashed()->find($request->IdMahasiswaPrestasi);

        $PrestasiPicker->restore();
        $MahasiswaPrestasiPicker->restore();

        session()->flash('Success', 'Data Prestasi Telah Di Kembalikan');
        return redirect(route('Prestasi.Index'));
    }
}
