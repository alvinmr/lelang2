<?php
require_once("./dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$queryLaporan = mysqli_query($koneksi, "SELECT * FROM `tb_lelang` 
                                        JOIN `tb_barang` ON tb_lelang.id_barang = tb_barang.id_barang 
                                        JOIN `tb_petugas` ON tb_lelang.id_petugas = tb_petugas.id_petugas
                                        JOIN `tb_masyarakat` ON tb_lelang.id_user = tb_masyarakat.id_user");

$html = '<center><h3>Daftar Hasil Lelang</h3></center><hr/><br/>';
$html .= "<table border='1px' width='100%'>
    <tr>
        <th>Barang Lelang</th>
        <th>Tanggal Lelang</th>
        <th>Harga Awal</th>
        <th>Harga Akhir</th>
        <th>Pemenang</th>
        <th>Petugas</th>
        <th>Status</th>
    </tr>";

while ($row = mysqli_fetch_array($queryLaporan)) :
    $html .= "
<tr>
    <td>" . $row['nama_barang'] . "</td>
    <td>" . $row['tgl_lelang'] . "</td>
    <td>" . $row['harga_awal'] . "</td>
    <td>" . $row['harga_akhir'] . "</td>
    <td>" . $row['nama_lengkap'] . "</td>
    <td>" . $row['nama_petugas'] . "</td>
    <td>" . $row['status'] . "</td>
</tr>";

endwhile;

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Benerin masalah gagal render html table
ob_end_clean();
// Melakukan output file Pdf
$dompdf->stream('laporan_hasil_lelang.pdf');