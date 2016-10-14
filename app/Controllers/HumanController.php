<?php

namespace App\Controllers;


class HumanController {
	
	public function index() {
		$data = [
			'first_name' => 'Mark Joseph',
			'middle_name' => 'De Leon',
			'last_name' => 'Ronquillo'
		];
		return json_encode($data);
	}	

	public function show() {

	}

	public function store() {

	}

	public function update() {

	}

	public function destroy() {

	}
}