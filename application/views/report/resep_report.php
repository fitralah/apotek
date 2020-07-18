<section class="content-header">
    <h1>
        Doctor's Prescription Report
        <small>Laporan Resep Dokter</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Laporan Resep Dokters</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-tittle">Data Resep Dokter</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>                            
                        <th>No. SIP</th>
                        <th>Nama Dokter/RS</th>
                        <th>Tanggal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?></td>
                        <td><?=$data->invoice?></td>
                        <td style="width:8%;">-</td>
                        <td style="width:8%;">-</td>
                        <td style="width:20%;"><?=indo_date($data->date)?></td>
                        <td class="text-center" width="100px">
                            <button id="detail" data-target="#modal-detail" data-toggle="modal" class="btn btn-success btn-xs">
                                <i class="fa fa-info-circle"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>