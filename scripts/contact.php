<?php

//ini_set('display_errors', 1);
error_reporting(-1);

/* Dependencies */
	
require_once("config.php");


Contact::start();


class Contact {

	const TIMEOUT = 5; // minutes to wait before allowing another message
	
	const NAME_EMPTY = 0;
	const NAME_INVALID = 1;
	const EMAIL_EMPTY = 2;
	const EMAIL_INVALID = 3;
	const MESSAGE_EMPTY = 4;
	const MESSAGE_INVALID = 5;
	const TIMED_OUT = 6;
	const NOT_SENT = 7;

	public static function start() {
		$con = self::connect();
		$info = self::getInfo();
		$validation = self::validate($info);
		$timedOut = false;
		$sent = false;
		
		if($validation['valid']) {
			$timedOut = self::isTimedOut($con, $info);
			if(!$timedOut) {
				$sent = self::sendEmail($info);
				self::dbInsert($con, $info);
			}
		}
			
		self::printStatus($validation, $timedOut, $sent);

		self::close($con);
	}
	
	private static function connect() {
		$con = new mysqli("localhost", DB_USER, DB_PASS, DB);
		if ($con->connect_error) {
			die("Failed to connect to MySQL: " . $con->connect_error);
		}
		return $con;
	}
	
	private static function getInfo() {
		filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		
		$info = array();
		$info['name'] = filter_input(INPUT_POST, 'name');
		$info['from'] = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_EMAIL);
		$info['message'] = filter_input(INPUT_POST, 'message');
		$info['time'] = time();
		$info['ip'] = $_SERVER['REMOTE_ADDR'];
		return $info;
	}
	
	private static function validate($info) {
		$errors = array();
		
		if(empty($info['name']))
			array_push($errors, self::NAME_EMPTY);
		else if(!$info['name'])
			array_push($errors, self::NAME_INVALID);
			
		if(empty($info['from']))
			array_push($errors, self::EMAIL_EMPTY);
		else if(!$info['from'] || !filter_var($info['from'], FILTER_VALIDATE_EMAIL))
			array_push($errors, self::EMAIL_INVALID);
		
		if(empty($info['message']))
			array_push($errors, self::MESSAGE_EMPTY);
		else if(!$info['message'])
			array_push($errors, self::MESSAGE_INVALID);
		
		$validation = array();
		if(count($errors) > 0) {
			$validation['valid'] = false;
			$validation['errors'] = $errors;
		} else {
			$validation['valid'] = true;
		}
		
		return $validation;
	}
	
	private static function isTimedOut($con, $info) {
		$sql='SELECT COUNT(*) FROM `contact` WHERE `ip` = ? AND `time` > ?';
		 
		/* Prepare statement */
		$stmt = $con->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
		 
		/* Bind parameters */
		$timeoutTime = $info['time'] - (60 * self::TIMEOUT);
		$stmt->bind_param('si', $info['ip'], $timeoutTime);
		 
		/* Execute statement */
		$stmt->execute();
		
		/* Get result */
		$stmt->bind_result($count);
		$stmt->fetch();
		
		if($count != 0)
			return true;
		else
			return false;
	}
	
	
	private static function sendEmail($info) {
		$to      = MY_EMAIL;
		$subject = 'MKaiser.io Contact Message';
		$message = $info['name'] . " sent the following message:\r\n\r\n" . $info['message'];
		$headers = 	'From: MKaiser.io <noreply@mkaiser.io>' . "\r\n" .
					'Reply-To: ' . $info['name'] . '<' . $info['from'] . ">\r\n" .
					'X-Mailer: PHP/' . phpversion();
		return mail($to, $subject, $message, $headers);
	}
	
	private static function dbInsert($con, $info) {
		$sql = "INSERT INTO `contact` (`name`, `from`, `message`, `time`, `ip`) VALUES (?, ?, ?, ?, ?)";
	 
		/* Prepare statement */
		$stmt = $con->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
		
		/* Bind parameters */
		$stmt->bind_param('sssis', $info['name'], $info['from'], $info['message'], $info['time'], $info['ip']);
	 
		/* Execute statement */
		$stmt->execute();
	 
		$stmt->close();
	}
	
	private static function printStatus($validation, $timedOut, $sent) {
		$output = array();
		$output['success'] = false;
		if(!$validation['valid']) {
			$output['errors'] = $validation['errors'];
		}
		else if($timedOut) {
			$output['errors'] = array(self::TIMED_OUT);
		}
		else if(!$sent) {
			$output['errors'] = array(self::NOT_SENT);
		}
		else {
			$output['success'] = true;
		}
		echo json_encode($output);
	}
	
	private static function close($con) {
		$con->close();
	}
	
}


?>