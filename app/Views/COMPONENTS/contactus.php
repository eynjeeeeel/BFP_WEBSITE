<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP WEBSITE</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #dc3545;
        }

        h2 {
            color: #dc3545;
        }

        .table {
            margin-top: 20px;
        }

        .thead-dark th {
            background-color: #dc3545;
            color: #ffffff;
        }

        #latitude,
        #longitude {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?= view('COMPONENTS/header'); ?>
    
    <div class="container">
        <a href="javascript:history.go(-1);" class="btn btn-danger mt-3">Go Back</a>
        <div class="mt-5">
            <h1>My Realtime Location</h1>
            <p id="latitude">Latitude: </p>
            <p id="longitude">Longitude: </p>

            <div class="mt-4">
                <h2>Rescuers' Contact Numbers</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Cellphone Number</th>
                            <th scope="col">Telephone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $rescuers = [
                            [
                                'name' => 'City Disaster Risk Reduction Management Department (Rescue/Fire)',
                                'telephoneNumber' => ' (043) 288-611 (043) 288-7521',
                                'cellphoneNumber' => 'Globe: 0915-744-9698, Smart: 0999-735-6447'
                            ],
                            [
                                'name' => 'Calapan City Fire Station (BFP)',
                                'telephoneNumber' => '(043)288-7777',
                                'cellphoneNumber' => 'Globe: 0915-603-1561'
                            ],
                            
                        ];

                        foreach ($rescuers as $index => $rescuer) : ?>
                            <tr>
                                <td><?php echo $rescuer['name']; ?></td>
                                <td><?php echo $rescuer['telephoneNumber']; ?></td>
                                <td><?php echo $rescuer['cellphoneNumber']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= view('COMPONENTS/footer'); ?>
    <!-- Bootstrap JS and Popper.js scripts (order matters) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        navigator.geolocation.getCurrentPosition((position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById('latitude').innerText = `Latitude: ${latitude}`;
            document.getElementById('longitude').innerText = `Longitude: ${longitude}`;

            fetch('update_location.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    latitude: latitude,
                    longitude: longitude,
                }),
            });
        });
    </script>
</body>

</html>
