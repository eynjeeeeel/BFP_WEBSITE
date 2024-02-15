<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Call Form</title>
    <style>
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%;
            overflow: auto; 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 600px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        /* Form styles */
        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .readonly {
            border: none;
            background-color: #f5f5f5;
            padding: 8px;
        }
    </style>
</head>
<body>

<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="emergencyCallForm" action="<?= base_url('emergency-call/submit') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <label for="incident_type">Incident Type:</label>
    <input type="text" id="incident_type" name="incident_type" required>

    <label for="incident_severity">Incident Severity:</label>
    <input type="text" id="incident_severity" name="incident_severity" required>

    <label for="incident_location">Incident Location:</label>
    <input type="text" id="incident_location" name="incident_location" required>

    <label for="nearest_landmark">Nearest Landmark:</label>
    <input type="text" id="nearest_landmark" name="nearest_landmark">

    <label for="incident_description">Incident Description:</label>
    <textarea id="incident_description" name="incident_description" required></textarea>

    <label for="num_people_requiring_rescue">Number of People Requiring Rescue:</label>
    <input type="number" id="num_people_requiring_rescue" name="num_people_requiring_rescue" min="0">

    <label for="access_considerations">Access Considerations:</label>
    <input type="text" id="access_considerations" name="access_considerations">

    <label for="report_file">Attach Report (if any):</label>
    <input type="file" id="report_file" name="report_file">

    <button type="submit">Submit</button>
</form>

        </div>
    </div>

    <script>
        // Function to open the modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
