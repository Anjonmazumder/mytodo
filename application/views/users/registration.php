<h1>Registration</h1>
<p>Please fill out the form below to create an account</p>

<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
 <?php echo form_open('users/registration'); ?>

<p>
<?php echo form_label('First Name:'); ?>
<?php
$data = array(
              'name'        => 'first_name',
              'value'       => set_value('first_name')
            );
?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Last Name:'); ?>
<?php
$data = array(
              'name'        => 'last_name',
              'value'       => set_value('last_name')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Email Address:'); ?>
<?php
$data = array(
              'name'        => 'email',
              'value'       => set_value('email')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Username:'); ?>
<?php
$data = array(
              'name'        => 'username',
              'value'       => set_value('username')
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Password:'); ?>
<?php
$data = array(
              'name'        => 'password',
              'value'       => set_value('password')
            );
?>
<?php echo form_password($data); ?>
</p>


<p>
<?php echo form_label('Confirm Password:'); ?>
<?php
$data = array(
              'name'        => 'password2',
              'value'       => set_value('password2')
            );
?>
<?php echo form_password($data); ?>
</p>


<?php $data = array("value" => "Registration",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>

