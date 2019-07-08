<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

	/**
	 * 正常状态使用
	 *
	 * @param int    $code
	 * @param string $msg
	 * @param array  $data
	 * @param array  $extFields
	 * @return \Illuminate\Http\JsonResponse
	 */
	function responseJson($code = 200, $msg = 'success', $data = [], $extFields = [])
	{
	    $responseData = compact('code', 'msg', 'data');
	    $responseData = array_merge($responseData, $extFields);
	    return response()->json($responseData);
	}

}
