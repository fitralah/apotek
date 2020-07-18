<style>
.link
{
    color:black;
    text-decoration: none; 
    background-color: none;
}
</style>

<section class="content-header">
    <h1>
        Dashboard
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <a href="<?=site_url('item')?>">
                    <div class="link">
                        <span class="info-box-text">Jumlah Barang</span>
                        <span class="info-box-number"><?=$this->fungsi->count_item()?></span>
                    </div>
                </a>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>
            
            <div class="info-box-content">
                <a href="<?=site_url('supplier')?>">
                    <div class="link">
                        <span class="info-box-text">Supplier</span>
                        <span class="info-box-number"><?=$this->fungsi->count_supplier()?></span>
                    </div>
                </a>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <a href="<?=site_url('customer')?>">
                    <div class="link">
                        <span class="info-box-text">Pelanggan</span>
                        <span class="info-box-number"><?=$this->fungsi->count_customer()?></span>
                    </div>
                </a>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
                <a href="<?=site_url('user')?>">
                    <div class="link">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number"><?=$this->fungsi->count_user()?></span>
                    </div>
                </a>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>