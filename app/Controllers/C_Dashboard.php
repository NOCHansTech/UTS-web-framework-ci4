<?php

namespace App\Controllers;

use App\Models\M_Keuangan;

class C_Dashboard extends BaseController
{
    protected $Bio;

    public function __construct()
    {
        // Inisialisasi model M_Biodata
        $this->Bio = new M_Keuangan();
    }

    public function index()
    {
        $data = [
            'title'        => 'Home | Tugas UTS',
            'page'         => 'dashboard',
            'keuanganData' => $this->Bio->getData() // Pastikan ini mengembalikan data yang valid
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

        // Menambahkan data ke database
        $this->Bio->tambahData($data);

        // Redirect ke halaman index (dashboard) setelah menambahkan data
        return redirect()->to('/');
    }


    public function detailData($transaksi)
    {
        // Mengambil data profil mahasiswa dari model 'Bio' berdasarkan transaksi
        $detailData = $this->Bio->getDetailData($transaksi);

        // Mengembalikan data profil dalam format JSON sebagai respons
        return $this->response->setJSON($detailData);
    }
}
