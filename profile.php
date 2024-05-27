<?php require_once 'auth_conf.php' ?>
<?php
require 'config.php'; ?>
<?php require 'header.php'; ?>
<!-- body tenplate -->
<div class="row ">
    <div class="col"></div>

    <div class="col-5">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Profile Sistem</h4>
                </div>
                <form action="conf_profile.php" method="POST">
                    <input type="text" value="<?= $idProfileSistem; ?>" hidden name="idProfileSistem">
                    <div class="mb-3">
                        <label for="appName" class="form-label fw-bold">App Name <strong class="text-danger">*</strong></label>
                        <input type="text" name="appName" class="form-control fw-bold" id="appName" value="<?= $nameApp; ?>" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label fw-bold">Company Name <strong class="text-danger">*</strong></label>
                        <input type="text" name="companyName" class="form-control fw-bold" id="companyName" value="<?= $companyName; ?>" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submitProfileSistem">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->
<?php require 'foother.php'; ?>