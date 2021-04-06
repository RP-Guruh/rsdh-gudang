<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\adminModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\penawaranModel;
use App\Models\pesananModel;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->adminModel = new adminModel();
        $this->penawaranModel = new penawaranModel();
        $this->pesananModel = new pesananModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'penawaran' => $this->penawaranModel->index(),
            'barang' => $this->adminModel->index(),

        ];

        return view('admin_rsdh.Dashboard', $data);
    }
}
