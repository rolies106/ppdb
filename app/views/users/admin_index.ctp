<div class="grid_24">
<h2 class="mbl"><?php __('Users')?> <?php echo $this->Html->link('Add new',array('admin'=>true,'controller'=>'users','action'=>'add'),array('class'=>'button rounded_small add-new-h2 css3pie'));?></h2>
<table id="PostTable" class="display">
    <thead>
        <tr>
            <th><?php __('No')?></th>
            <th><?php __('Username')?></th>
            <th><?php __('Email')?></th>
            <th><?php __('Register Date')?></th>
            <th><?php __('Action')?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $this->Html->link($user['User']['username'],array('admin'=>true,'controller'=>'users','action'=>'edit',$user['User']['id'])); ?></td>
            <td><?php echo $user['User']['email']; ?></td>
            <td><?php echo $user['User']['register_date']; ?></td>
            <td><?php echo $this->Html->link('delete',array('admin'=>true,'controller'=>'users','action'=>'delete',$user['User']['id']),array('class' => 'js-confirm-delete', 'title' => __('Delete '.$user['User']['username'].' ?',true))); ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<div class="clear"></div>