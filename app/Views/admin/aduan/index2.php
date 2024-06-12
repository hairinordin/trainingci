<?= $this->extend('layout/layout-default') ?>

<?= $this->section('page_title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
$request = service('request');
?>
<div class="card">
    <!-- <div class="card-header">
                        <h4 class="card-title">Horizontal Form with Icons</h4>
                    </div> -->
    <!-- <div class="card-content">
                        <div class="card-body"> -->
    <form class="form form-horizontal" data-bitwarden-watching="1">
        <div class="form-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="first-name-horizontal-icon">Name</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input name="complainant_name" value="<?= $request->getGet('complainant_name') ?>" type="text" class="form-control" placeholder="Name" id="first-name-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email-horizontal-icon">Email</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input name="complainant_email" value="<?= $request->getGet('complainant_email') ?>" type="email" class="form-control" placeholder="Email" id="email-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="contact-info-horizontal-icon">Mobile</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input name="complainant_phone" value="<?= $request->getGet('complainant_phone') ?>" type="number" class="form-control" placeholder="Mobile" id="contact-info-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="contact-info-horizontal-icon">Status</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <select name="complainant_status" class="choices form-select" id="contact-info-horizontal-icon">
                                <option value="">Select Status</option>
                                <?php
                                if ($lookup_status ?? '') {
                                    foreach ($lookup_status as $key => $value) {
                                        // $selected = ($request->getGet('complainant_status') == $key) ? 'selected' : '';
                                        echo "<option value='$key'>$value</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Search</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
    </form>
    <!-- </div>
                    </div> -->
</div>

<a href="<?= url_to('admin.aduan.new') ?>" class="btn btn-info">Tambah</a>

<div class="table-responsive">

    <table class="table" id="complainant_dt">
        <thead>
            <tr>
                <td>Bil</td>
                <td>Name</td>
                <td>Nationality</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

$(document).ready(function() {
    $('#complainant_dt').DataTable({
        
        ajax: {
            url : '<?= base_url('admin/aduan/ajaxdata') ?>',
            type: 'GET',
            data : function(d){
                d.searchdata=<?= json_encode($request->getGet())?>
            },
        },
        processing: true,
        serverSide: true,
        ordering: true
    });
});
</script>
<?= $this->endSection() ?>