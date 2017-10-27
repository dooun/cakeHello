<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
  echo $this->Form->create('post');
  echo $this->Form->input('title', array('label'=>'标题'));
  echo $this->Form->input('body', array('rows' => '3', 'cols' => '15', 'style'=>'color:red'));
  echo $this->Form->end('提交');
?>
