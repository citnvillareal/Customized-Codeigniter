<?php 
    js('body','scripts/js/validate');
?>
<div class="container">
    <div class="col-lg-12">
        <h1><?php echo @$page; ?></h1>
        <?php 
             if(isset($insert_id) && $insert_id > 0)
             {
                echo "<p>Account successfully created.</p>";
             }
        ?>
    </div>
    <div class="col-lg-6">
        <form id="sign_up" action="<?php echo base_url().index_page();?>account/sign_up" method="post">
            
            <div class="form-group <?php echo ((form_error("first_name") != "")?"has-error":"");?>">
                <label class="control-label" for="first_name">First Name</label>
                <input type="text" 
                       class="form-control" 
                       id="first_name" 
                       name="first_name" 
                       value="<?php echo set_value('first_name','') ?>"
                       placeholder="Enter First Name">
                <?php echo form_error('first_name','<span class="error help-block">','</span>')?>
            </div>

            <div class="form-group <?php echo ((form_error("last_name") != "")?"has-error":"");?>">
                <label class="control-label" for="last_name">Last Name</label>
                <input type="text" 
                       class="form-control" 
                       id="last_name" 
                       name="last_name" 
                       value="<?php echo set_value('last_name','') ?>"
                       placeholder="Enter Last Name">
                <?php echo form_error('last_name','<span class="error help-block">','</span>')?>
            </div>

            <div class="form-group <?php echo ((form_error("username") != "")?"has-error":"");?>">
                <label class="control-label" for="uname">Username</label>
                <input type="text" 
                       class="form-control" 
                       id="uname" 
                       name="uname" 
                       value="<?php echo set_value('uname','') ?>"
                       placeholder="Enter Username">
                <?php echo form_error('username','<span class="error help-block">','</span>')?>
            </div>

            <div class="form-group <?php echo ((form_error("password") != "")?"has-error":"");?>">
                <label class="control-label" for="pword">Password</label>
                <input type="password" 
                       class="form-control" 
                       id="pword" 
                       name="pword" 
                       placeholder="Enter Password">
                <?php echo form_error('password','<span class="error help-block">','</span>')?>
            </div>
            
            <input type="submit" class="btn btn-default pull-right" value="Save"/>
            
        </form>
    </div>
</div>
