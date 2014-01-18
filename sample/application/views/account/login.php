<div class="container">
    <div class="col-lg-12">
        <h1><?php echo @$page; ?></h1>
        <?php 
             if(isset($insert_id) && $insert_id > 0)
                echo "<p>Account successfully created.</p>";
        ?>
    </div>
    <div class="col-lg-6">
        <form id="login" action="<?php echo base_url().index_page();?>account/login" method="post">
            
            <div class="form-group <?php echo ((form_error("username") != "")?"has-error":"");?>">
                <label class="control-label" for="username">Username</label>
                <input type="text" 
                       class="form-control" 
                       id="username" 
                       name="username" 
                       value="<?php echo set_value('username','') ?>"
                       placeholder="Enter Username">
                <?php echo form_error('username','<div class="error help-block">','</div>')?>
            </div>

            <div class="form-group <?php echo ((form_error("password") != "")?"has-error":"");?>">
                <label class="control-label" for="password">Password</label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       value=""
                       placeholder="Enter Password">
                <?php echo form_error('password','<div class="error help-block">','</div>')?>
            </div>
            <input type="submit" class="btn btn-primary pull-right" value="Go!"/>
        </form>
    </div>
</div>
