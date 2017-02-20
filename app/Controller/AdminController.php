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
class AdminController extends AppController {
	public function beforeFilter() {
		if ($this->request->action != "login") {
			if (!$this->Session->read("is_logged")) {
				$this->redirect("/admin/login");
			}
		}
	}

	public function index() {
		$this->loadModel("Mark");
		// $this->loadModel("Singer");
		// $all_singers= $this->Singer->find("all");
		// $amount = count($all_singers);

		// $results = array();
		// for ($i=0; $i < $amount; $i++) { 
		// 	$votes = $this->Vote->findAllBySingerId($i+1);
		// 	$this_singer = $this->Singer->findBySingerId($i+1);
		// 	$results[$i]["name"] = $this_singer["Singer"]["name"];
		// 	$results[$i]["amount"] = count($votes);
		// }
		// $votes_amount = count($this->Vote->find("all"));

		$all_marks = $this->Mark->find("all", array('order' => array('singer_id' => 'asc')));

		// var_dump(isset($all_marks[0]["Mark"]["skill"]));
		$marks0 = array(); // singe
		$marks1 = array();	// multiple
		foreach ($all_marks as $key => $mark) {
			if ($mark["Mark"]["type"] == 0) {
				$marks0[$mark["Mark"]["singer_id"]]["singer_id"] = $mark["Mark"]["singer_id"];
				if (!isset($marks0[$mark["Mark"]["singer_id"]]["skill"])) $marks0[$mark["Mark"]["singer_id"]]["skill"] = $mark["Mark"]["skill"];
				else $marks0[$mark["Mark"]["singer_id"]]["skill"] = $marks0[$mark["Mark"]["singer_id"]]["skill"] ."+". $mark["Mark"]["skill"];

				if (!isset($marks0[$mark["Mark"]["singer_id"]]["interpretation"])) $marks0[$mark["Mark"]["singer_id"]]["interpretation"] = $mark["Mark"]["interpretation"];
				else $marks0[$mark["Mark"]["singer_id"]]["interpretation"] = $marks0[$mark["Mark"]["singer_id"]]["interpretation"] ."+". $mark["Mark"]["interpretation"];

				if (!isset($marks0[$mark["Mark"]["singer_id"]]["style"])) $marks0[$mark["Mark"]["singer_id"]]["style"] = $mark["Mark"]["style"];
				else $marks0[$mark["Mark"]["singer_id"]]["style"] = $marks0[$mark["Mark"]["singer_id"]]["style"] ."+". $mark["Mark"]["style"];

				if (!isset($marks0[$mark["Mark"]["singer_id"]]["creativity"])) $marks0[$mark["Mark"]["singer_id"]]["creativity"] = $mark["Mark"]["creativity"];
				else $marks0[$mark["Mark"]["singer_id"]]["creativity"] = $marks0[$mark["Mark"]["singer_id"]]["creativity"] ."+". $mark["Mark"]["creativity"];

				if (!isset($marks0[$mark["Mark"]["singer_id"]]["overall"])) $marks0[$mark["Mark"]["singer_id"]]["overall"] = $mark["Mark"]["overall"];
				else $marks0[$mark["Mark"]["singer_id"]]["overall"] += $mark["Mark"]["overall"];
			}
			else {
				$marks1[$mark["Mark"]["singer_id"]]["singer_id"] = $mark["Mark"]["singer_id"];
				if (!isset($marks1[$mark["Mark"]["singer_id"]]["skill"])) $marks1[$mark["Mark"]["singer_id"]]["skill"] = $mark["Mark"]["skill"];
				else $marks1[$mark["Mark"]["singer_id"]]["skill"] = $marks1[$mark["Mark"]["singer_id"]]["skill"] ."+". $mark["Mark"]["skill"];

				if (!isset($marks1[$mark["Mark"]["singer_id"]]["interpretation"])) $marks1[$mark["Mark"]["singer_id"]]["interpretation"] = $mark["Mark"]["interpretation"];
				else $marks1[$mark["Mark"]["singer_id"]]["interpretation"] = $marks1[$mark["Mark"]["singer_id"]]["interpretation"] ."+". $mark["Mark"]["interpretation"];

				if (!isset($marks1[$mark["Mark"]["singer_id"]]["style"])) $marks1[$mark["Mark"]["singer_id"]]["style"] = $mark["Mark"]["style"];
				else $marks1[$mark["Mark"]["singer_id"]]["style"] = $marks1[$mark["Mark"]["singer_id"]]["style"] ."+". $mark["Mark"]["style"];

				if (!isset($marks1[$mark["Mark"]["singer_id"]]["creativity"])) $marks1[$mark["Mark"]["singer_id"]]["creativity"] = $mark["Mark"]["creativity"];
				else $marks1[$mark["Mark"]["singer_id"]]["creativity"] = $marks1[$mark["Mark"]["singer_id"]]["creativity"] ."+". $mark["Mark"]["creativity"];

				if (!isset($marks1[$mark["Mark"]["singer_id"]]["overall"])) $marks1[$mark["Mark"]["singer_id"]]["overall"] = $mark["Mark"]["overall"];
				else $marks1[$mark["Mark"]["singer_id"]]["overall"] += $mark["Mark"]["overall"];
			}

		}

		function cmp($a, $b)
		{	
			if ($a["overall"] == $b["overall"]) {
		        return 0;
		    }
		    return ($a["overall"]> $b["overall"]) ? -1 : 1;
		}

		usort($marks0, "cmp");
		usort($marks1, "cmp");
		// echo "<pre>";
		// var_dump($marks);

		// $results = array();
		// foreach ($marks as $key => $mark) {
		// 	$results[$mark["overall"]][$mark["singer_id"]] = $mark;
		// }
		// echo "<pre>";
		// var_dump($results);

		$this->loadModel("User");
		$users_amount = count($this->User->find("all"));


		$this->set("marks0",$marks0);
		$this->set("marks1",$marks1);
		$this->set("users_amount",$users_amount);

		$this->loadModel("Singer");
		$singer = $this->Singer->findById(1);
		$this->set("singer",$singer);
	}

	public function login() {
		if ($this->request->is('post')) {

			$username = $this->request->data("Admin.login");
			$password = $this->request->data("Admin.password");
			$user = $this->Admin->findByUsernameAndPassword($username,md5($password));

			
			if (count($user) > 0) {
				$this->Session->write("is_logged", true);
				$this->redirect("/admin");
			}
			else {
				$this->Session->setFlash(__('登入失敗'), 'default', array ('class' => 'alert-box alert'));
				$this->redirect("/admin/login");
			}
		}
	}

	public function logout() {
		$this->Session->write("is_logged", false);
		$this->redirect("/admin");
	}


	public function deleteall() {
		$this->loadModel("Mark");
		$this->Mark->deleteAll(array('1 = 1'));
		$this->Session->setFlash(__('成功刪除所有資料'), 'flash_notif', array ('class' => 'alert-box success'));
		$this->redirect("/admin");
	}

	public function singers() {
		$this->loadModel("Singer");
		$singers = $this->Singer->find("all");
		$this->set("singers",$singers);
	}

	public function newsingers() {
		$this->loadModel("Singer");
		$this->Singer->deleteAll(array('1 = 1'));
		for ($i=0; $i < 200; $i++) { 
			$is_repeated = false;
			do {
				$word = "abcdefghijkmnpqrstuvwxyz23456789";
				$random = substr(str_shuffle($word),0,6);
				// $random = rand(100000,999999);
				$singer = $this->Singer->findByPassword($random);
				if (count($singer)>0) $is_repeated = true;
			}while ($is_repeated);
			$num = $i+1;
			$data["Singer"]["id"] = $num;
			$data["Singer"]["singer_id"] = $num;
			$data["Singer"]["password"] = $random;
			$data["Singer"]["created_at"] = date('Y-m-d H:i:s');
			$this->Singer->save($data);
			// $this->Singer->query("INSERT INTO marking_singers(`singer_id`,`password`) VALUES ($num,'$random')");		
		}
		$this->Session->setFlash(__('成功更改密碼紙'), 'flash_notif', array ('class' => 'alert-box success'));
		$this->redirect("/admin");
	}

	public function marks() {
		if ($this->request->is('get')) {
			$id = $_GET["id"];
			$this->loadModel("Mark");
			$marks = $this->Mark->findAllBySingerId($id);
			$this->set("marks",$marks);
			
		}
	}

	public function deleteMark($id) {
		$this->loadModel("Mark");
		$this->Mark->delete($id);
		$this->Session->setFlash(__('成功刪除'), 'flash_notif', array ('class' => 'alert-box success'));
		// $this->redirect("/admin/marks");
		$this->redirect( $this->referer() );
	}
}
