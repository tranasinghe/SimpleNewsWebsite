
<?php include_once APPPATH.'/Views/layouts/default.php';?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <form method="post" action="/article/post/">
                <div class="form-group">
                    <h3 class="center">Post News</h3>
                </div>
                <div class="form-group">
                    <label>Title <span>*</span></label>
                    <input type="text" class="form-control" name="title" required=""/>
                </div>
                <div class="form-group">
                    <label>New Content <span>*</span></label>
                    <textarea rows="10" class="form-control" name="content" required=""></textarea>
                </div>
                <div class="form-group">
                    <label>Status<span>*</span></label>
                    <select class="form-control" name="status" required="">
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>&nbsp</label>
                    <button type="reset" class="btn btn-lg btn-danger">Reset</button>&nbsp;&nbsp;
                    <button type="submit" class="btn btn-lg btn-primary" name="command_save" value="save">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPPATH.'/Views/layouts/partials/footer.php';


