<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\FireIncidentsModel;
use App\Models\LocationsModel;
use CodeIgniter\Config\Services;

class NotificationController extends BaseController
{
    public function sendFireIncidentNotification($userId, $incidentDescription)
    {
        // Fetch user information
        $accountModel = new AccountModel();
        $user = $accountModel->find($userId);

        if (!$user) {
            return "User not found";
        }

        // Fetch user's location
        $locationsModel = new LocationsModel();
        $userLocation = $locationsModel->where('user_id', $userId)->first();

        if (!$userLocation) {
            return "User location not found";
        }

        // Create a new fire incident record
        $fireIncidentsModel = new FireIncidentsModel();
        $fireIncidentsModel->insert([
            'user_id'              => $userId,
            'location_id'          => $userLocation['location_id'],
            'incident_description' => $incidentDescription,
            'created_at'           => date('Y-m-d H:i:s'),
        ]);

        // Trigger push notification using OneSignal
        $this->sendPushNotification($user, $userLocation, $incidentDescription);

        return "Fire incident reported successfully, and notification sent.";
    }

    private function sendPushNotification($user, $userLocation, $incidentDescription)
    {
        $onesignal = Services::onesignal();

        // Create a notification
        $notification = [
            'contents' => [
                'en' => $incidentDescription,
            ],
            'data' => [
                'user_id' => $user['user_id'],
                'latitude' => $userLocation['latitude'],
                'longitude' => $userLocation['longitude'],
            ],
            'included_segments' => ['All'],
        ];

        // Send the notification
        $onesignal->sendNotificationCustom($notification);
    }
}
