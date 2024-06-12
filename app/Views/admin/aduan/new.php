<?= $this->extend('layout/layout-default') ?>

<?= $this->section('page_title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
$request = service('request');
?>
<?php
// echo '<pre>';
// print_r(validation_list_errors());
// print_r($request->getGet(validation_errors()));
// echo '</pre>';
?>

<?=form_open(url_to('admin.aduan.create'), ['id' => 'aduanNew' ,'class' => 'form form-horizontal', 'data-bitwarden-watching' => '1'])?>

<?= $this->include('admin/aduan/_form') ?>
<div class="col-12 d-flex justify-content-end">
    <button type="button" id="btnAdd" class="btn btn-primary me-1 mb-1">Tambah</button>
    <button type="reset" class="btn btn-primary me-1 mb-1">Reset</button>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

$('#btnAdd').on('click', function(){

    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "loading!",
      text: "Form data sedang dihantar oleh tukang pos",
      icon: "success"
    });

    $('#aduanNew').submit();
  }
});

});
</script>
<?= $this->endSection() ?>