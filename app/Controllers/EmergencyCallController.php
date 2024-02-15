<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmergencyCallModel;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Messaging\Notification;

class EmergencyCallController extends BaseController
{
    public function emergencycall()
    {
        $emergencyCallModel = new EmergencyCallModel();

        $data = [
            'emergency_call' => $emergencyCallModel->findAll(),
        ];

        return view('EMERGENCYCALL/emergencybutton', $data);
    }

    public function submit()
    {
        $request = $this->request;

        if (! $this->validate([
            'csrf_token' => 'required|validate_csrf'
        ])) {
            return redirect()->back()->withInput()->with('error', 'CSRF token validation failed');
        }

        // Get the form input values
        $incidentType = $request->getPost('incident_type');
        $incidentSeverity = $request->getPost('incident_severity');
        $incidentLocation = $request->getPost('incident_location');
        $nearestLandmark = $request->getPost('nearest_landmark');
        $incidentDescription = $request->getPost('incident_description');
        $numPeopleRequiringRescue = $request->getPost('num_people_requiring_rescue');
        $accessConsiderations = $request->getPost('access_considerations');

        // Handle file upload
        $file = $request->getFile('report_file');
        $reportPath = '';

        if ($file->isValid() && ! $file->hasMoved()) {
            $file->move(ROOTPATH . 'public/accident_report');
            $reportPath = $file->getName(); // Get the name of the uploaded file
        }

        // Save the data to the database
        $emergencyCallModel = new EmergencyCallModel();
        $emergencyCallModel->save([
            'incident_type' => $incidentType,
            'incident_severity' => $incidentSeverity,
            'incident_location' => $incidentLocation,
            'nearest_landmark' => $nearestLandmark,
            'incident_description' => $incidentDescription,
            'num_people_requiring_rescue' => $numPeopleRequiringRescue,
            'access_considerations' => $accessConsiderations,
            'report_path' => $reportPath,
        ]);

        // Send push notification
        $this->sendPushNotification($incidentType, $incidentSeverity);

        return redirect()->to('success-page');
    }

    private function sendPushNotification($incidentType, $incidentSeverity)
    {
        // Initialize Firebase Factory
        $factory = (new Factory)
            ->withServiceAccount('path/to/serviceAccountKey.json')
            ->withDatabaseUri('https://your-project-id.firebaseio.com');

        // Initialize Firebase Messaging
        $messaging = $factory->createMessaging();

        // Create notification
        $notification = Notification::create('New Incident Report', $incidentType . ' - ' . $incidentSeverity);

        // Create message
        $message = CloudMessage::new()
            ->withNotification($notification)
            ->withData(['incident_type' => $incidentType, 'incident_severity' => $incidentSeverity]);

        // Send message
        $messaging->send($message);
    }
}
