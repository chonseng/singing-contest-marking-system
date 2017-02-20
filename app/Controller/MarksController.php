<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MarksController extends AppController {
	public $components = array('RequestHandler');
	public function beforeFilter() {

		if ($this->request->action != "login") {
			// var_dump($this->Session->read("user_is_logged"));
			if (!$this->Session->read("user_is_logged")) {
				$this->redirect("/marks/login");
			}
		}
	}

	public function login() {
		if ($this->request->is('post')) {
			$this->loadModel("User");

			$username = $this->request->data("User.login");
			$password = $this->request->data("User.password");
			$user = $this->User->findByUsernameAndPassword($username,md5($password));

			if (count($user) > 0) {
				$this->Session->write("user_is_logged", true);
				$_SESSION["user_id"] = $user["User"]["id"];
				$this->redirect("/");
			}
			else {
				$this->Session->setFlash(__('登入失敗'), 'default', array ('class' => 'alert-box alert'));
				$this->redirect("/marks/login");
			}
		}
	}
	

	public function index() {
		// for ($i=0; $i < 215; $i++) { 
		// 	$this->loadModel("User");
		// 	$is_repeated = false;
		// 	do {
		// 		$random = rand(100000,999999);
		// 		$user = $this->User->findByUsername($random);
		// 		if (count($user)>0) $is_repeated = true;
		// 	}while ($is_repeated);
		// 	$this->User->query("INSERT INTO users(`username`) VALUES ($random)");		
		// }

		// $this->loadModel("Singer");
		// $this->loadModel("User");
		
		// $marks = $this->Mark->findAllByUserId($_SESSION["user_id"]);
		// $_SESSION["is_voted"] = false;
		// if (count($marks)>0) {
		// 	$_SESSION["is_voted"] = true;
		// 	$voted_singer = $this->Singer->findBySingerId($marks[0]["Vote"]["singer_id"]);
		// 	$this->set("voted_singer",$voted_singer);
		// }
		// else {
		// 	$singers = $this->Singer->find("all",array("order"=>"singer_id"));
		// 	$this->set("singers",$singers);
			
		// }

		$this->loadModel("User");
		$user = $this->User->findById($_SESSION["user_id"]);
		$this->set("user",$user);

		$marks = $this->Mark->findAllByUserId($_SESSION["user_id"]);
		$this->set("marks",$marks);
	}

	public function add() {

		if ($this->request->is('post')) {
			// $data = $this->request->data["Activity"]["description"];
			// $this->request->data["Activity"]["description"] = $this->process_data($data);
			// var_dump($this->request->data);
			// exit;
			// $ip = $_SERVER['REMOTE_ADDR'];

			$is_correct = true;
			
			// if ($this->request->data["Mark"]["skill"]<=0 || $this->request->data["Mark"]["skill"]>10) $is_correct = false;
			// if ($this->request->data["Mark"]["interpretation"]<=0 || $this->request->data["Mark"]["interpretation"]>10) $is_correct = false;
			// if ($this->request->data["Mark"]["style"]<=0 || $this->request->data["Mark"]["style"]>10) $is_correct = false;
			// if ($this->request->data["Mark"]["creativity"]<=0 || $this->request->data["Mark"]["creativity"]>10) $is_correct = false;

			if ($is_correct) {
				$existing = $this->Mark->findBySingerIdAndUserIdAndType($this->request->data["Mark"]["singer_id"],$_SESSION["user_id"],$this->request->data["Mark"]["type"]);

				if ($existing) {
					$this->request->data["Mark"]["id"] = $existing["Mark"]["id"];
				}

				$this->Mark->create();
				$this->request->data["Mark"]["created_at"] = date('Y-m-d H:i:s');
				$this->request->data["Mark"]["user_id"] = $_SESSION["user_id"];
				$mydata = $this->request->data["Mark"];

				// $marking_percent = array(
				// 	"skill" => 1,
				// 	"interpretation" => 1,
				// 	"style" => 1,
				// 	"creativity" => 1
				// );

				$this->request->data["Mark"]["overall"] = $mydata["skill"] + $mydata["interpretation"] + $mydata["style"] + $mydata["creativity"];
				// var_dump($this->request->data);
				$marks = $mydata["skill"].','.$mydata["interpretation"].','.$mydata["style"].','.$mydata["creativity"];
				
				$this->request->data["Mark"]["marks"] = $marks;

				
				if ($this->Mark->save($this->request->data)) {
					$this->Session->setFlash(__('評分成功 (參賽者編號：'.$this->request->data["Mark"]["singer_id"]."，總分：".round($this->request->data["Mark"]["overall"]).")"), 'flash_notif', array ('class' => 'alert-box success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('評分失敗，請重新嘗試'), 'flash_notif', array ('class' => 'alert-box alert'));
				}
			}
			else {
				$this->Session->setFlash(__('評分失敗，分數輸入錯誤'), 'flash_notif', array ('class' => 'alert-box alert'));
			}
			
		}
		
	}

	public function logout() {
		$this->Session->write("user_is_logged", false);
		$this->redirect("/");
	}

	public function getMarks() {
		if (isset($_GET["type"])) $type = $_GET["type"]; else $type="";
		if (isset($_GET["singer_id"])) $singer_id = $_GET["singer_id"]; else $singer_id="";

		$filter = array();
		if ($type!="") $filter += array('Mark.user_id'=>$_SESSION["user_id"]);
		if ($type!="") $filter += array('Mark.type'=>intval($type));
		if ($singer_id!="") $filter += array('Mark.singer_id'=>intval($singer_id));
		$marks = $this->Mark->find("all",array(
			'order' => 'Mark.singer_id',
			'group' => 'Mark.singer_id',
  		'conditions' => $filter,
  		)
		);
		// var_dump($marks);
		// $marks = $this->Mark->findAllByUserId(2);
		// var_dump($marks);
		// var_dump($marks);
		$data = array();
		foreach ($marks as $key => $mark) {
			$data["skill"] = $mark["Mark"]["skill"];
			$data["interpretation"] = $mark["Mark"]["interpretation"];
			$data["style"] = $mark["Mark"]["style"];
			$data["creativity"] = $mark["Mark"]["creativity"];
		}
		$this->set('data', $data);
		$this->set('_serialize', 'data');
	}

}
