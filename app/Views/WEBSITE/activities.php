<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
  body {
    background-color: #f8f9fa;
  }

  .navbar {
    background-color: #ff6347; 
  }

  .navbar-brand {
    font-size: 1.5rem;
    color: #fff; 
  }

  .navbar-nav .nav-item {
    margin-right: 10px;
  }

  .navbar-nav .nav-link {
    color: #fff;
  }

  .navbar-nav .nav-link:hover {
    color: #17a2b8;
  }

  .nav-flex-icons .nav-item {
    margin-right: 0;
  }

  .nav-flex-icons .nav-link {
    color: #fff;
    font-size: 1.5rem;
  }

  .nav-flex-icons .nav-link:hover {
    color: #17a2b8;
  }
  body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 1em;
        }

        .album {
            width: 300px;
            margin: 1em;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .album:hover {
            transform: scale(1.05);
        }

        .album img {
            width: 100%;
            height: auto;
        }

        .album-info {
            padding: 1em;
            text-align: center;
        }
</style>
<body>
  <!-- First Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="#"><strong>BFP OFFICIAL WEBSITE</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Use Bootstrap grid system for alignment -->
    <div class="ml-auto row align-items-center">
        <div class="col-auto">
            <button class="btn btn-success my-2 my-sm-0">Emergency Call</button>
        </div>
        <div class="col-auto text-white">
            <span class="font-weight-bold">Ph Standard Time:</span>
            <div id="philippineTime" class="ml-2"></div>
        </div>
    </div>
</nav>

<script>
    // Function to update Philippine time
    function updatePhilippineTime() {
        const options = { timeZone: 'Asia/Manila', hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const philippineTime = new Date().toLocaleString('en-US', options);
        document.getElementById('philippineTime').innerText = philippineTime;
    }

    // Update time initially and set interval to update every second
    updatePhilippineTime();
    setInterval(updatePhilippineTime, 1000);
</script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#additionalNav"
      aria-controls="additionalNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a href="site" class="nav-item nav-link">Home</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="#">Activities <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a href="achievements" class="nav-item nav-link">Achievements</a>
        </li>
        <li class="nav-item">
        <a href="contacts" class="nav-item nav-link">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <body>
  <main>
    <div class="album">
        <img src="images/rank.jpg" alt="Activity 1">
        <div class="album-info">
            <h3><strong>Rank Inspection</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/sportsfest.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong> Sportsfest</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/intern.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Fire Intern</strong></h3>
            
        </div>
    </div>
    <div class="album">
        <img src="images/personnel.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Personnel &  Firetruck Visibility/Standby/ <br> Assistance</strong></h3>
            
        </div>
    </div>

    <div class="album">
        <img src="images/fdas.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>FDAS/AFSS/Manual & Automatic <br> Fire Alarm System Testing</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/inspect.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Inspection</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/worship.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Worship</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/drill.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Fire Drill & Safety Seminar</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/flag.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Flag Raising Ceremony</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/water.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Water Assistance</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/skills.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Skills Enhancement Activity</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/PFP.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong>Physical Fitness Program</strong></h3>
        </div>
    </div>

    <div class="album">
        <img src="images/.jpg" alt="Activity 2">
        <div class="album-info">
            <h3><strong></strong></h3>
        </div>
    </div>
</main>
  </body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?= view('hf/footer'); ?>

