<?php
    $imageSources = [
        'images/BABALA-400-×-1500px.png',
        'images/fire-safety-advocacy-banner-2023-01.jpg',
        'images/images2.jpg',
        'images/bfp-modernization.jpg',
        'images/bfp-banner.jpg',
    ];
?>

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
    
            color: #343a40;
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
  .footer{
    background-color: #85919d;
    position:relative;
  }

  
  #carouselExample {
            max-width: 1500px;
            width: 100%;
            height: 400px;
            border: 2px solid #EF3340;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            margin-right: auto;
            margin-left: auto;
        }

        .carousel-inner {
            width: 100%;
            height: 100%;
            margin-top: 1px;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 1s ease-in-out;
        }

        .btn-news {
            margin-top: 20px;
            text-align: center;
        }

        .buttons-container {
            margin-top: 10px;
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
            <button class="btn btn-success my-2 my-sm-0" onclick="openModal()>Emergency Call</button>
        </div>
        <div class="col-auto text-white">
            <span class="font-weight-bold">Ph Standard Time:</span>
            <div id="philippineTime" class="ml-2"></div>
        </div>
        <a class="btn btn-danger" href="<?= site_url('/logout') ?>">Logout</a>
    </div>
</nav>
      

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#additionalNav"
      aria-controls="additionalNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="<?= site_url('/home') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="activities" class="nav-item nav-link">Activities</a>
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

  
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

    // Function to update Philippine time
    function updatePhilippineTime() {
        const options = { timeZone: 'Asia/Manila', hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const philippineTime = new Date().toLocaleString('en-US', options);
        document.getElementById('philippineTime').innerText = philippineTime;
    }

    // Update time initially and set interval to update every second
    updatePhilippineTime();
    setInterval(updatePhilippineTime, 1000);

    function makeEmergencyCall() {
        console.log('Emergency call initiated!');
    }

    function toggleMenu() {
        const toggleMenuButton = document.querySelector('.toggle-menu-button');
        toggleMenuButton.classList.toggle('open');

        const toggleMenu = document.getElementById('toggleMenu');
        toggleMenu.style.display = toggleMenu.style.display === 'none' ? 'flex' : 'none';

        if (toggleMenu.style.display === 'flex') {
            const menuItems = ['Home', 'About Us', 'Contact Us'];
            const menuContent = menuItems.map(item => `<a href="#" class="nav-link" onclick="navigateTo('${item}')">${item}</a>`).join('');
            toggleMenu.innerHTML = menuContent;
        } else {
            toggleMenu.innerHTML = '';
        }
    }

    function updatePhilippineTime() {
        const timeElement = document.getElementById('philippineTime');

        setInterval(() => {
            const currentTime = new Date();
            const options = { timeZone: 'Asia/Manila', hour12: true };
            const philippineTime = currentTime.toLocaleString('en-US', options);

            timeElement.textContent = `Philippine Standard Time: ${philippineTime}`;
        }, 1000);
    }
    updatePhilippineTime();

    function closeSearchModal() {
        const searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
        searchModal.hide();
    }

    function searchInModal() {
        const searchInputModal = document.getElementById('searchInputModal');
        const searchTermModal = searchInputModal.value.trim();

        if (searchTermModal !== '') {
            console.log('Search term in modal:', searchTermModal);
            // Perform the search logic here
            // You may want to update the UI or trigger the search function
            closeSearchModal();
        } else {
            alert('Please enter a search term.');
        }
    }

    function search() {
        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.trim();

        if (searchTerm !== '') {
            fetch(`app\Views\COMPONENTS\search.php?search=${encodeURIComponent(searchTerm)}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Search results:', data);
                    // Process the search results (update UI, display results, etc.)
                })
                .catch(error => {
                    console.error('Error during search:', error);
                });
        } else {
            alert('Please enter a search term.');
        }
        const searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
        searchModal.show();
    }
</script>
</body>
</html>


