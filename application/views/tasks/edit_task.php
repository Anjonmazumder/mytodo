<h1>Edit Task</h1>
<p>List:<strong> <?php echo $list_name; ?></strong></p>


<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('tasks/edit/'.$this->uri->segment(3).''); ?>


<p>
<?php echo form_label('Task Name:'); ?>
<?php
$data = array(
              'name'        => 'task_name',
              'value'       => $this_task->task_name
            );
?>
<?php echo form_input($data); ?>
</p>


<p>
<?php echo form_label('Task Body:'); ?>
<?php
$data = array(
              'name'        => 'task_body',
              'value'       => $this_task->task_body
            );
?>
<?php echo form_textarea($data); ?>
</p>


<p>
<?php echo form_label('Date:'); ?>
<input type="date" name="due_date" value="<?php echo $this_task->due_date; ?>"/>
</p>


<?php $data = array("value" => "Update Task",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
