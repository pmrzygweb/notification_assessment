<?php

namespace App\Http\Controllers;

use App\Enums\MessageType;
use App\Enums\NotificationType;
use App\Http\Requests\SendMessageRequest;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Send notification to users subscribed to a category.
     *
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function getAllMessageTypes()
    {
        return response()->json([
            'message_types' => MessageType::getValues()
        ]);
    }

    /**
     * Send notification to users subscribed to a category.
     *
     * @param App\Http\Requests\SendMessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(SendMessageRequest $request)
    {
        $validated = $request->validated();
        $users = User::whereJsonContains('subscribed', $validated['message_type'])
                    ->get();
        foreach ($users as $user) {
            $this->sendNotification($user, MessageType::fromValue($validated['message_type']), $validated['message_content']);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Send notification to a single user
     *
     * @param App\Models\User $user
     * @param App\Enums\MessageType $type
     * @param string $message
     * @return void
     */
    private function sendNotification(User $user, MessageType $type, string $message)
    {
        foreach ($user->channels as $notificationType) {
            switch ($notificationType) {
                case NotificationType::SMS:
                    $this->sendSMS($user, $type, $message);
                    break;
                case NotificationType::Email:
                    $this->sendEmail($user, $type, $message);
                    break;
                case NotificationType::Push:
                    $this->sendPush($user, $type, $message);
                    break;
            }
        }
    }

    /**
     * Send sms to a single user
     *
     * @param App\Models\User $user
     * @param App\Enums\MessageType $type
     * @param string $message
     * @return void
     */
    private function sendSMS(User $user, MessageType $type, string $message)
    {
        Log::create([
            'user_id' => $user->id,
            'message_type' => $type,
            'message_content' => $message,
            'notification_type' => NotificationType::SMS,
            'status' => 'success'
        ]);
    }

    /**
     * Send email to a single user
     *
     * @param App\Models\User $user
     * @param App\Enums\MessageType $type
     * @param string $message
     * @return void
     */
    private function sendEmail(User $user, MessageType $type, string $message)
    {
        Log::create([
            'user_id' => $user->id,
            'message_type' => $type,
            'message_content' => $message,
            'notification_type' => NotificationType::Email,
            'status' => 'success'
        ]);
    }

    /**
     * Send push notification to a single user
     *
     * @param App\Models\User $user
     * @param App\Enums\MessageType $type
     * @param string $message
     * @return void
     */
    private function sendPush(User $user, MessageType $type, string $message)
    {
        Log::create([
            'user_id' => $user->id,
            'message_type' => $type,
            'message_content' => $message,
            'notification_type' => NotificationType::Push,
            'status' => 'success'
        ]);
    }
}
