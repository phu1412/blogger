<?php

namespace App\Traits;

use App\Utils\Result;
use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * @param array  $data
     * @param int    $statusCode
     * @param string $message
     *
     * @return string
     */
    public function successResponse($data = [], $statusCode = Result::OK, $message = null)
    {
        $response = [
            'success' => true,
            'status_code' => $statusCode,
            'errors' => [],
            'data' => $data,
        ];

        return response()->json($response);
    }

    /**
     * @param int    $statusCode
     * @param string $message
     * @param array  $errors
     *
     * @return string
     */
    public function errorResponse($statusCode = Result::ERROR, $message = null, $errors = [])
    {
        $response = [
            'success' => false,
            'status_code' => $statusCode,
            'errors' => ['message' => $message ?: Result::$resultMessage[$statusCode]],
            'data' => [],
        ];

        return response()->json($response);
    }

    /**
     * The function response paging success.
     *
     * @param null  $current
     * @param null  $total
     * @param array $data
     *
     * @return JsonResponse
     */
    public function responsePagingSuccess($current = null, $total = null, $data = [])
    {
        $response = [
            'success' => true,
            'status_code' => Result::OK,
            'current' => $current,
            'total' => $total,
            'result' => 'Success',
            'data' => $data,
        ];

        return response()->json($response);
    }

    /**
     * Pagination Cursors.
     *
     * @param null|array $cursors
     * @param array      $data
     *
     * @return JsonResponse
     */
    public function responsePagingCursorsSuccess($cursors = null, $data = [])
    {
        $response = [
            'success' => true,
            'status_code' => Result::OK,
            'cursors' => $cursors,
            'result' => 'Success',
            'data' => $data,
        ];

        return response()->json($response);
    }
}
