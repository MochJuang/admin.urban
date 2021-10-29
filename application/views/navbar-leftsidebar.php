<?php
$data = getservice('GET', 'menu/menus?', 'admin=' . $this->session->userdata('jenis'));
// print_r($data);
function getStatus($status)
{
    getservice('GET', 'menu/menus?', 'status=' . $this->session->userdata('jenis'));
}
?>

<nav class="pcoded-navbar" active-item-theme="theme2" sub-item-theme="theme2" active-item-style="style0" pcoded-navbar-position="fixed">
    <div class="pcoded-inner-navbar main-menu" id="dash-menu">

        <?php
        foreach ($data->data as $key) :


        ?>
            <div class="pcoded-navigatio-lavel"><?= $key->label ?></div>

            <ul class="pcoded-item pcoded-left-item">
                <?php
                if (isset($key->menunya)) {
                    foreach ($key->menunya as $key2) :
                        if ($key2->id_menu != 16 && $key2->id_menu != 10) {
                ?>
                            <li class="">

                                <a href="<?= base_url() . $key2->link ?>">
                                    <span class="pcoded-micon"><i class="<?= isset($key->icon) ? $key->icon : $key2->icon ?>"></i></span>
                                    <span class="pcoded-mtext"><?= $key2->label ?> </span>
                                    <?php
                                    $transaksi = $key2->link;
                                    $explodeTransaksi = explode('/', $transaksi);
                                    if ($explodeTransaksi[0] == 'transaksi') {
                                        if (isset($explodeTransaksi[1])) {
                                            # code...
                                    ?>
                                            <!-- <span style="margin-right: -20px;" class="pcoded-badge label label-success transaksi" id="transaksi-<?= isset($explodeTransaksi[1]) ? $explodeTransaksi[1] : '' ?>">0</span> -->
                                    <?php
                                        }
                                    }
                                    ?>

                                </a>
                            </li>
                        <?php }else if($key2->id_menu == 10){ ?>

                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)"> <span class="pcoded-micon"><i class="feather icon-check-square"></i></span> <span class="pcoded-mtext">Promo</span></a>
                                <ul class="pcoded-submenu">
                                <li class="">
                                            <a href="<?= base_url() ?>promo/promokhusus"> <span class="pcoded-mtext">Promo Khusus</span> </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= base_url() ?>promo/item"> <span class="pcoded-mtext">Item</span> </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= base_url() ?>promo/gratisongkir"> <span class="pcoded-mtext">Gratis Ongkir</span> </a>
                                        </li>
                                        <li class="">
                                            <a href="<?= base_url() ?>promo/"> <span class="pcoded-mtext">Cashback</span> </a>
                                        </li>
                                        
                                    
                                </ul>
                            </li>

                       <?php }else { ?>
                            <?php
                            $kategoris = getservice('GET', 'kategori')->data;
                            $brands = getservice('GET', 'brand')->data;
                            ?>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)"> <span class="pcoded-micon"><i class="<?= $key->icon ?>"></i></span> <span class="pcoded-mtext"><?= $key2->label ?></span></a>
                                <ul class="pcoded-submenu">
                                    <?php
                                    foreach ($brands as $key) :

                                    ?>
                                        <li class="">
                                            <a href="<?= base_url() ?>item/<?= $key->id_brand ?>"> <span class="pcoded-mtext"><?= $key->nama_brand ?></span> </a>
                                        </li>
                                    <?php

                                    endforeach; ?>
                                </ul>
                            </li>


                        <?php } ?>



                <?php
                    endforeach;
                }
                ?>
            </ul>

        <?php endforeach; ?>

    </div>
</nav>