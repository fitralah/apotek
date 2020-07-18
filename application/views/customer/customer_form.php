<section class="content-header">
    <h1>
        Customers
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customers</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-tittle"><?=ucfirst($page)?> customer</h3>
                <div class="pull-right">
                    <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('customer/process')?>" method="post">
                            <div class="form-group">
                                <label>Nama Customer *</label>
                                <input type="hidden" name="id" value="<?=$row->customer_id?>">
                                <input type="text" name="customer_name" value="<?=$row->name?>" class="form-control" required>
                            </div>                                                        
                            <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="gender" class="form-control" required>
                                    <option value=""></option>
                                    <option value="L" <?=$row->gender == 'L' ? 'selected' : null?>>Laki-laki</option>
                                    <option value="P" <?=$row->gender == 'P' ? 'selected' : null?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No. Telp Customer *</label>
                                <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Customer *</label>
                                <textarea name="addr" class="form-control" required><?=$row->address?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-flat btn-success">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>