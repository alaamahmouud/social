<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notification as NotificationResources;

use App\Mail\ResetPassword;

use App\Models\Notification;


use App\MyHelper\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ParentApi extends Controller
{

    public $helper;
    public $guard;
    public $model;
    public $table;
    public $uniqueRow;
    public $sendPinCodeErrorMessage;
    public $apiResource;
   // public $pointsCosts = ['api_client' => 'client_points_cost', 'api_delivery' => 'provider_points_cost'];
    public $relations = ['api' => 'clients'];

    /**
     * @return int
     */
    public function getPinCode(): int
    {
        //TODO rand when confirm rand(1000 , 9999)
        return 123123;
    }

    /**
     * @return string
     */
    public function getPinCodeExpiredDate(): string
    {
        return Carbon::now()->addMinutes(1);
    }

    /**
     * @return string
     */
    public function checkPinCodeExpiredDate($expired_date): string
    {
        $check = Carbon::now() > $expired_date ? false : true;
        return $check;
    }
    public function sendPinCodeEmail($record,$pin_code){
        Mail::to($record->email)

            ->bcc("testpincode75@gmail.com")
            ->send(new ResetPassword($pin_code));
        return $this->helper->responseJson(1,'برجاء فحص البريد الالكتروني',
            [
                'pin_code_for_test'=>$pin_code,
//                'mail_fails' => Mail::failures(),
            ]
        );

    }
    public function sendPinCode(Request $request , $model = null)
    {
        // resend pin code in register or login
        $record = $model == null ? $this->model->where('email', $request->email)->first() : $model;
//dd($record);
        if ($record) {

            $pin_code = $this->getPinCode();
            $record->pin_code = $pin_code;

            //TODO
//            $this->sendSmsWithCode($record->phone , $pin_code);
                $this->sendPinCodeEmail($record,$pin_code);
            $record->pin_code_date_expired = $this->getPinCodeExpiredDate();
            $record->save();

            return $this->helper->responseJson(1, 'تم ارسال الكود التأكيد لهاتفك بنجاح');
        }
        return $this->helper->responseJson(0, $this->sendPinCodeErrorMessage);
    }

    public function showProfile(Request $request)
    {
        $user = $request->user($this->guard);

        return $this->helper->responseJson(1, 'SUCCESS', ['token' => $request->bearerToken(), 'user' => $user]);

    }

    public function logOut(Request $request)
    {
        $rules =
            [
                'serial_number' => 'required|exists:tokens,serial_number',
            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first(), $data->errors());
        }

        $request->user($this->guard)->tokens()->where('serial_number', $request->serial_number)->delete();

        return $this->helper->responseJson(1, 'تم تسجيل الخروج بنجاح');
    }


    /////////////////////////////////////////////



    ///////// Notifications //////////////////////////


    public function notifications(Request $request)
    {
        $records = $request->user($this->guard)->morphNotifications()->where(function ($q) use ($request) {

            if ($request->notification_id) {

                $q->where('notification_id', $request->notification_id);
            }

        })->latest()->paginate(20);




        return (NotificationResources::collection($records))->additional([
            'status' => 1,
            'massage' => 'تمت العملية',
        ]);
    }
    public function deleteNotification(Request $request)
    {
        $relations = $this->relations[$this->guard];
        $user = $request->user('api');

        $rules =
            [
                'notification_id' => 'required|exists:notifications,id'
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $notification = $user->morphNotifications()->find($request->notification_id);

        if (!$notification)
            return $this->helper->responseJson(0, 'حدث خطأ ما');

        $notification->$relations()->detach($user->id);

        if (!$notification->clients()->count() || !$notification->deliveries()->count())
            $notification->delete();

        return $this->helper->responseJson(1, 'تم الحذف بنجاح');
    }

    public function readNotification(Request $request)
    {
        $relations = $this->relations[$this->guard];

        $user = $request->user($this->guard);

        $rules =
            [
                'notification_id' => 'required|exists:notifications,id'
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $notification = $user->morphNotifications()->find($request->notification_id);

        if (!$notification)
            return $this->helper->responseJson(0, 'حدث خطأ ما');

        $notification->$relations()->updateExistingPivot($user->id, ['is_read' => 1]);

        return $this->helper->responseJson(1, 'تمت العملية');
    }

    ///////// ///////////// /////////////////////////
    ///
    public function countNotifications(Request $request)
    {


        $records = $request->user()->morphNotifications()->where('is_read','=',0)->count('is_read')->dd();
        if ($records) {
            return $this->helper->responseJson(1, 'الاشعارات التي لم يتم مشاهدتها', ['is_read'=>$records]);
        }else{

            return $this->helper->responseJson(1,'تمت مشاهده جميع الاشعارات',['is_read'=>$records]);
        }

    }





    ///////// ///////////// /////////////////////////
}
