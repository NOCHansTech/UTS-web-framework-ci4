<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Keuangan extends Model
{
    public function getData()
    {
        $query = $this->db->table('keuangan')
            ->select('*')
            ->get();

        return $query->getResultArray();
    }

    public function tambahData($data)
    {
        return $this->db->table('keuangan')
            ->insert($data);
    }
    public function getDetailData($transaksi)
    {
        return $this->db->table('keuangan')
            ->select('*')
            ->where('id_transaksi', $transaksi)
            ->get()->getResultArray();
    }
}
