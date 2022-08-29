<?php

namespace App\Helpers;

class JsonResponse
{
    const MSG_ADDED_SUCCESSFULLY = 'responses.msg_added_successfully';
    const MSG_UPDATED_SUCCESSFULLY = "responses.msg_updated_successfully";
    const MSG_DELETED_SUCCESSFULLY = "responses.msg_deleted_successfully";
    const MSG_NOT_ALLOWED = "responses.msg_not_allowed";
    const MSG_NOT_AUTHORIZED = "responses.msg_not_authorized";
    const MSG_NOT_AUTHENTICATED = "responses.msg_not_authenticated";
    const MSG_USER_NOT_ENABLED = "responses.msg_user_not_enabled";
    const MSG_NOT_FOUND = "responses.msg_not_found";
    const MSG_USER_NOT_FOUND = "responses.msg_user_not_found";
    const MSG_EMAIL_NOT_VERIFIED = "your email not verified";
    const MSG_WRONG_PASSWORD = "responses.msg_wrong_password";
    const MSG_SUCCESS = "responses.msg_success";
    const MSG_FAILED = "responses.msg_failed";
    const MSG_LOGIN_SUCCESSFULLY = "responses.msg_login_successfully";
    const MSG_LOGIN_FAILED = "responses.msg_login_failed";
    const MSG_LOGOUT_SUCCESSFULLY = "responses.msg_logout_successfully";
    const MSG_ERORR_IN_CALCULATE_ORDER_TOTAL = 'responses.msg_erorr_in_calculate_order_total';
    const MSG_DATA_IS_FRESH = 'responses.msg_data_is_fresh';
    const MSG_YOU_HAVE_TO_REFRESH_YOUR_DATA = 'responses.msg_you_have_to_refresh_your_data';

    /**
     * @param array $data
     * @param string $message
     * @param int $code
     * @param array|null $pagination
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $code , $message , $pagination = null){
        return response()->json([
            'message' => trans($message),
            'data' => $data,
            'pagination' => $pagination,
            'status' => $code == 200 || $code == 201 || $code == 204
        ] , $code);
    }

    /**
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error( $code , $message ){
        return response()->json([
            'message' => trans($message),
            'status' => false
        ] , $code);
    }
}
