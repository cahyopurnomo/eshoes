<?=$this->extend('layouts/template'); ?>
<?=$this->Section('content'); ?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0">Data Banner</h1>
      <a href="<?=$url_create ?>" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Tambah</a>
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
         <table class="table table-striped table-bordered display nowrap" id="dataBanner" width="100%" cellspacing="0">
            <thead>
                  <tr>
                     <th>NO</th>    
                     <th>JUDUL BANNER</th>
                     <th>GAMBAR</th>
                     <th>POSISI</th>
                     <th>STATUS</th>
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
      $('#dataBanner').DataTable({
         "processing": true,
         "serverSide": true,
         "responsive": true,
         "pageLength": 10,
         "autoWidth": true,
         "scrollX": true,
         "stateSave" : true,
         "ajax": {
            "url": "<?=$url_datatables ?>",
            "type": "POST"
         },
         "order": [],
         "columnDefs": [
            { 'targets': "_all", "orderable": false, },
            { "className": 'text-center', "targets": "_all" },
            { "className": 'dt-head-center', "targets": "_all" },
            { "width": "3%", "targets": [0] },
            { "width": "5%", "targets": [3,4,5] },
         ],    
      });

      $('[data-toggle=confirm]').confirmation({
         rootSelector: '[data-toggle=confirm]',
         buttons: [
            {
               class: 'btn btn-sm btn-danger',
               iconClass: 'material-icons mr-1',
               iconContent: 'directions_railway',
               label: 'Railway',
               value: 'Railway',
            }
         ]
      });
   });
</script>
<?=$this->endSection(); ?>