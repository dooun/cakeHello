<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Kesyo</h1>
<?php
  echo $this->Form->create('Kesyo');
  echo $this->Form->input('name');
  echo $this->Form->input('price');
  echo $this->Form->input('color');
  echo $this->Form->end('提交');
?>
