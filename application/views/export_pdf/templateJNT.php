<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
        @page {
            margin: 1mm;

        }
        *{
            font-family: Arial;
        }
        table>tr>td{
            font-family: Arial, Helvetica, sans-serif;
        }
        p {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <?php foreach ($results as $result):?>
        <div style="border: 1px solid black;height: 200px;background-color: white;position: relative">

        <table style="width: 100%;border-bottom: 2px solid black;border-style: dotted">
            <tr>
                <td style="width: 50%;text-align: left;"><img style="width: 130px;" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO-01black.png" class="m-b-10" alt=""></td>
                <td style="width: 50%;text-align: right;"><img style="width: 50px;" src="https://backend.urbanco.co.id/kurir/jnt.png" class="m-b-10" alt=""></td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 5px;padding-right: 5px;">
            <tr>
                <!-- <td style="width: 50%;text-align: left;border: 1px solid black;text-align: center;">
                    <p></p>
                </td> -->
                <td style="width: 100%;text-align: right;border: 1px solid black;text-align: center;">
                    <p>No. Resi: <?= $result->resi?></p>
                </td>
            </tr>
        </table>

        <img src="https://admin.urbanco.co.id/assets/user/<?= $result->resi?>.jpg" alt="" style="width: 100%;height: 90px;object-fit: cover;position: absolute;">
        <table style="width: 100%;border-top: 2px solid black;border-style: dotted;margin-top: -20px;position: relative;background-color: white;">
            <tr>
                <td style="width: 50%;text-align: left;vertical-align: top;">
                    <p style="font-size: 10px;">Penerima: <?= $result->namaReceiver?></p>
                    <div style="display: flex;justify-content: space-around;">
                        <p style="font-size: 10px;">
                            <span style="border: 1px solid black;">HOME</span> <?= $result->phone?>
                        </p>
                        <p style="font-size: 10px;"><?= $result->object_pengiriman2->receiver_addr ? $result->object_pengiriman2->receiver_addr :$result->alamat.', Kecamatan '.$result->nama_kecamatan.', '.$result->nama_kabupaten.' , Provinsi '.$result->nama_provinsi?></p>
                    </div>

                </td>
                <td style="width: 50%;vertical-align: top;">
                    <p style="font-size: 10px;text-align: right;">Pengirim: URBAN&CO</p>
                    <p style="font-size: 10px;">0895330485417</p>
                    <p style="font-size: 10px;">Kab Bogor</p>

                </td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 5px;padding-right: 5px;">
            <tr>
                <!-- <td style="width: 50%;text-align: left;border: 1px solid black;text-align: center;text-transform:uppercase" ;>
                    <p></p>
                </td> -->
                <td style=" width: 100%;text-align: right;border: 1px solid black;text-align: center;text-transform:uppercase">
                    <p><?= $result->nama_kabupaten?></p>
                </td>
            </tr>
        </table>
      
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;text-align: left;vertical-align: top;">
                <p style="font-style: 10px;">Berat: <?= $result->weight/1000?> kg</p>
                    <p style="font-style: 10px;">Tgl Pesanan: <?= isset($result->tanggal) ? $result->tanggal : '-'?></p>
                    <p style="font-style: 10px;">No.Pesanan: <?= $result->kd_transaksi?></p>
                </td>
                <td style="width: 50%;text-align: center;">
                    <img src="https://admin.urbanco.co.id/assets/user/<?= $result->kd_transaksi?>.jpg" alt="" style="position: absolute">
                </td>
            </tr>
        </table>
    </div>
    <!-- <style>
        table tr:first-child th {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border: 2px solid red;
            padding: 10px;

        }
    </style> -->
    <table style="width: 100%;font-size: 10px;" class="tables">
        <thead style="border: 1px solid black !important;">
            <tr class="inicoba">
                <th>#</th>
                <th style="text-align: left;">Nama Produk</th>
                
                <th style="text-align: left;">Variasi</th>
                <th style="text-align: left;">QTY</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($result->keranjang as $key) {
            # code...
        ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $key->nama_artikel?></td>
            
            <td><?= $key->nama_warna?>,<?= $key->ukuran?></td>
            <td><?= $key->jumlah?></td>
        </tr>
        <?php
        }
        ?>
       <?php
        if (isset($result->dataBonus)) {
            foreach ($result->dataBonus as $ss=> $key) {
                ?>
                   <tr>
                   <td><?= $no++?></td>
            <td><?= $key->nama_artikel?></td>
            
            <td><?= $key->nama_warna?>,<?= $key->ukuran?></td>
            <td>1</td>
        </tr>
                <?php
            }
        }
            
        ?>
    </table>
    <?php endforeach; ?>


</body>

</html>