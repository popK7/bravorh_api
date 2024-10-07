<?php

namespace App\Traits;

use Carbon\Carbon;

trait ApiResponser
{
    private function successResponse($code, $message, $data = null)
	{
        $response = [
            'response' => [
                'status'      => "success",
                'code'        => $code,
                'message'     => $message,
            ]
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
	}

	protected function errorResponse($code, $message, $errorDetails = null)
	{
        $response = [
            'response' => [
                'status'  => "error",
                'code'    => $code,
                'error'     => [
                    'message'   => $message,
                    'timestamp' => Carbon::now(),
                ],
            ]
        ];
        if ($errorDetails !== null) {
            $response['response']['error']['details'] = $errorDetails;
        }
        return response()->json($response, $code);
	}
}
