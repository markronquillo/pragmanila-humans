<?php

namespace App\Controllers;

use App\Models\Human;
use Symfony\Component\HttpFoundation\Request;

class HumanController 
{
	/**
	 * Returns all human data
	 * 
	 * @return json
	 */
	public function index() 
	{
		$data = Human::all();

		$response = [
			'code' => 200,
			'data' => $data,
		];
		return json_encode($response);
	}	

	/**
	 * Returns a specific human data
	 * @param  array $values - contains all url values
	 * @return json 
	 */
	public function show($values) 
	{
		$id = $values['id'];

		// default response	
		$code = 200;
		$message = 'Successfully fetched human data';

		$human = Human::find($id);

		if (is_null($human)) {
			$code = 404;
			$message = 'Human does not exist';
		}

		$response = [
			'code' => $code,
			'data' => $human,
			'message' => $message,
		];

		return json_encode($response);
	}

	/**
	 * Creates a new Human data
	 * @return json 
	 */
	public function store($vars, Request $request) 
	{
		$data = $request->request->all();

		// validation
		if (!isset($data['first_name'])) {
			return json_encode([
				'code' => 400,
				'message' => 'First name is required'
			]);
		}

		if (!isset($data['last_name'])) {
			return json_encode([
				'code' => 400,
				'message' => 'Last name is required'
			]);
		}

		$firstname = $data['first_name'];
		$lastname = $data['last_name'];

		$human = new Human();
		$human->first_name = $firstname;
		$human->last_name = $lastname;
		$human->save();

		return json_encode([
			'code' => 200,
			'data' => $human,
			'message' => 'Human data successfully saved'
		]);
	}

	/**
	 * Updates a specific Human data
	 * 
	 * @param  array $values - contains all url values
	 * @return json 
	 */
	public function update($values, Request $request) 
	{
		$data = $request->request->all();
		$id = $values['id'];

		// validation
		if (!isset($data['first_name'])) {
			return json_encode([
				'code' => 400,
				'message' => 'First name is required'
			]);
		}

		if (!isset($data['last_name'])) {
			return json_encode([
				'code' => 400,
				'message' => 'Last name is required'
			]);
		}

		$firstname = $data['first_name'];
		$lastname = $data['last_name'];

		$human = Human::find($id);
		$human->first_name = $firstname;
		$human->last_name = $lastname;
		$human->save();

		return json_encode([
			'code' => 200,
			'data' => $human,
			'message' => 'Human data successfully updated'
		]);
	}

	/**
	 * Deletes the given human data
	 * @param  array $vars parameters
	 * @return json       
	 */
	public function destroy($vars)  
	{
		$id = $vars['id'];

		$result = Human::destroy($id);

		$response = [
			'code' => $result ? 200 : 404,
			'message' => $result ? 'Human successfully deleted' : 'Human does not exist'
		];
		return json_encode($response);
	}
}