<!-- File: /app/View/Posts/view.ctp -->

<h1 style="font-size:3em;color:#ff9800;;"><?php echo h($kesyo['Kesyo']['name']); ?></h1>


<style>
.float {
	width:50%;
	float:left;
}
button {
	margin: 10px;
    font-size: 3em;
    padding: 5px;
    border-radius: 10px;
    border: 0px;
    background-color: red;
    color: white;
}
button:hover {
	background-color: #ff5a5a;
}
</style>

<div class="float">
	<img style="max-width:300px;max-height:300px;" src="/cakeHello/<?php echo $kesyo['Kesyo']['img_url']?>">
</div>

<div class="float">
	<p>现在只要:<span style="color:brown;"> ￥<?php echo $kesyo['Kesyo']['price']; ?></span><span style=" font-size:2em;color:red;">Hot Sell!!!</span></p>
	<p>颜色：<?php echo h($kesyo['Kesyo']['color']); ?></p>
	<p>宝贝描述：<?php echo $kesyo['Kesyo']['detail']; ?></p>
	<p><button>订购</button></p>
	<p>电话：886-998-8888</p>
</div>
