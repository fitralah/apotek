<section class="content-header">
    <h1>
        Sales Report
        <small>Laporan Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Laporan Penjualan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data Penjualan</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>                            
                        <th>Tanggal Penjualan</th>
                        <th>Pelanggan</th>
                        <th>Sub Total</th>
                        <th>Diskon</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?></td>
                        <td><?=$data->invoice?></td>                            
                        <td style="width:20%;"><?=indo_date($data->date)?></td>
                        <td><?=$data->customer_id == null ? "Umum" : $data->customer_name?></td>
                        <td style="width:8%;"><?=indo_currency($data->total_price)?></td>
                        <td style="width:8%;"><?=indo_currency($data->discount)?></td>
                        <td style="width:8%;"><?=indo_currency($data->final_price)?></td>
                        <td class="text-center" width="200px">
                            <button id="detail" data-target="#modal-detail" data-toggle="modal" class="btn btn-success btn-xs" 
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=indo_date($data->date)?>"
                            data-time="<?=substr($data->sale_created, 11, 5)?>"
                            data-customer="<?=$data->customer_id == null ? "Umum" : $data->customer_name?>"
                            data-total="<?=indo_currency($data->total_price)?>"
                            data-discount="<?=indo_currency($data->discount)?>"
                            data-grandtotal="<?=indo_currency($data->final_price)?>"
                            data-cash="<?=indo_currency($data->cash)?>"
                            data-remaining="<?=indo_currency($data->remaining)?>"
                            data-cashier="<?=ucfirst($data->user_name)?>"
                            data-saleid="<?=$data->sale_id?>">
                                <i class="fa fa-info-circle"></i> Detail
                            </button>
                            <a href="<?=site_url('sale/cetak/'.$data->sale_id)?>" target="_blank" class="btn btn-info btn-xs">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <a href="<?=site_url('sale/del/'.$data->sale_id)?>" onclick="return confirm('Yakin mau menghapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Data Penjualan</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:20%">Invoice</th>
                            <td style="width:30%"><span id="invoice"></span></td>
                            <th style="width:20%">Pelanggan</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><span id="datetime"></span></td>
                            <th>Kasir</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Sub Total</th>
                            <td><span id="total"></span></td>
                            <th>Tunai</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td><span id="discount"></span></td>
                            <th>Kembalian</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>No. SIP</th>
                            <td><span id="sip"></span></td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '#detail', function() {
    $('#invoice').text($(this).data('invoice'))
    $('#cust').text($(this).data('customer'))
    $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
    $('#total').text($(this).data('total'))
    $('#cash').text($(this).data('cash'))
    $('#discount').text($(this).data('discount'))
    $('#change').text($(this).data('remaining'))
    $('#grandtotal').text($(this).data('grandtotal'))
    $('#cashier').text($(this).data('cashier'))

    var product = '<table class="table no-margin">'
    product += '<tr><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Diskon</th><th>Total</th></tr>'
    $.getJSON('<?=site_url('report/sale_product/')?>'+$(this).data('saleid'), function(data) {
        $.each(data, function(key, val) {
            product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
        })
        product += '</table>'
        $('#product').html(product)
    })
})
</script>
