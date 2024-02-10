<?php include(APPDIR.'views/header.php');?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<h1>Add Movie</h1>

<form method="post">

    <div class="row">

        <div class="col-md-6">

            <div class="control-group">
                <label class="control-label" for="title"> Title</label>
                    <input class="form-control" id="title" type="text" name="title" value="<?= (isset($_POST['title']) ? $_POST['title'] : ''); ?>" required />
            </div>

            <div class="control-group">
                <label class="control-label" for="description"> Description</label>
                    <input class="form-control" id="description" type="text" name="description" value="<?= (isset($_POST['description']) ? $_POST['description'] : ''); ?>" />
            </div>

        </div>

    </div>

    <br>

    <p><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button></p>

</form>