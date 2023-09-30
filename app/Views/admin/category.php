<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0">Data Kategori</h1>
      <a href="<?= site_url('admin/create-category') ?>" class="btn btn-primary"><i class="fas fa-plus"></i></i> &nbsp; Tambah</a>
   </div>

   <div class="card mb-4">
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
         <table class="table table-striped table-bordered display nowrap" id="dataCategory" width="100%" cellspacing="0">
            <thead>
                  <tr>
                     <th>NO</th>    
                     <th>NAMA KATEGORI</th>
                     <th>INDUK KATEGORI</th>
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
      $('#dataCategory').DataTable({
         "processing": true,
         "serverSide": true,
         "responsive": true,
         "pageLength": 10,
         "autoWidth": true,
         "scrollX": true,
         "stateSave" : true,
         "ajax": {
            "url": "<?=site_url('admin/ajax-category-list') ;?>",
            "type": "POST"
         },
         "order": [],
         "columnDefs": [
            { 'targets': "_all", "orderable": false, },
            { "className": 'text-center', "targets": "_all" },
            { "className": 'dt-head-center', "targets": "_all" },
            { "width": "3%", "targets": 0 },
            { "width": "5%", "targets": 3 },
         ],    
      });
   });
</script>
<?=$this->endSection(); ?>