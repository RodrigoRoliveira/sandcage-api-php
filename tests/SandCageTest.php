<?php 
include_once(dirname(dirname(__FILE__)) . '/src/SandCage.php');

use SandCage\SandCage;

class SandCageTest extends PHPUnit_Framework_TestCase {

	public function testListFiles() {
		$payload = array();
		$sandcage = new SandCage;
		$sandcage->call('list-files', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testListFilesWithPage() {
		$payload = array(
			'page' => 2
		);
		$sandcage = new SandCage;
		$sandcage->call('list-files', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testListFilesWithPageAndResultsPerPage() {
		$payload = array(
			'page' => 1,
			'results_per_page' => 10
		);
		$sandcage = new SandCage;
		$sandcage->call('list-files', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testGetInfoWithRequestID() {
		$payload = array(
			'request_id' => '[request_id]'
		);
		$sandcage = new SandCage;
		$sandcage->call('get-info', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testGetInfoWithFileTokens() {
		$payload = array(
			'files' => array(
				array('file_token' => '[file_token 1]'),
				array('file_token' => '[file_token 2]'),
				array('file_token' => '[file_token 3]')
			)
		);
		$sandcage = new SandCage;
		$sandcage->call('get-info', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testScheduleFiles() {
		$payload = array(
			'jobs' => array(
				array(
					'url' => 'http://cdn.sandcage.com/p/a/img/logo.jpg',
					'tasks' => array(
						array(
							'actions' => 'save'
						),
						array(
							'actions' => 'resize',
							'filename' => 'hello_world.jpg',
							'width' => 200
						),
						array(
							'actions' => 'crop',
							'coords' => '10,10,50,50'
						),
						array(
							'reference_id' => '1234567890',
							'actions' => 'rotate',
							'degrees' => 90
						),
						array(
							'actions' => 'cover',
							'width' => 60,
							'height' => 60,
							'cover' => 'middle,center'

						)
					)
				),
				array(
					'url' => 'http://cdn.sandcage.com/p/a/img/header_404.png',
					'tasks' => array(
						array(
							'actions' => 'resize',
							'height' => 30
						)
					)
				)
			)
		);
		$sandcage = new SandCage;
		$sandcage->call('schedule-tasks', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}

	public function testDestroyFiles() {
		$payload = array(
			'files' => array(
				array('reference_id' => '[reference_id]'),
				array('file_token' => '[file_token]')
			)
		);
		$sandcage = new SandCage;
		$sandcage->call('destroy-files', $payload);

		$this_response = json_decode($sandcage->response, true);

		$this->assertEquals($sandcage->status["http_code"], 200);

		// The following are all expected to be false if the sandcage instance is initialized with a valid API key
		$expected = array('request_id', 'status', 'error_msg');
		foreach ($this_response as $key=>$value) {
			$this->assertTrue(in_array($key, $expected));
		}
	}
}