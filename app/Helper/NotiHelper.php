<?php


namespace App\Helper;

use DB;
class NotiHelper
{
    public static function notiSingleUSer($to,$title,$body){
       // print_r(gettype($send_to));exit;
        $url = 'https://fcm.googleapis.com/fcm/send';

        // $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'postId' => $postid);

        $notification = array('title' =>$title, 'text' => $body,  'sound' => 'default', 'badge' => '1',);

        $arrayToSend = array('registration_ids' => array($to), 'notification' => $notification, 'priority'=>'high');

        $tempArr = $arrayToSend;

        $fields = json_encode($arrayToSend);

        $headers = array (

                'Authorization: key=' . "AAAAkwxo-gI:APA91bFG3xXEzFvCzuZKg689XeEpM11jcEb-jA8q7CjaITZIaazun-EEuh3jypCfxNSwBOt9AXj47Y6wOuboy1mfujkC4r3CbBTUXqUtoT1cGGJxqv5raEg9FK8gIaoOx6UqQnHqnzAy",
                'Content-Type: application/json'

        );

        

        //Register notification in database
        $ch = curl_init ();

        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_POST, true );

        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        

        $result = curl_exec ( $ch );

        // var_dump($result);

        curl_close ( $ch );
        return $result;
    }
}