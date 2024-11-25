CREATE TABLE keuangan (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATETIME NOT NULL,
    jenis_transaksi ENUM('Pemasukan', 'Pengeluaran') NOT NULL,
    kategori VARCHAR(100),
    deskripsi TEXT,
    jumlah DECIMAL(15, 2) NOT NULL,
    metode_pembayaran ENUM('Tunai', 'Transfer', 'Kartu Kredit', 'E-wallet') NOT NULL,
    status ENUM('Selesai', 'Pending', 'Batal') NOT NULL
);
