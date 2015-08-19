
<?php include_once APPPATH.'/Views/layouts/default.php';?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            
            
            <ul class="list-group news-items">
                <?php 
                    if(is_array($data)) {
                    foreach($data as $news) {?>
                        <li class="list-group-item row" id="news-<?=$news->id?>">
                            <div class="col-md-10">
                                <a href="/article/details/<?=$news->id?>">
                                    <h2><?=$news->title?></h2>
                                </a>
                                <p><?= (strlen($news->content) > 100) ? substr($news->content,0, 100).'...' : $news->content;?></p>
                            </div>

                            <div class="col-md-2">
                                <small><?=date('M d Y', strtotime($news->created_at))?></small><br/>

                                <?php if($news->status == 1) {?>
                                    <small class="alert-success">Published</small><br/>
                                <?php } else {?>
                                    <small class="alert-danger">Draft</small><br/>
                                <?php } ?>

                                <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-post" data-id="<?=$news->id?>">Delete</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

                <div class="pagination col-md-12">
                    <?php include_once APPPATH . '/Views/layouts/partials/pagination.php';?>
                </div>
            <?php } ?>
            
            <div class="center">
                <a href="/article/post" class=" btn-lg btn-primary">Post News</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.delete-post').on('click', function(){
            var id =  $(this).data('id');
            $.ajax({
                url:'/article/delete/' + id,
                type: 'get',
                dataType: 'json',
                success:function(data) {
                    if(data.status === 1) {
                        $('#news-' + id).remove();
                    } else {
                        alert("An error occured. Please try again later");
                    }
                }
            });
        });
    });
</script>

<?php require APPPATH.'/Views/layouts/partials/footer.php';


