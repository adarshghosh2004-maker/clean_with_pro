<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Common extends Model
{
    private $folder_audiobook = "audio_books";
    private $folder_novels = "novels";
    private $folder_magazines = "magazines";
    private $folder_plan = "plan";

    // Image Functions
    public function saveImage($org_name, $folder, $prefix = "")
    {
        try {
            $img_ext = $org_name->getClientOriginalExtension();
            $filename = $prefix . date('d_m_Y_') . rand(1111, 9999) . '.' . $img_ext;
            $org_name->move(base_path('storage/app/public/' . $folder), $filename);

            return $filename;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function imageNameToUrl($array, $column, $folder)
    {
        try {

            $appName = Config::get('app.image_url');

            foreach ($array as $key => $value) {

                if (isset($value[$column]) && $value[$column] != "") {

                    if ($folder == "user") {

                        if (Storage::disk('public')->exists($folder . '/' . $value[$column])) {
                            $value[$column] = $appName . $folder . '/' . $value[$column];
                        } else {
                            $value[$column] = asset('assets/imgs/default.png');
                        }
                    } else {

                        if (Storage::disk('public')->exists($folder . '/' . $value[$column])) {
                            $value[$column] = $appName . $folder . '/' . $value[$column];
                        } else {
                            $value[$column] = asset('assets/imgs/no_img.png');
                        }
                    }
                } else {

                    if ($folder == "user") {
                        $value[$column] = asset('assets/imgs/default.png');
                    } else {
                        $value[$column] = asset('assets/imgs/no_img.png');
                    }
                }
            }

            return $array;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function deleteImageToFolder($folder, $name)
    {
        try {

            Storage::disk('public')->delete($folder . '/' . $name);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function fileNameToUrl($array, $column, $folder)
    {
        try {

            $appName = Config::get('app.image_url');

            foreach ($array as $key => $value) {

                if (isset($value[$column]) && $value[$column] != "") {

                    if (Storage::disk('public')->exists($folder . '/' . $value[$column])) {
                        $value[$column] = $appName . $folder . '/' . $value[$column];
                    } else {
                        $value[$column] = "";
                    }
                } else {
                    $value[$column] = "";
                }
            }
            return $array;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function getImage($folder = "", $name = "")
    {
        try {

            $appName = Config::get('app.image_url');

            if ($folder != "" && $name != "") {

                if (Storage::disk('public')->exists($folder . '/' . $name)) {
                    $name = $appName . $folder . '/' . $name;
                } else {

                    if ($folder == "user") {
                        $name = asset('assets/imgs/default.png');
                    } else {
                        $name = asset('assets/imgs/no_img.png');
                    }
                }
            } else {
                if ($folder == "user") {
                    $name = asset('assets/imgs/default.png');
                } else {
                    $name = asset('assets/imgs/no_img.png');
                }
            }
            return $name;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function getFile($folder = "", $name = "")
    {
        try {

            $appName = Config::get('app.image_url');

            if ($folder != "" && $name != "") {

                if (Storage::disk('public')->exists($folder . '/' . $name)) {
                    $name = $appName . $folder . '/' . $name;
                } else {
                    $name = "";
                }
            } else {
                $name = "";
            }
            return $name;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    // API's Functions
    public function API_Response($status_code, $message, $array = [], $pagination = '')
    {
        try {
            $data['status'] = $status_code;
            $data['message'] = $message;

            if ($status_code == 200) {
                $data['result'] = $array;
            }

            if ($pagination) {
                $data['total_rows'] = $pagination['total_rows'];
                $data['total_page'] = $pagination['total_page'];
                $data['current_page'] = $pagination['current_page'];
                $data['more_page'] = $pagination['more_page'];
            }
            return $data;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function more_page($current_page, $page_size)
    {
        try {
            $more_page = false;
            if ($current_page < $page_size) {
                $more_page = true;
            }
            return $more_page;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function pagination_array($total_rows, $page_size, $current_page, $more_page)
    {
        try {
            $array['total_rows'] = $total_rows;
            $array['total_page'] = $page_size;
            $array['current_page'] = (int) $current_page;
            $array['more_page'] = $more_page;

            return $array;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    // Common Functions
    public function userName($string)
    {
        $rand_number = rand(0, 1000);
        $user_name = '@' . $string . $rand_number;

        $check = User::where('user_name', $user_name)->first();
        if (isset($check) && $check != null) {
            $this->user_name($string);
        }
        return $user_name;
    }
    public function user_tag_line()
    {
        return "Hey, I am using the " . App_Name() . " App.";
    }
    public function BasicNotiConfiguration($type)
    {
        if ($type != null) {
            return Notification_Configuration::where('type', $type)->first();
        }
        return [];
    }
    public function SetSmtpConfig()
    {
        $smtp = Smtp::latest()->first();
        if (isset($smtp) && $smtp != null && $smtp['status'] == 1) {

            if ($smtp) {
                $data = [
                    'driver' => 'smtp',
                    'host' => $smtp->host,
                    'port' => $smtp->port,
                    'encryption' => 'tls',
                    'username' => $smtp->user,
                    'password' => $smtp->pass,
                    'from' => [
                        'address' => $smtp->from_email,
                        'name' => $smtp->from_name
                    ]
                ];
                Config::set('mail', $data);
            }
        }
        return true;
    }
    public function Send_Mail($type, $email, $request_status = 0, $content_title = "", $price = 0, $first_name = "", $last_name = "", $transaction_id = "", $date = "", $content_type = 0, $password = "", $payout_period = "", $subscription_earnings = 0, $content_earnings = 0)
    {
        try {

            $this->SetSmtpConfig();

            $smtp = Smtp::latest()->first();
            if (isset($smtp) && $smtp['status'] == 1) {

                if ($type == 1) {

                    $details = [
                        'title' => App_Name() . " - Registration",
                        'view' => 'mail.register',
                    ];
                } else if ($type == 2) {
                    $details = [
                        'title' => App_Name() . " - Login",
                        'view' => 'mail.login',
                    ];
                } else if ($type == 3) {

                    $details = [
                        'title' => App_Name() . " - Become Auther Request",
                        'view' => 'mail.become_author_request',
                    ];
                } else if ($type == 4) {

                    if ($request_status == 0) {
                        $details = [
                            'title' => App_Name() . " - Auther Request Status",
                            'view' => 'mail.author_request_no',
                        ];
                    } else {
                        $details = [
                            'title' => App_Name() . " - Auther Request Status",
                            'view' => 'mail.author_request_yes',
                        ];
                    }
                } else if ($type == 5) {

                    $details = [
                        'title' => App_Name() . " - Purchase Content",
                        'user_name' => $first_name . ' ' . $last_name,
                        'content_title' => $content_title,
                        'price' => $price,
                        'transaction_id' => $transaction_id,
                        'date' => $date,
                        'view' => 'mail.purchase',
                    ];
                } else if ($type == 6) {

                    $details = [
                        'title' => 'Withdrawal Request Submitted!',
                        'username' => $first_name . ' ' . $last_name,
                        'view' => 'mail.withdrawal_request',
                    ];
                } else if ($type == 7) {

                    $status = $request_status == 1 ? 'Approved' : 'Rejected';
                    $details = [
                        'title' => 'Withdrawal Request ' . ucfirst($status),
                        'username' => $first_name . ' ' . $last_name,
                        'status' => $status,
                        'view' => 'mail.withdrawal_status_update',
                    ];
                } else if ($type == 8) {
                    if ($content_type == 1) {
                        $book_type = "Audio Book";
                    } elseif ($content_type == 2) {
                        $book_type = "Novel";
                    } elseif ($content_type == 3) {
                        $book_type = "Magazine";
                    } else {
                        $book_type = "Book";
                    }
                    if ($request_status == 0) {
                        $details = [
                            'title' => App_Name() . " - " . $book_type . " Request Status",
                            'book_name' => $content_title,
                            'book_type' => $book_type,
                            'view' => 'mail.book_request_no',
                        ];
                    } else {
                        $details = [
                            'title' => App_Name() . " - " . $book_type . " Request Status",
                            'book_name' => $content_title,
                            'book_type' => $book_type,
                            'view' => 'mail.book_request_yes',
                        ];
                    }
                } else if ($type == 9) {

                    $details = [
                        'title' => App_Name() . " - Forgot Password",
                        'email' => $email,
                        'password' => $password,
                        'view' => 'mail.forgot_password',
                    ];
                } else if ($type == 10) {

                    $details = [
                        'title' => App_Name() . " - Test Smtp",
                        'view' => 'mail.test',
                    ];
                } else if ($type == 11) {

                    $details = [
                        'title' => App_Name() . " - Purchase Plan",
                        'user_name' => $first_name . ' ' . $last_name,
                        'price' => $price,
                        'transaction_id' => $transaction_id,
                        'date' => $date,
                        'view' => 'mail.buy_plan',
                    ];
                } else if ($type == 12) {

                    $details = [
                        'title' => App_Name() . " - Subscription Payout",
                        'plan_name' => $content_title,
                        'user_name' => $first_name . ' ' . $last_name,
                        'payout' => $price,
                        'subscription_earnings' => $subscription_earnings,
                        'content_earnings' => $content_earnings,
                        'payout_period' => $payout_period,
                        'payout_date' => $date,
                        'view' => 'mail.subscription_payout',
                    ];
                } else {
                    return true;
                }

                Mail::to($email)->send(new \App\Mail\mail($details));
            } else {
                return true;
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function SaveNotification($send_type, $noti_type, $user_id, $auther_id, $content_type, $content_id, $sub_content_id, $imageURL, $device_token = '', $device_type = 0, $request_status = 0, $content_title = "", $amount = 0, $wallet_balance = 0, $category_id = 0)
    {
        try {

            $title = "";
            $message = "";

            if ($content_type == 1) {
                $book_type = __('label.audiobook');
            } elseif ($content_type == 2) {
                $book_type = __('label.novel');
            } else {
                $book_type = __('label.magazine');
            }

            if ($noti_type == 2) {
                $title = "Your Author Request Has Been Submitted!";
                $message = "Thank you for submitting your request to become an author on our platform. We are reviewing your application and will get back to you soon. Stay tuned!";
            }
            if ($noti_type == 3 && $request_status == 1) {
                $title = "Your Author Request Has Been Approved!";
                $message = "Congratulations! Your request to become an author has been approved.";
            }
            if ($noti_type == 3 && $request_status == 0) {
                $title = "Your Author Request Has Been Rejected!";
                $message = "We regret to inform you that your request to become an author on our platform has been rejected.";
            }
            if ($noti_type == 4) {
                $title = "New Release: {$content_title}";
                $message = "Tap to Read/Play now!";
            }
            if ($noti_type == 5) {
                $title = "Withdrawal Request Sent!";
                $message = "Your withdrawal request has been submitted. You'll be notified once it's processed.";
            }
            if ($noti_type == 6) {
                $title = "Withdrawal Status Updated";
                $message = "Your withdrawal request status has been updated. Please check your dashboard for details.";
            }
            if ($noti_type == 7) {
                $title = "Withdrawal Status Updated";
                $message = "Your withdrawal request status has been updated. Please check your dashboard for details.";
            }
            if ($noti_type == 8 && $request_status == 1) {
                $title = "Your " . $content_title . $book_type . " Has Been Approved!";
                $message = "Congratulations! Your request to add " . $content_title . $book_type . " has been approved.";
            }
            if ($noti_type == 8 && $request_status == 0) {
                $title = "Your" . $content_title . $book_type . " Has Been Rejected!";
                $message = "We regret to inform you that your request to add " . $content_title . $book_type . " on our platform has been rejected.";
            }
            if ($noti_type == 9 && $request_status == 0) {
                $title = "Amount Added To Wallet";
                $message = "You have successfully added " . Currency_Code() . $amount . " to your wallet.Your updated balance is " . Currency_Code() . $wallet_balance . " ";
            }
            if ($noti_type == 9 && $request_status == 1) {
                $title = "Amount Deducted From Wallet";
                $message = Currency_Code() . $amount . " has been deducted from your wallet. Your updated balance is " . Currency_Code() . $wallet_balance . " ";
            }
            if ($noti_type == 10 && $request_status == 0) {
                $title = "Referral Success";
                $message = "Someone joined using your code. " . Currency_Code() . $amount . " added to your wallet!";
            }
            if ($noti_type == 10 && $request_status == 1) {
                $title = "Welcome Reward!";
                $message = Currency_Code() . $amount . " has been credited to your wallet for joining using a referral code.";
            }

            $data['type'] = $noti_type;
            $data['user_id'] = $user_id;
            $data['auther_id'] = $auther_id;
            $data['content_type'] = $content_type;
            $data['content_id'] = $content_id;
            $data['sub_content_id'] = $sub_content_id;
            $data['title'] = $title;
            $data['message'] = $message;
            $data['image'] = "";
            $data['status'] = 1;
            Notification::insert($data);

            $noti_array = array(
                'title' => $title,
                'image' => $imageURL,
                'content_type' => $content_type,
                'content_id' => $content_id,
                'sub_content_id' => $sub_content_id,
                'author_id' => $auther_id,
                'category_id' => $category_id,
                'description' => $message,
            );

            if ($send_type == 1) {
                $this->send_user_push_notification($device_type, $device_token, $title, $message, $noti_array);
                return true;
            } else if ($send_type == 0) {
                $this->send_notification($noti_array);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function send_user_push_notification($device_type, $device_token, $title, $message, $array = [])
    {
        try {

            if (!is_array($device_token)) {
                $device_token = [$device_token];
            }
            $setting = Setting_Data();
            $ONESIGNAL_APP_ID = $setting['onesignal_apid'];
            $ONESIGNAL_REST_KEY = $setting['onesignal_rest_key'];
            $fields = [
                'app_id' => $ONESIGNAL_APP_ID,
                'data' => $array,
                'headings' => ['en' => $title],
                'contents' => ['en' => $message],
                'channel_for_external_user_ids' => 'push',
                'include_player_ids' => $device_token,
            ];

            // Send the push notification via OneSignal API
            $response = Http::withHeaders([
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Basic ' . $ONESIGNAL_REST_KEY,
            ])->post('https://onesignal.com/api/v1/notifications', $fields);

            if ($response->successful()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function send_notification($array)
    {
        try {
            $settingData = Setting_Data();
            $ONESIGNAL_APP_ID = $settingData['onesignal_apid'];
            $ONESIGNAL_REST_KEY = $settingData['onesignal_rest_key'];

            $fields = array(
                'app_id' => $ONESIGNAL_APP_ID,
                'included_segments' => array('All'),
                'data' => $array,
                'headings' => array("en" => $array['title']),
                'contents' => array("en" => $array['description']),
                'big_picture' => $array['image'],
            );

            $fields = json_encode($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ' . $ONESIGNAL_REST_KEY,
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    public function get_feature_name($ids)
    {
        $array = explode(',', $ids);
        $names = Feature::whereIn('id', $array)->pluck('name')->toArray();
        return $names;
    }
}