<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\Lomba;
use App\Models\RequestPrestasi;
use Illuminate\Http\Request;

class AdminPanel extends Controller
{
    public function directToLogin (Request $request) {
        return view('admin.loginAdmin');
    }
    public function directToDashboard (Request $request) {
        $HighlighBeasiswa = Beasiswa::with('Instansi')->orderBy('created_at', 'desc')->take(1)->get();
        $HighlighLomba = Lomba::with('Instansi')->orderBy('created_at', 'desc')->take(2)->get();

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
        return view('admin.notification.DetailNotification');
    }
}
