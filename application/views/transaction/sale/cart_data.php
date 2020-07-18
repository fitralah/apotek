<?php $no = 1;
if($cart->num_rows() > 0)
{
    foreach ($cart->result() as $c => $data)
    { ?>
    <tr>
        <td><?=$no++?></td>
        <td class="barcode"><?=$data->barcode?></td>
        <td><?=$data->item_name?></td>
        <td><?=$data->cart_price?></td>
        <td><?=$data->qty?></td>
        <td><?=$data->discount_item?></td>
        <td id="total"><?=$data->total?></td>
        <td class="text-right" width="160px">
            <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
            data-cartid="<?=$data->cart_id?>"
            data-barcode="<?=$data->barcode?>"
            data-product="<?=$data->item_name?>"
            data-stock="<?=$data->stock?>"
            data-price="<?=$data->cart_price?>"
            data-qty="<?=$data->qty?>"
            data-discount="<?=$data->discount_item?>"
            data-total="<?=$data->total?>"
            class="btn btn-xs btn-primary">
                <i class="fa fa-pencil"></i> Ubah 
            </button>
            <button id="del_cart" data-cartid="<?=$data->cart_id?>" class="btn btn-xs btn-danger">
                <i class="fa fa-trash"></i> Hapus
            </button>
        </td>
    </tr>
    <?php }
} else {
    echo '<tr>
            <td colspan="8" class="text-center">Tidak ada item</td>
            </tr>';
} ?>