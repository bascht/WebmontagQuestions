<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_new"><?php echo link_to('Frage stellen', '@question_show?id=' . $question->getId(), array('target' => '_blank')); ?></li>
    <?php echo $helper->linkToEdit($question, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($question, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
