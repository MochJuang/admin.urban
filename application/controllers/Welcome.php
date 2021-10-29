<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		// $this->load->view('welcome_message');
		// echo getBarcodeReturn('URB-087738977455-11-2020-0002');

		$client = new GuzzleHttp\Client(['base_uri' => 'http://150.107.142.38/api/']);
		$request = $client->request('POST', 'authService', [
			'multipart' => [
				[
					'name' => 'username',
					'contents' => 'bagus',
				],
				[
					'name' => 'password',
					'contents' => '12345',
				]
			]
		]);
		$response = $request->getBody();
		$token = json_decode($response);
		print_r($token);
	}
}
