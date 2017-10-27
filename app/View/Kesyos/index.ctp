<!-- File: /app/View/Posts/index.ctp -->
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<script>
  $(function(){

    // 传递text
    $("#dinamicAdd").click(function(){
      var data = $("#itemName").val();
      var url = "http://localhost:8090/cakeHello/Kesyos/ajaxAdd/"+data;
      $.ajax({
        url:url,
        dataType:"text",
        type:"post",
        error:function(){
          alert("ajax失败了");
        },
        success:function(response){
          $("table").append(response);
        }
      })
    })

    // Ajax2 传递对象
    $("#dinamicAddJson").click(function(){
      var name = $("#itemName").val();
      var price = $("#itemPrice").val();
      var color = $("#itemColor").val();
      var postData = {
        name:name,
        price:price,
        color:color
      }
      var url = "http://localhost:8090/cakeHello/Kesyos/ajaxAddJson/";
      $.ajax({
        url:url,
        data:postData,
        dataType:"json",
        type:"post",
        error:function(){
          alert("ajax失败了");
        },
        success:function(response){
          console.log(response);
          if (response.processResult == true) {
            var td1 = $("<td>"+response.result.Kesyo.name+"</td>");
            var td2 = $("<td>"+response.result.Kesyo.price+"</td>");
            var td3 = $("<td>"+response.result.Kesyo.color+"</td>");
            var tr = $("<tr></tr>");
            tr.append(td1);
            tr.append(td2);
            tr.append(td3);

            $("table").append(tr);


          } else {
            alert("处理失败");
          }
        }
      })
    })
  })
</script>
<h1>Blog posts</h1>
  动态添加商品
    <input type="text" name="itemName" id="itemName" value="" placeholder="商品名">
    <input type="text" name="itemPrice" id="itemPrice" value="" placeholder="价格">
    <input type="text" name="itemColor" id="itemColor" value="" placeholder="颜色">
    <button id="dinamicAdd" type="button" name="button">动态追加Text</button>
    <button id="dinamicAddJson" type="button" name="button">动态追加Json</button>
<div class="loadTarget">

</div>
<p><?php echo $this->Html->link("商品追加", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>name</th>
        <th>price</th>
        <th>color</th>
        <th>Action</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php foreach ($kesyos as $kesyo): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($kesyo['Kesyo']['name'],array('controller' => 'kesyos', 'action' => 'view', $kesyo['Kesyo']['id'])); ?>
        </td>
        <td><?php echo $kesyo['Kesyo']['price']; ?></td>
        <td><?php echo $kesyo['Kesyo']['color']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $kesyo['Kesyo']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($kesyo); ?>
</table>
