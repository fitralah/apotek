<section class="content-header">
    <h1>
        Categories
        <small>Kategori Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kategori</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">   
        <?php $this->view('messages')?>     
        <div class="box">
            <div class="box-header">
                <h3 class="box-tittle">Data Kategori Barang</h3>
                <div class="pull-right">
                    <a href="<?=site_url('category/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?></td>
                            <td><?=$data->name?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('category/edit/'.$data->category_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <a href="<?=site_url('category/del/'.$data->category_id)?>" onclick="return confirm('Yakin mau menghapus data?')" class="btn btn-danger btn-xs">
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