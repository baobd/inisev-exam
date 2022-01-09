<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    protected function simpleSuccess(string $message = null, string $status = "SUCCESS", string $title = "Success",
                                     int $httpCode = 200, int $customCode = null): JsonResponse
    {
        if ($httpCode >= 200 && $httpCode < 300 && $customCode > 0) {
            $myCode = $customCode;
        } else {
            $myCode = $httpCode;
        }
        return response()->json([
            'status' => $status,
            'code' => $myCode,
            'title' => $title,
            'message' => $message
        ], $httpCode);
    }

    protected function simpleError(int $httpCode, string $message = null, string $title = "Error", int $customCode = null): JsonResponse
    {
        if ($httpCode >= 200 && $httpCode < 300 && $customCode > 0) {
            $myCode = $customCode;
        } else {
            $myCode = $httpCode;
        }
        return response()->json([
            'status' => 'ERROR',
            'code' => $myCode,
            'title' => $title,
            'message' => $message
        ], $httpCode);
    }

    protected function success($data, string $message = null, string $status = "SUCCESS",  string $title = "Success",
                               int $httpCode = 200, int $customCode = null): JsonResponse
    {
        if ($httpCode >= 200 && $httpCode < 300 && $customCode > 0) {
            $myCode = $customCode;
        } else {
            $myCode = $httpCode;
        }
        return response()->json([
            'status' => $status,
            'code' => $myCode,
            'title' => $title,
            'message' => $message,
            'data' => $data
        ], $httpCode);
    }

    protected function error(int $httpCode, string $message = null, string $title = "Error", $data = null, int $customCode = null): JsonResponse
    {
        if ($httpCode >= 200 && $httpCode < 300 && $customCode > 0) {
            $myCode = $customCode;
        } else {
            $myCode = $httpCode;
        }
        return response()->json([
            'status' => 'ERROR',
            'code' => $myCode,
            'title' => $title,
            'message' => $message,
            'errors' => $data
        ], $httpCode);
    }
}
