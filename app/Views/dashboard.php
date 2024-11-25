<?= $this->extend('layout'); ?>

<?= $this->section('main_content'); ?>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <table class="table mb-0 table-hover align-middle table-striped nowrap" style="width:100%" id="tableBio">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No</th>
                                    <th class="border-top-0">Jenis Transaksi</th>
                                    <th class="border-top-0">Kategori</th>
                                    <th class="border-top-0">Jumlah</th>
                                    <th class="border-top-0">Payment By</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <?php
                                $no = 1;
                                foreach ($keuanganData as $row): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <label class="m-b-0 font-16"><?= esc($row['jenis_transaksi']) ?></label>
                                        </td>
                                        <td><?= esc($row['kategori']) ?></td>
                                        <td>
                                            <label class="m-b-0"><?= 'Rp ' . number_format($row['jumlah'], 0, ',', '.') ?></label>
                                        </td>
                                        <td>
                                            <label class="badge bg-success"><?= esc($row['metode_pembayaran']) ?></label>
                                        </td>

                                        <td>
                                            <?php if ($row['status'] == 'Pending'): ?>
                                                <label class="badge bg-warning"><?= esc($row['status']) ?></label>
                                            <?php elseif ($row['status'] == 'Selesai'): ?>
                                                <label class="badge bg-success"><?= esc($row['status']) ?></label>
                                            <?php else : ?>
                                                <label class="badge bg-danger"><?= esc($row['status']) ?></label>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <!-- View Button -->
                                            <span data-bs-toggle="modal" data-bs-target="#modalLihat">
                                                <a href="#" class="btn btn-primary btn-icon btn-sm btn-view"
                                                    data-transaksi="<?= esc($row['id_transaksi']) ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Lihat">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                    </svg>
                                                </a>
                                            </span>

                                            <!-- Update Button -->
                                            <span data-bs-toggle="modal" data-bs-target="#modalUpdate">
                                                <a href="#" class="btn btn-warning btn-icon btn-update btn-sm" data-transaksi="" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Update">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 20h9"></path>
                                                        <path d="M12 4l0 16"></path>
                                                        <path d="M16 8l-4 4"></path>
                                                        <path d="M8 12l4 -4"></path>
                                                    </svg>
                                                </a>
                                            </span>

                                            <!-- Delete Button -->
                                            <span>
                                                <a href="#" class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus" id="btnHapus-" data-transaksi="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                </a>
                                            </span>

                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Modal Lihat  -->
<!-- ============================================================== -->
<div class="modal modal-blur fade" id="modalLihat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="container-xl mt-3 mb-3">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <div>
                                        <input id="profilTgl" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Transaksi</label>
                                    <div>
                                        <input id="profilJt" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <div>
                                        <input id="profilKategori" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <div>
                                        <textarea id="profilDeskripsi" class="form-control" readonly></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Jumlah</div>
                                    <div>
                                        <input id="profilJl" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Metode</label>
                                    <div>
                                        <input id="profilMetode" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input id="profilStatus" class="form-control" readonly></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger ms-auto" data-bs-dismiss="modal">
                    Tutup
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-view').on('click', function() {
            const transaksi = $(this).data('transaksi');

            $.get('detailData/' + transaksi, function(response) {

                // Mengonversi jumlah yang berupa string ke number dan memformatnya sebagai mata uang
                const jumlahFormatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0 // Menghilangkan angka desimal
                }).format(parseFloat(response[0].jumlah));

                // Menampilkan data dalam modal
                $('#profilTgl').val(response[0].tanggal);
                $('#profilJt').val(response[0].jenis_transaksi);
                $('#profilKategori').val(response[0].kategori);
                $('#profilDeskripsi').val(response[0].deskripsi);
                $('#profilJl').val(jumlahFormatted); // Menampilkan jumlah yang sudah diformat
                $('#profilMetode').val(response[0].metode_pembayaran);
                $('#profilStatus').val(response[0].status);

                // Menampilkan modal
                $('#modalLihat').modal('show');
            });
        });
    });
</script>


<!-- ============================================================== -->
<!-- End Modal Lihat  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Modal Tambah Data -->
<!-- ============================================================== -->
<div class="modal modal-blur fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="mt-3" method="post" action="tambahData">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data</h3>
                                </div>

                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label required">Tanggal</label>
                                        <div>
                                            <input type="date" name="tgl" class="form-control" placeholder="Masukkan Tanggal" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Jenis Transaksi</div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="jt" value="Pemasukan" required>
                                                <span class="form-check-label">Pemasukan</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="jt" value="Pengeluaran" required>
                                                <span class="form-check-label">Pengeluaran</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Kategori</label>
                                        <div>
                                            <select name="kategori" class="form-select" required>
                                                <option value="">Pilih Kategori</option>
                                                <option value="Transfer">Gaji</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Belanja">Belanja</option>
                                                <option value="Transportasi">Transportasi</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" required>Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" rows="5" placeholder="Masukkan alamat lengkap" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Jumlah</label>
                                        <div>
                                            <input type="text" name="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
                                            <!-- Input tersembunyi untuk menyimpan nilai numerik murni -->
                                            <input type="hidden" name="jumlahNumeric" id="jumlahNumeric">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Metode Pembayaran</label>
                                        <div>
                                            <select name="payment" class="form-select" required>
                                                <option value="">Pilih Payment</option>
                                                <option value="Transfer">Transfer</option>
                                                <option value="Tunai">Tunai</option>
                                                <option value="Katrtu Kredit">Katrtu Kredit</option>
                                                <option value="E-Wallet">E-Wallet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Status</label>
                                        <div>
                                            <select name="status" class="form-select" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Selesai">Selesai</option>
                                                <option value="Batal">Batal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jumlahInput = document.querySelector('input[name="jumlah"]');
        const jumlahNumericInput = document.getElementById('jumlahNumeric');

        // Fungsi untuk memformat angka dengan format Rupiah
        function formatRupiah(value) {
            const numberString = value.replace(/[^0-9]/g, '');
            const formatted = new Intl.NumberFormat('id-ID').format(numberString);
            return `Rp ${formatted}`;
        }

        // Fungsi untuk mengupdate nilai numerik tersembunyi
        function updateNumericValue(value) {
            const numericValue = value.replace(/[^0-9]/g, ''); // Mengambil angka saja
            jumlahNumericInput.value = numericValue; // Menyimpan nilai numerik
        }

        // Event listener untuk input jumlah
        jumlahInput.addEventListener('input', function(e) {
            let value = e.target.value;
            value = formatRupiah(value); // Memformat angka menjadi Rupiah
            e.target.value = value;
            updateNumericValue(value); // Update nilai numerik
        });
    });
</script>

<!-- ============================================================== -->
<!-- End Tambah Data -->
<!-- ============================================================== -->
<?= $this->endSection(); ?>