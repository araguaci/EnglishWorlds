<?php

declare(strict_types=1);

namespace English\Http\Controllers;

use English\Status;
use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function getComments(Request $request)
	{
		$this->validate($request, [
			'status_id'     => 'bail|required|integer|exists:statuses,id',
			'starting_from' => 'bail|required|integer',
		]);

		return Status::find($request->status_id)->comments->splice($request->starting_from, 5);
	}
}
