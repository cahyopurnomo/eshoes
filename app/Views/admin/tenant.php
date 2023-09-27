<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0">Data Tenant</h1>
      <a href="<?= site_url('admin/create-tenant') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</a>
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
         <table class="table table-striped table-bordered display nowrap" id="dataTenant" width="100%" cellspacing="0">
            <thead>
                  <tr>
                     <th>NO</th>    
                     <th>NAMA TENANT</th>
                     <th>EMAIL</th>
                     <th>TELPON</th>
                     <th>KOTA</th>
                     <th>PROPINSI</th>
                     <th>FACEBOOK</th>
                     <th>INSTAGRAM</th>
                     <th>LINKEDIN</th>
                     <th>TWITTER</th>
                     <th>YOUTUBE</th>
                     <th>TIKTOK</th>
                     <th>TOKOPEDIA</th>
                     <th>LAZADA</th>
                     <th>SHOPEE</th>
                     <th>BLIBLI</th>
                     <th>STATUS</th>
                     <th>TGL JOIN</th>
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
      $('#dataTenant').DataTable({
         "processing": true,
         "serverSide": true,
         "responsive": true,
         "pageLength": 10,
         "autoWidth": true,
         "scrollX": true,
         "stateSave" : true,
         "ajax": {
            "url": "<?=site_url('admin/ajax-tenant-list') ;?>",
            "type": "POST"
         },
         "order": [],
         "columnDefs": [
            { 'targets': "_all", "orderable": false, },
            { "className": 'text-center', "targets": "_all" },
            { "className": 'dt-center', "targets": "_all" }
         ],    
      });
   });
</script>
<?=$this->endSection(); ?>