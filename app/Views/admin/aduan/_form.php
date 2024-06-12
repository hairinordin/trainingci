<?php
$request = service('request');
?>
<div class="form-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="first-name-horizontal-icon">Name</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left <?= validation_show_error('complainant_name')? 'is-invalid' : ''?> ">
                        <div class="position-relative">
                            <input name="complainant_name" value="<?= old('complainant_name')?>" type="text" class="form-control" placeholder="Name" id="first-name-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="parsley-required">
                                <?= validation_show_error('complainant_name')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email-horizontal-icon">Email</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left <?= validation_show_error('complainant_email')? 'is-invalid' : ''?> ">
                        <div class="position-relative">
                            <input name="complainant_email" value="<?= old('complainant_email')?>" type="email" class="form-control" placeholder="Email" id="email-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="parsley-required">
                                <?= validation_show_error('complainant_email')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="contact-info-horizontal-icon">Mobile</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left  <?= validation_show_error('complainant_phone')? 'is-invalid' : ''?> ">
                        <div class="position-relative">
                            <input name="complainant_phone" value="<?= old('complainant_phone')?>" type="number" class="form-control" placeholder="Mobile" id="contact-info-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div class="parsley-required">
                                <?= validation_show_error('complainant_phone')?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="contact-info-horizontal-icon">Complaint</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left  <?= validation_show_error('complainant_complaint')? 'is-invalid' : ''?> ">
                        <div class="position-relative">
                            <input name="complainant_complaint" value="<?= old('complainant_complaint')?>" type="text" class="form-control" placeholder="Mobile" id="contact-info-horizontal-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div class="parsley-required">
                                <?= validation_show_error('complainant_complaint')?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Search</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div> -->
            </div>
        </div>