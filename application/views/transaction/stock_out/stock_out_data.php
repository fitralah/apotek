<section class="content-header">
    <h1>
        Stock Out
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Stok Keluar</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">   
        <?php $this->view('messages')?>     
        <div class="box">
            <div class="box-header">
                <h3 class="box-tittle">Pengurangan Stok</h3>
                <div class="pull-right">
                    <a href="<?=site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i> Pilih
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Jumlah Stok Keluar</th>
                            <th>Info</th>
                            <th>Tanggal</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?></td>
                            <td style="width:15%;"><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->qty?></td>
                            <td><?=$data->detail?></td>
                            <td><?=indo_date($data->date)?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('Yakin mau menghapus data?')" class="btn btn-danger btn-xs">
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