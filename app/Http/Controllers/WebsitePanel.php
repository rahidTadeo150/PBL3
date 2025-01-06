<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\CategoryPrestasi;
use App\Models\Instansi;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\MahasiswaPrestasi;
use App\Models\RequestPrestasi;
use App\Models\Tingkatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebsitePanel extends Controller
{
    public function ShowListBeasiswa(Request $request)
    {
        $Relation = ['Instansi','Tingkatan'];
        $Beasiswa = Beasiswa::with($Relation)->find($request->id);
        $Highlight = Beasiswa::latest()->take(5)->get();

        if ($request->ListBy == 'Lokal') {
            $Beasiswa = Beasiswa::where('tingkatan_id', 1)->get();
        } else if ($request->ListBy == 'Internasional') {
            $Beasiswa = Beasiswa::where('tingkatan_id', 2)->get();
        } else {
            $Beasiswa = Beasiswa::all();
        }

        $BestInstansi = Instansi::withCount('Beasiswa')->orderBy('beasiswa_count', 'desc')->take(5)->get();
        if ($request->Filter == 'Nama Beasiswa') {
            $Beasiswa = Beasiswa::where('nama_beasiswa', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Instansi Beasiswa') {
            $Beasiswa = Beasiswa::whereHas('instansi', function ($query) use ($request) {
                $query->where('nama_instansi', 'like', '%' . $request->search . '%');
            })->get();
        }

        $Highlight->each(function ($Highlight) {
            $Highlight->foto = $Highlight->foto_beasiswa;
            $Highlight->nama_event = $Highlight->nama_beasiswa;
        });

        $Highlight->load($Relation);
        $Beasiswa->load($Relation);
        foreach ($Beasiswa as $data) {
            $data->foto_beasiswa = str_replace('\\', '/', $data->foto_beasiswa);
        }

        return view('Website.Beasiswa.IndexData', [
            'RoutingAt' => 'Beasiswa',
            'Highlight' => $Highlight,
            'Beasiswa' => $Beasiswa,
            'BestInstansi' => $BestInstansi,
        ]);
    }

    public function DetailBeasiswa(Request $request)
    {
        $Relation = ['Instansi', 'Tingkatan'];
        $Beasiswa = Beasiswa::with($Relation)->find($request->id);
        $Beasiswa->load($Relation);

        return view('Website.Beasiswa.DetailBeasiswa', [
            'Data' => $Beasiswa,
        ]);
    }

    public function ShowListLomba(Request $request)
    {
        $Relation = ['Instansi','Tingkatan'];
        $Lomba = Lomba::with($Relation)->find($request->id);
        $Highlight = Lomba::latest()->take(5)->get();

        if ($request->ListBy == 'Lokal') {
            $Lomba = Lomba::where('tingkatan_id', 1)->get();
        } else if ($request->ListBy == 'Internasional') {
            $Lomba = Lomba::where('tingkatan_id', 2)->get();
        } else {
            $Lomba = Lomba::all();
        }

        $BestInstansi = Instansi::withCount('Lomba')->orderBy('lomba_count', 'desc')->take(5)->get();
        if ($request->Filter == 'Nama Perlombaan') {
            $Lomba = Lomba::where('nama_perlombaan', 'like', '%' . $request->search . '%')->get();
        } else if ($request->Filter == 'Instansi Lomba') {
            $Lomba = Lomba::whereHas('Instansi', function ($query) use ($request) {
                $query->where('nama_instansi', 'like', '%' . $request->search . '%');
            })->get();
        }

        $Highlight->each(function ($Highlight) {
            $Highlight->foto = $Highlight->foto_lomba;
            $Highlight->nama_event = $Highlight->nama_perlombaan;
        });

        $Highlight->load($Relation);
        $Lomba->load($Relation);

        foreach ($Lomba as $data) {
            $data->foto_lomba = str_replace('\\', '/', $data->foto_lomba);
        }

        return view('Website.Lomba.IndexData', [
            'RoutingAt' => 'Lomba',
            'Highlight' => $Highlight,
            'Lomba' => $Lomba,
            'BestInstansi' => $BestInstansi,
        ]);
    }

    public function DetailLomba(Request $request)
    {
        $Relation = ['Instansi', 'Tingkatan'];
        $Lomba = Lomba::with($Relation)->find($request->id);
        $Lomba->load($Relation);

        return view('Website.Lomba.DetailLomba', [
            'Data' => $Lomba,
        ]);
    }

    public function ShowListPrestasi(Request $request)
    {
        $DataPrestasi = MahasiswaPrestasi::with('Prestasi', 'Mahasiswa')->orderBy('created_at', 'desc')->get();

        $BestMahasiswa = Mahasiswa::withCount('MahasiswaPrestasi')->orderBy('mahasiswa_prestasi_count', 'desc')->take(5)->get();

        if ($request->ListBy == 'Lokal') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Prestasi', function ($query) use ($request) {
                $query->where('tingkatan_id', 1);
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->ListBy == 'Internasional') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Prestasi', function ($query) use ($request) {
                $query->where('tingkatan_id', 2);
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->ListBy == 'Team') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Prestasi', function ($query) use ($request) {
                $query->where('category_prestasi_id', 2);
            })->orderBy('created_at', 'desc')->get();
        } else if ($request->ListBy == 'Individu') {
            $DataPrestasi = MahasiswaPrestasi::whereHas('Prestasi', function ($query) use ($request) {
                $query->where('category_prestasi_id', 1);
            })->orderBy('created_at', 'desc')->get();
        }
       
        foreach ($DataPrestasi as $data) {
            $data->foto_lomba = str_replace('\\', '/', $data->foto_lomba);
        }
        return view('Website.Prestasi.IndexData', [
            'Datas' => $DataPrestasi,
            'BestMahasiswa' => $BestMahasiswa
        ]);
    }

    public function RequestPrestasi(Request $request)
    {
        $Category = CategoryPrestasi::all();
        $Tingkatan = Tingkatan::all();
        return view('Website.Pengajuan.PengajuanPrestasi', [
            'Category' => $Category,
            'Tingkatan' => $Tingkatan
        ]);
    }

    public function SendingRequestPrestasi(Request $request)
    {
        $ValidateData = $request->validate([
            'IdMahasiswa' => ['required'],
            'NamaPerlombaan' => ['required', 'max:200', 'min:4'],
            'UrutanPrestasi' => ['required', 'min:4', 'max:100'],
            'TanggalPerlombaan' => ['required'],
            'Tingkatan' => ['required'],
            'CategoryPerlombaan' => ['required'],
            'FotoPrestasi' => ['required', 'image', 'mimes:jpeg,jpg,png', 'file', 'max:5120'],
        ]);

        $ValidateData['FotoPrestasi'] = $request->file('FotoPrestasi')->store('/Prestasi', 'public');

        $CreatePrestasi = RequestPrestasi::create([
            'mahasiswa_id' => $ValidateData['IdMahasiswa'],
            'nama_perlombaan' => ucwords(strtolower($ValidateData['NamaPerlombaan'])),
            'posisi_juara' => ucwords(strtolower($ValidateData['UrutanPrestasi'])),
            'tanggal_perlombaan' => $ValidateData['TanggalPerlombaan'],
            'tingkatan_id' => $ValidateData['Tingkatan'],
            'category_prestasi_id' => $ValidateData['CategoryPerlombaan'],
            'foto_bukti_prestasi' => $ValidateData['FotoPrestasi'],
        ]);

        session()->flash('Success', 'Request Anda Telah Di Kirim');

        return redirect(route('Website.LandingPage'));

    }
}
