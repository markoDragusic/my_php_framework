<?php include(APPDIR.'views/header.php');?>

<div class="wrapper well">

    <form action="/user/login" method="post">

    <h1>Login</h1>

    <div class="control-group">
        <label class="control-label" for="username"> Username</label>
        <input class="form-control" id="username" type="text" name="username" />
    </div>

    <div class="control-group">
        <label class="control-label" for="password"> Password</label>
        <input class="form-control" id="password" type="password" name="password" />
    </div>

    <br>
    
    <p class="pull-left"><button type="submit" class="btn btn-sm btn-success" name="submit">Login</button></p>


    <div class="clearfix"></div>

    </form>

</div>