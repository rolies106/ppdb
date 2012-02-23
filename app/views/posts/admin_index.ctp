<div class="grid_24">
<h2 class="mbl"><?php __('Posts')?> <?php echo $this->Html->link('Add new',array('admin'=>true,'controller'=>'posts','action'=>'add'),array('class'=>'button rounded_small add-new-h2 css3pie'));?></h2>
<table id="PostTable" class="display">
    <thead>
        <tr>
            <th><?php __('No')?></th>
            <th><?php __('Title')?></th>
            <th><?php __('Author')?></th>
            <th><?php __('Date')?></th>
            <th><?php __('Action')?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($posts as $post): ?>
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td><?php echo $this->Html->link($post['Post']['post_title'],array('admin'=>true,'controller'=>'posts','action'=>'edit',$post['Post']['id'])); ?></td>
            <td><?php echo $post['User']['username']; ?></td>
            <td><?php echo $dateFormat->changeDateFormat($post['Post']['post_date'], 'dateFormat=d F Y - H:i'); ?></td>
            <td align="center"><?php echo $this->Html->link('delete',array('admin'=>true,'controller'=>'posts','action'=>'delete',$post['Post']['id']), array('class' => 'js-confirm-delete', 'title' => __('Delete '.$post['Post']['post_title'].' ?',true))); ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<div class="clear"></div>