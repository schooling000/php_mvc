<?php
# define root_path;
define('ROOT_PATH', __DIR__);
?>

<form class="form-horizontal" name="contact_form" id="contact_form" method="post" action="">
<input type="hidden" name="mode" value="login" >
<fieldset>
<div class="form-group">
<label class="col-lg-2 control-label" for="username"><span class="required">*</span>Username:</label>
<div class="col-lg-6">
<input type="text" value="" placeholder="User Name" id="username" class="form-control" name="username" required="" >
</div>
</div>
<div class="form-group">
<label class="col-lg-2 control-label" for="user_password"><span class="required">*</span>Password:</label>
<div class="col-lg-6">
<input type="password" value="" placeholder="Password" id="user_password" class="form-control" name="user_password" required="" >
</div>
</div>
<div class="form-group">
<div class="col-lg-6 col-lg-offset-2">
<button class="btn btn-primary" type="submit">Submit</button> 
</div>
</div>
</fieldset>
</form>
