<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\Lomba;
use App\Models\MahasiswaPrestasi;
use App\Models\Prestasi;
use App\Models\RequestPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPanel extends Controller
{
    public function directToLogin (Request $request) {
        return view('admin.loginAdmin');
    }
    public function directToDashboard (Request $request) {
        $HighlighBeasiswa = Beasiswa::with('Instansi')->orderBy('created_at', 'desc')->take(1)->get();
        $HighlighLomba = Lomba::with('Instansi')->orderBy('created_at', 'desc')->take(2)->get();
        $NewNotification = RequestPrestasi::with('Mahasiswa')->orderBy('created_at', 'desc')->take(4)->get();

        $HighlighBeasiswa->each(function ($HighlighBeasiswa) {
            $HighlighBeasiswa->foto = $HighlighBeasiswa->foto_beasiswa;
            $HighlighBeasiswa->nama_event = $HighlighBeasiswa->nama_beasiswa;
            $HighlighBeasiswa->Routing = 'Beasiswa.Detail';
        });
        $HighlighLomba->each(function ($HighlighLomba) {
            $HighlighLomba->foto = $HighlighLomba->foto_lomba;
            $HighlighLomba->nama_event = $HighlighLomba->nama_perlombaan;
            $HighlighLomba->Routing = 'Lomba.Detail';
        });

        $MergeData = $HighlighBeasiswa->merge($HighlighLomba);

        $NonaktifBeasiswa = Beasiswa::with('Instansi')->orderBy('deleted_at', 'desc')->onlyTrashed()->take(1)->get();
        $NonaktifLomba = Lomba::with('Instansi')->orderBy('deleted_at', 'desc')->onlyTrashed()->take(2)->get();

        $NonaktifBeasiswa->each(function ($NonaktifBeasiswa) {
            $NonaktifBeasiswa->foto = $NonaktifBeasiswa->foto_beasiswa;
            $NonaktifBeasiswa->nama_event = $NonaktifBeasiswa->nama_beasiswa;
            $NonaktifBeasiswa->Routing = 'Beasiswa.Detail';
        });
        $NonaktifLomba->each(function ($NonaktifLomba) {
            $NonaktifLomba->foto = $NonaktifLomba->foto_lomba;
            $NonaktifLomba->nama_event = $NonaktifLomba->nama_perlombaan;
            $NonaktifLomba->Routing = 'Lomba.Detail';
        });

        $MergeDataNonaktif = $NonaktifBeasiswa->mergeRecursive($NonaktifLomba);


        return view('admin.dashboardadmin', [
            'RecentNew' => $MergeData,
            'NewNotification' => $NewNotification,
            'Nonaktif' => $MergeDataNonaktif
        ]);
    }
    public function directToDetailEvent (Request $request) {
        return view('admin.detailEvent');
    }
    public function directToIndexNotification (Request $request) {
        $RequestUnread = RequestPrestasi::with('Mahasiswa')->orderBy('created_at', 'desc')->get();
        return view('admin.notification.indexNotification', [
            'RequestUnread' => $RequestUnread,
        ]);
    }

    public function directToDetailNotification (Request $request) {
        $DataRequest = RequestPrestasi::with('Mahasiswa')->find($request->IdRequest, 'id')->first();
        return view('admin.notification.DetailPrestasiNotification', [
            'DataRequest' => $DataRequest,
        ]);
    }

    public function AcceptRequest (Request $request) {
        $DataRequest = RequestPrestasi::with('Mahasiswa')->find($request->IdRequest, 'id')->first();

        $sourcePath = $DataRequest->foto_bukti_prestasi;
        $destinationPath = 'app/public/Prestasi/' . basename($sourcePath);
        Storage::disk('public')->put($destinationPath, file_get_contents(storage_path('app/public/'.$sourcePath)));
        Storage::delete($DataRequest->foto_bukti_prestasi);

        $Administrator = auth('Admin')->user()->id;

        $CreatePrestasi = Prestasi::firstOrCreate([
            'nama_perlombaan' => ucwords(strtolower($DataRequest->nama_perlombaan)),
            'tanggal_perlombaan' => $DataRequest->tanggal_perlombaan,
            'tingkatan_id' => $DataRequest->Tingkatan->id,
            'category_prestasi_id' => $DataRequest->Category->id,
            'foto_bukti_prestasi' => 'unavailable',
        ]);

        $CreatePrestasi->update([
            'foto_bukti_prestasi' => 'Prestasi/' . basename($sourcePath),
        ]);


        MahasiswaPrestasi::create([
            'mahasiswa_id' => $DataRequest->mahasiswa_id,
            'prestasi_id' => $CreatePrestasi->id,
            'posisi_juara' => ucwords(strtolower($DataRequest->posisi_juara)),
            'admin_id' => $Administrator,
        ]);

        $DataRequest->delete();

        session()->flash('Success', 'Data Prestasi Telah Di Inputkan');

        return redirect(route('Dashboard.Notification'));
    }

    public function RejectRequest (Request $request) {
        $DataRequest = RequestPrestasi::with('Mahasiswa')->find($request->IdRequest, 'id')->first();
        Storage::delete($DataRequest->foto_bukti_prestasi);
        $DataRequest->delete();
        session()->flash('Success', 'Data Pengajuan Prestasi Telah Di Tolak');
        return redirect(route('Dashboard.Notification'));
    }
}
