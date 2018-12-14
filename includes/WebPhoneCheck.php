<?php

class WebPhoneCheck {
	public static $api_url = "https://www.webphonecheck.com/api";
	public static $last_response = NULL;

	public static function make_call($api_key, $number, $code, $user_id = "", $extension = "", $mode = "ask", $async = true, $notify_url = "", $call_limit = 0, $user_limit = 0) {
		$url = self::$api_url . "/call?" . http_build_query(array(
			"api_key" => $api_key,
			"number" => $number,
			"code" => $code,
			"user_id" => $user_id,
			"extension" => $extension,
			"mode" => $mode,
			"async" => $async,
			"notify_url" => $notify_url,
			"call_limit" => $call_limit,
			"user_limit" => $user_limit
		), NULL, "&");
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$contents = curl_exec($ch);
		$data = json_decode($contents);
		
		if (is_object($data)) {
			self::$last_response = $data;
		}
		
		if (!is_object($data) || !isset($data->calling)) {
			return NULL;
		}

		return !!$data->calling;
	}
	
	public static function get_message($message_id = NULL) {
		if ($message_id === NULL) {
			$message_id = isset($_REQUEST["message_id"]) ? $_REQUEST["message_id"] : 0;
		}
		
		$url = self::$api_url . "/getMessage?" . http_build_query(array(
			"message_id" => $message_id
		), NULL, "&");
		echo $url;
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$contents = curl_exec($ch);
		$data = json_decode($contents);
		
		if (is_object($data)) {
			self::$last_response = $data;
		}
		
		if (!is_object($data) || !isset($data->errors) || $data->errors) {
			return NULL;
		}

		return $data;
	}
}