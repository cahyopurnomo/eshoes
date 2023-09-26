<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0">Data Produk</h1>
      <a href="<?=base_url('tenant/create-product') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
   </div>

   <div class="card">
      <div class="card-body">
         <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
               <div class="alert-body">
                  <b>Sukses ! </b>
                  <?=session()->getFlashdata('success')?>
               </div>
            </div>
         <?php endif; ?>
         <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
               <div class="alert-body">
                  <b>Gagal ! </b>
                  <?=session()->getFlashdata('error')?>
               </div>
            </div>
         <?php endif; ?>
         <table class="table table-striped table-bordered display nowrap" id="dataProduct" width="100%" cellspacing="0">
            <thead>
                  <tr>
                     <th>NO</th>    
                     <th>NAMA PRODUK</th>
                     <th>SLUG</th>
                     <th>KATEGORI</th>
                     <th>ACTION</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>
</div>

<script>
   $(document).ready(function(){
      $('#dataProduct').DataTable({
         "processing": true,
         "serverSide": true,
         "responsive": true,
         "pageLength": 10,
         "autoWidth": true,
         "scrollX": true,
         "stateSave" : true,
         "ajax": {
            "url": "<?=base_url('tenant/ajax-product-list') ?>",
            "type": "POST"
         },
         "order": [],
         "columnDefs": [
            { 'targets': "_all", "orderable": false, },
            { "className": 'text-center', "targets": "_all" },
            { "className": 'dt-head-center', "targets": "_all" },
            { "width": "3%", "targets": [0] },
            { "width": "5%", "targets": [4] },
         ],    
      });
   });
</script>
<?=$this->endSection(); ?>