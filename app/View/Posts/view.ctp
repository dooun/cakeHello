<!-- File: /app/View/Posts/view.ctp -->

<h1 style="font-size:2em;color:red;"><?php echo h($post['Post']['title']); ?></h1>



<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>


<p><?php echo h($post['Post']['body']); ?></p>
