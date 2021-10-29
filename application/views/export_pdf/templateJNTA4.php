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
        table>tr>td{
            font-family: Arial, Helvetica, sans-serif;
        }
        *{
            font-family: Arial;
        }
        p {
  font-family: Arial, Helvetica, sans-serif;
}
    </style>
</head>

<body>
    <div style="border: 1px solid black;height: 150px;background-color: white;position: relative">

        
        <!-- <img src="https://admin.urbanco.co.id/assets/barcodeProduct/barcode1.jpg" alt="" style="width: 100%;height: 80px;object-fit: cover;position: absolute;"> -->
        <table style="width: 100%;position: relative;background-color: white;">
            <tr>
                <td style="width: 50%;text-align: left;vertical-align: top;">
                    <p style="font-size: 10px;">Penerima: <?= $result->namaReceiver?></p>
                    <div style="display: flex;justify-content: space-around;">
                        <p style="font-size: 10px;">
                            <span style="border: 1px solid black;">HOME</span> <?= $result->phone?>
                        </p>
                        <p style="font-size: 10px;"><?= $result->addressName?></p>
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
                    <p>KOTA JAKARTA PUSAt</p>
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
                    <p style="font-style: 10px;">No.Pesanan: <?= $result->kd_transaksi?></p>
                </td>
                <td style="width: 50%;text-align: center;">
                    <img src="https://admin.urbanco.co.id/assets/user/<?= $result->kd_transaksi?>.jpg" alt="" style="position: absolute">
                </td>
            </tr>
        </table>
    </div>
    <style>
       .tables2, th, .td {
  border: 1px solid black;
  border-collapse: collapse;
  border-style: dotted;
}
.td1{
    border: none !important;
}
    </style>
    <table style="width: 100%;font-size: 10px;" class="tables2">
        <thead style="border: 1px solid black !important;">
            <tr class="inicoba">
                <th>#</th>
                <th style="text-align: center;width:15%;font-family: Arial, Helvetica, sans-serif;">Nama Produk</th>
                
                <th style="text-align: center;font-family: Arial, Helvetica, sans-serif;">Variasi</th>
                <th style="text-align: center;font-family: Arial, Helvetica, sans-serif;">QTY</th>
                <th style="text-align: center;font-family: Arial, Helvetica, sans-serif;">Harga</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($result->keranjang as $key) {
            # code...
            
        ?>
        <tr>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $no++?></td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $key->nama_artikel?></td>
            
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $key->nama_warna?>,<?= $key->ukuran?></td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $key->jumlah?></td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= rupiah($key->harga * $key->jumlah)?></td>
            
        </tr>
        <?php
        }
        ?>

<?php
        if (isset($result->dataBonus)) {
            foreach ($result->dataBonus as $ss=> $eys) {
                ?>
                   <tr>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $no+1?></td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $eys->nama_artikel?></td>
            
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><?= $eys->nama_warna?>,<?= $eys->ukuran?></td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">1</td>
            <td class="td" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">Rp. 0</td>
           
        </tr>
                <?php
            }
        }
            
        ?>
        <tr>
            <td class="td1" style="text-align: center;"></td>
            <td class="td1" style="text-align: center;"></td>
            
            <td class="td1" style="text-align: center;"></td>
            <td class="td" style="text-align: center;">Sub Total :</td>
            <td class="td" style="text-align: center;"><?= rupiah($result->total) ?></td>
            
        </tr>
       
        <tr>
            <td class="td1" style="text-align: center;"></td>
            <td class="td1" style="text-align: center;"></td>
            
            <td class="td1" style="text-align: center;"></td>
            <td class="td" style="text-align: center;">Ongkir :</td>
            <td class="td" style="text-align: center;"><?= rupiah($result->ongkir) ?></td>
            
        </tr>
        <!-- <tr>
            <td class="td1" style="text-align: center;"></td>
            <td class="td1" style="text-align: center;"></td>
            
            <td class="td1" style="text-align: center;"></td>
            <td class="td" style="text-align: center;">Potongan Ongkir :</td>
            <td class="td" style="text-align: center;"><?= rupiah($result->promoOngkir) ?></td>
            
        </tr> -->
        <tr>
            <td class="td1" style="text-align: center;"></td>
            <td class="td1" style="text-align: center;"></td>
            
            <td class="td1" style="text-align: center;"></td>
            <td class="td" style="text-align: center;">Voucher (<?= $result->besaran ? $result->besaran : '0' ?>%) :</td>
            <td class="td" style="text-align: center;"><?= $result->potongan ? rupiah($result->potongan) : '0' ?></td>
            
        </tr>
        <tr>
            <td class="td1" style="text-align: center;"></td>
            <td class="td1" style="text-align: center;"></td>
            
            <td class="td1" style="text-align: center;"></td>
            <td class="td" style="text-align: center;">Total :</td>
            <td class="td" style="text-align: center;"><?= rupiah($result->total_dengan_voucher) ?></td>
            
        </tr>
        
    </table>


</body>

</html>