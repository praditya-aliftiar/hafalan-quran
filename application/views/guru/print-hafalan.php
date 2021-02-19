<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .header {
            text-align: center;
            margin-top: -6px;
        }

        .main {
            color: darkblue;
            margin-top: 10px;
        }

        .table {
            margin: auto;
            border-collapse: collapse;
            table-layout: fixed;
            width: 560px;
        }

        .table th {
            text-align: center;
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }
    </style>

</head>

<body>
    <h2 class="header main">SMA ISLAM AL-LAYYINAH</h2>
    <h4 class="header">Laporan Hafalan Al-qur'an</h4>
    <p class="header"><?php echo $label ?></p>
    <hr> <br> <br>

    <table class="table" border="1" style="margin-top: 10px;">
        <tr>
            <th>Tanggal</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Surah</th>
            <th>Keterangan</th>
        </tr>

        <?php
        if (empty($hafalan)) { // Jika data tidak ada
            echo "<tr><td colspan='7' class='text-center'>Data tidak ada</td></tr>";
        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            foreach ($hafalan as $h) { // Looping hasil data transaksi
                $tgl = date('d-M-Y', strtotime($h->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr>";
                echo "<td style='width: 80px;' class='text-center'>" . $tgl . "</td>";
                echo "<td style='width: 80px;' class='text-center'>" . $h->nis . "</td>";
                echo "<td style='width: 100px;'>" . $h->nama . "</td>";
                echo "<td style='width: 100px;'>" . $h->kelas . "</td>";
                echo "<td style='width: 100px;'>" . $h->surah . "</td>";
                echo "<td style='width: 100px;'>" . $h->keterangan . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>