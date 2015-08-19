
<?php include_once APPPATH.'/Views/layouts/default.php';?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <h2 class="center"><?=$data->title?></h2>
            <div><?=$data->content?></div>
        </div>
    </div>
</div>


<?php require APPPATH.'/Views/layouts/partials/footer.php';


