<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_group(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `chart_account_list` set {$data} ";
		}else{
			$sql = "UPDATE `chart_account_list` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `chart_account_list` where `name` = '{$name}' and delete_flag = 0 ".($id > 0 ? " and id != '{$id}'" : ""));
		if($check->num_rows > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = " Account's Group Name already exists.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$gid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = " Account's Group has successfully added.";
				else
					$resp['msg'] = " Account's Group details has been updated successfully.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "An error occured.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
		}
		if($resp['status'] =='success')
			$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_group(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `chart_account_list` set delete_flag = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Account's Group has been deleted successfully.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_account(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `journal_list` set {$data} ";
		}else{
			$sql = "UPDATE `journal_list` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `journal_list` where `name` ='{$name}' and delete_flag = 0 ".($id > 0 ? " and id != '{$id}' " : ""))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = " Account's Name already exists.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$rid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = " Account has successfully added.";
				else
					$resp['msg'] = " Account has been updated successfully.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "An error occured.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
			if($resp['status'] =='success')
			$this->settings->set_flashdata('success',$resp['msg']);
		}
		return json_encode($resp);
	}
	function delete_account(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `journal_list` set delete_flag = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Account has been deleted successfully.");

		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_journal(){
		if(empty($_POST['id'])){
			$prefix = date("Ym-");
			$code = sprintf("%'.05d",1);
			while(true){
				$check = $this->conn->query("SELECT * FROM `journal_entries` where `code` = '{$prefix}{$code}' ")->num_rows;
				if($check > 0){
					$code = sprintf("%'.05d",ceil($code) + 1);
				}else{
					break;
				}
			}
			$_POST['code'] = $prefix.$code;
			$_POST['user_id'] = $this->settings->userdata('id');
		}
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))  && !is_array($_POST[$k])){
				if(!is_numeric($v) && !is_null($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				if(!is_null($v))
				$data .= " `{$k}`='{$v}' ";
				else
				$data .= " `{$k}`= NULL ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `journal_entries` set {$data} ";
		}else{
			$sql = "UPDATE `journal_entries` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$jid = !empty($id) ? $id : $this->conn->insert_id;
			$data = "";
			$this->conn->query("DELETE FROM `journal_items` where journal_id = '{$jid}'");
			foreach($account_id as $k=>$v){
				if(!empty($data)) $data .=", ";
				$data .= "('{$jid}','{$v}','{$group_id[$k]}','{$amount[$k]}')";
			}
			if(!empty($data)){
				$sql = "INSERT INTO `journal_items` (`journal_id`,`account_id`,`group_id`,`amount`) VALUES {$data}";
				$save2 = $this->conn->query($sql);
				if($save2){
					$resp['status'] = 'success';
					if(empty($id)){
						$resp['msg'] = " Journal Entry has successfully added.";
					}else
						$resp['msg'] = " Journal Entry has been updated successfully.";
				}else{
					$resp['status'] = 'failed';
					if(empty($id)){
						$resp['msg'] = " Journal Entry has failed to save.";
						$this->conn->query("DELETE FROM `journal_entries` where id = '{$jid}'");
					}else
						$resp['msg'] = " Journal Entry has failed to update.";
					$resp['error'] = $this->conn->error;
				}
			}else{
				$resp['status'] = 'failed';
				if(empty($id)){
					$resp['msg'] = " Journal Entry has failed to save.";
					$this->conn->query("DELETE FROM `journal_entries` where id = '{$jid}'");
				}else
					$resp['msg'] = " Journal Entry has failed to update.";
				$resp['error'] = "Journal Items is empty";
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "An error occured.";
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] =='success')
			$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}


	
	function delete_journal(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `journal_entries` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Journal Entry has been deleted successfully.");

		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function cancel_journal(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `journal_entries` set `status` = '3' where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," journaling has successfully cancelled.");

		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_group':
		echo $Master->save_group();
	break;
	case 'delete_group':
		echo $Master->delete_group();
	break;
	case 'save_account':
		echo $Master->save_account();
	break;
	case 'delete_account':
		echo $Master->delete_account();
	break;
	case 'save_journal':
		echo $Master->save_journal();
	break;
	case 'delete_journal':
		echo $Master->delete_journal();
	break;
	case 'cancel_journal':
		echo $Master->cancel_journal();
	break;
	default:
		// echo $sysset->index();
		break;
}