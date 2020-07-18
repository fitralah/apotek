<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">   
        <?php $this->view('messages')?>     
        <div class="box">
            <div class="box-header">
                <h3 class="box-tittle">Data Barang</h3>
                <div class="pull-right">
                    <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i> Tambah Barang Baru
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?></td>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->category_name?></td>
                            <td><?=$data->unit_name?></td>
                            <td>Rp. <?=$data->price?></td>
                            <td><?=$data->stock?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Yakin mau menghapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <?php } ?> -->
                    </tbody>
                </table>
            </div>
        </div>
</section>

<script>
    $(document).ready(function() 
    {
        $('#table1').DataTable({
            "processing" : true,
            "serverSide" : true,
            "ajax" : {
                "url" : "<?=site_url('item/get_ajax')?>",
                "type" : "POST"
            },
            "columnDefs" : [
                {
                    "targets" : [5, 6],
                    "className" : 'text-right'
                },
                {
                    "targets" : [7],
                    "className" : 'text-center'                    
                },
                {
                    "targets" : [7, 0],
                    "orderable" : false
                }
            ],
            "order": []
        })
    })
</script>