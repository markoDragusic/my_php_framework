<?php include(APPDIR.'views/header.php');?>

<h1>Movies</h1>

<p><a href="/movies/add" class="btn btn-xs btn-info">Add Movie</a></p>

<div class='table-responsive'>
    <table class='table table-striped table-hover table-bordered'>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach ($movies as $row) { ?>
            <tr>
                <td><?= htmlentities($row->title); ?></td>
                <td><?= htmlentities($row->description); ?></td>
                <td>
                    <a href="javascript:del('<?= $row->id; ?>','<?= $row->title; ?>')" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script language="JavaScript" type="text/javascript">
    function del(id, title) {
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            window.location.href = '/movies/delete/' + id;
        }
    }
</script>
