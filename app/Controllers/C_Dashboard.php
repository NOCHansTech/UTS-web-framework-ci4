<?php

namespace App\Controllers;

use App\Models\M_Keuangan;

class C_Dashboard extends BaseController
{
    protected $Bio;

    public function __construct()
    {
        $this->Bio = new M_Keuangan();
    }

    public function index()
    {
        $data = [
            'title'        => 'Home | Tugas UTS',
            'page'         => 'dashboard',
            'keuanganData' => $this->Bio->getData()
        ];

        return view('dashboard', $data);
    }

    public function tambahData()
    {
        // Mengambil data dari form
        $data = [
            'tanggal'            => $this->request->getPost('tgl'),
            'jenis_transaksi'    => $this->request->getPost('jt'),
            'kategori'           => $this->request->getPost('kategori'),
            'deskripsi'          => $this->request->getPost('deskripsi'),
            'jumlah'             => $this->request->getPost('jumlahNumeric'),
            'metode_pembayaran'  => $this->request->getPost('payment'),
            'status'             => $this->request->getPost('status')
        ];

        $this->Bio->tambahData($data);

        return redirect()->to('/');
    }


    public function detailData($transaksi)
    {
        $detailData = $this->Bio->getDetailData($transaksi);

        return $this->response->setJSON($detailData);
    }
}
