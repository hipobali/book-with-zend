<?php

// class Application_Model_Account extends Application_Model_Abstract {

	// public static function getData() {
	// 	$db = self::getDb();
	// 	$sql = "";
	// 	$row = $db->fetchRow($sql);
	// 	// $row = $db->fetchAll($sql);
	// }

	// public function addData($params = array()) {
	// 	$db = self::getDb();
	// 	try {
	// 		$db->beginTransaction();
	// 		$db->insert('table', array('adminname' => $admin_name, 'loginemail' => $admin_email, 'password' => $admin_pass, 'created' => Date('Y-m-d H:i:s')));
	// 		$db->commit();
	// 	} catch (Exception $e) {
	// 		$db->rollBack();
	// 		throw new RuntimeException($e->getMessage());
	// 	}
	// }

	// public static function deleteData($id){
	// 	$db = self::getDb();
	// 	try {
	// 		$db->beginTransaction();
	// 		$db->delete('table', 'id=' . $id);
	// 		$db->commit();
	// 	} catch (Exception $e) {
	// 		$db->rollBack();
	// 		throw new RuntimeException($e->getMessage());
	// 	}
	// }

	// public static function editData($data, $id) {
	// 	$db = self::getDb();
	// 	try {
	// 		$db->beginTransaction();
	// 		$where = $db->quoteInto('id=?', $adminID);
	// 		$db->update('table', $data, $where);
	// 		$db->commit();
	// 		return true;
	// 	} catch (Exception $e) {
	// 		$db->rollBack();
	// 		throw new RuntimeException($e->getMessage());
	// 	}
	// }

// }

?>