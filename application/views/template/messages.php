<?php

if($this->session->has_userdata('success')) { ?>

    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $this->session->flashdata('success') ?>
    </div>

<?php } elseif($this->session->has_userdata('delete')) { ?>

    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $this->session->flashdata('delete') ?>
    </div>

<?php } elseif($this->session->has_userdata('error')) { ?>

<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))); ?>
</div>

<?php } elseif ($this->session->has_userdata('errorcaptcha')) { ?>

    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $this->session->flashdata('errorcaptcha') ?>
    </div>

<?php } ?>