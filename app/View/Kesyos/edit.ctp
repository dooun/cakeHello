<!-- File: /app/View/Posts/edit.ctp -->

<h1>修改商品信息</h1>
<?php
echo $this->Form->create('Kesyo');
echo $this->Form->input('name');
echo $this->Form->input('price');
echo $this->Form->input('color');
echo $this->Form->end('保存更改');

?>
