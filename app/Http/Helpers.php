<?php

if (! function_exists('success_response')) {
  function success_response($data = null)
  {
    return response()->json([
      'success' => true,
      'data' => $data 
    ], 200);
  }
}

if (! function_exists('error_response')) {
  function error_response($errorCode = null, $error = null, $data = null)
  {
    return response()->json([
      'success' => false,
      'errorCode' => $errorCode,
      'error' => $error,
      'data' => $data 
    ], 200);
  }
}

if (! function_exists('bad_request_response')) {
  function bad_request_response($errorCode = null, $error = null, $data = null)
  {
    return response()->json([
      'success' => false,
      'errorCode' => $errorCode,
      'error' => $error,
      'data' => $data 
    ], 400);
  }
}

if (! function_exists('unauthorized_response')) {
  function unauthorized_response($error = null, $data = null)
  {
    return response()->json([
      'success' => false,
      'error' => $error,
      'data' => $data 
    ], 401);
  }
}