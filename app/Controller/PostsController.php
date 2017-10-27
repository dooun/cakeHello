<?php
class PostsController extends AppController {
	public $helpers = array (
			'Html',
			'Form'
	);

	var $components = array('DebugKit.Toolbar');

	public function index() {

		// 1 从数据库中查询Post模型关联数据库的数据
		$result = $this->Post->find ( 'all' );

		// 2 把 查询的结果传递给视图
		$this->set ( 'posts', $result );
	}

	public function view($id = null) {
		if (! $id) {
			throw new NotFoundException ( __ ( 'Invalid post' ) );
		}

		$post = $this->Post->findById ( $id );
		if (! $post) {
			throw new NotFoundException ( __ ( 'Invalid post' ) );
		}
		$this->set ( 'post', $post );
	}

	/**
	 *  这是一个添加文章的函数
	 */
	public function add() {

		// 1 判断当前请求是否是post类型
		if ($this->request->is ( 'post' )) {

			// 是post类型的请求

			// 创建了一个Post模型
			$this->Post->create();

			// 获取提交的数据
			$data = $this->request->data;
			debug($data);

			// 调用Post模型的save()方法，保存数据
			// save()方法会返回插入的这条数据
			$reslt = $this->Post->save ( $data );
			debug($reslt);
			if ($reslt) {
				// 在画面上显示一个message
				$this->Flash->success ( __( '保存成功.' ) );

				// 跳转当前的画面到 当前控制器的index Action
				return $this->redirect ( array (
						'action' => 'index'
				) );
			}
			// $this->Flash->error ( __ ( '保存失败.' ) );
		} else {
			// 不是post类型的请求
			// echo "不是post";
			// $data['Post']['title'] = "标题";
			// $data['Post']['body'] = "你好呀";
			// $this->request->data = $data;
		}
	}

	/**
	 *
	 * @param unknown $id
	 * @throws NotFoundException
	 * @return CakeResponse|NULL
	 */
	public function edit($id = null) {

		// 如果没有id，手动抛一个异常
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

		// DB通过id查询Post的数据
    $post = $this->Post->findById($id);

		$postA['PostA'] = $post['Post'];
		debug($postA);

		// 如果查询结果为空，则抛出异常
		if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

		// 判断 当前请求是不是post类型，或者put类型
    if ($this->request->is(array('post', 'put'))) {
			echo "进来啦";

				// 给当前的Post对象的id成员变量赋值为参数id
        $this->Post->id = $id;

				// 把请求的数据进行保存,保存到Post模型关联的数据库
				$saveResult = $this->Post->save($this->request->data);

				// 是否保存成功
        if ($saveResult) {

						// 显示一条message
            $this->Flash->success(__('更改成功.'));

						// 跳转/重定向到index 画面
            return $this->redirect(array('action' => 'index'));
        }
				// 显示失败信息
        $this->Flash->error(__('Unable to update your post.'));
    }
		echo "没进来";


		// 如果请求数据不存在
    if (!$this->request->data) {
				// 把$post变量设置给当前的请求数据。
        $this->request->data = $post;
    }
}




}
