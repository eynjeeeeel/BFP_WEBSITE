<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SecurityController extends BaseController
{
    public function sos() {
        return view('WEBSITE/SOS');
    }

    public function captureFireIncident() {
        // Implement logic to capture fire incident
        // This could involve saving the image and other details to a database or storage
        // For now, let's assume it's a placeholder for your actual implementation
        echo json_encode(['status' => 'success', 'message' => 'Fire incident captured successfully']);
    }

    public function sendToAdminDashboard() {
        // Dummy data for testing
        $userName = $this->request->getPost('userName');
        $userLocation = $this->request->getPost('userLocation');
        $additionalInfo = $this->request->getPost('additionalInfo');

        // You can now process and store this data as needed
        // For now, let's assume it's a placeholder for your actual implementation
        echo json_encode(['status' => 'success', 'message' => 'Data sent to admin dashboard successfully']);
    }
}
