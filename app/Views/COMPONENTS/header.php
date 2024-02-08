<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP WEBSITE</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #EF3340; 
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            max-width: 430px;
            height: auto;
        }

        .navigation-bar {
            display: flex;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #FFD100; 
        }

        .search-bar {
        margin: 20px;
        height: 30px;
        padding: 8px;
        border: 1px solid #ddd; /* Add border to the search bar */
        border-radius: 4px;
        font-size: 14px;
    }

    .search-button {
        background-color: #EF3340;
        color: #fff;
        border: 1px solid #fff; /* Add border to the search button */
        border-radius: 4px;
        padding: 8px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

        .search-button:hover {
            background-color: #D82230;
        }

        .philippine-time {
            margin-left: auto;
            color: #fff;
            font-size: 14px;
        }

        .toggle-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: #EF3340; 
            padding: 10px;
            z-index: 1;
        }

        .toggle-menu-button {
            background-color: #EF3340; 
            color: #fff;
            cursor: pointer;
            margin-right: 10px;
            border: none;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hamburger-icon {
            width: 30px;
            height: 3px;
            background-color: #fff;
            margin: 6px 0;
            transition: 0.4s;
        }

        .toggle-menu-button.open .hamburger-icon:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle-menu-button.open .hamburger-icon:nth-child(2) {
            opacity: 0;
        }

        .toggle-menu-button.open .hamburger-icon:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        @media (max-width: 1000px) {
            .desktop-header {
                display: none;
            }

            .toggle-menu-button {
                display: flex;
            }

            .toggle-menu {
                display: flex;
            }
        }

        @media (min-width: 1000px) {
            .mobile-header {
                display: none;
            }
        }

        /* Styles for the normal dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #EF3340;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;

        
    }
    .dropdown btn {
        color: #EF3340; /* Set to the desired color */
        
        border: 1px solid #EF3340; /* Set the border color */
    }
    .dropdown-content a {
        color: #fff;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #555;
        color: #fff;
    }

        .dropdown button {
            color: #fff; 
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>


<body>

<?php
// Your existing PHP code
function getCurrentTime() {
    return date('F j, Y g:i A', strtotime('now'));
}

$philippineTime = getCurrentTime();
?>

<a class="btn btn-danger" href="<?= site_url('/logout') ?>">Logout</a>

<!-- First header for smartphone only -->
<div class="header mobile-header">
    <img src="<?= base_url(); ?>images/Banner03_18Aug2018.png" alt="Logo" class="logo">
    <button class="button" onclick="openSecurityModal()">EMERGENCY CALL</button>
</div>

<!-- Second header for desktop mode only -->
<div class="header desktop-header">
    <img src="<?= base_url(); ?>images/Banner03_18Aug2018.png" alt="Logo" class="logo">
    <div class="navigation-bar">
        <a href="<?= site_url('/home') ?>" class="nav-link">Home</a>

        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle">Good Governance</button>
            <div class="dropdown-content">
                <a href="#">Action</a>
                <a href="#">Another action</a>
                <a href="#">Something else here</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle">Downloads</button>
            <div class="dropdown-content">
                <a href="#">Action</a>
                <a href="#">Another action</a>
                <a href="#">Something else here</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle">About Us</button>
            <div class="dropdown-content">
                <a href="#">Action</a>
                <a href="#">Another action</a>
                <a href="#">Something else here</a>
            </div>
        </div>

        <a href="<?= site_url('/contact-us') ?>" class="nav-link">Contact Us</a>
    </div>

    <!-- Search form -->
    <form id="searchForm" class="form-inline">
        <!-- Update the data-bs-target attribute to match your modal ID -->
        <button type="button" class="btn btn-sm search-button" data-toggle="modal" data-target="#searchModal">Search</button>
    </form>

    <!-- Search modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchModalLabel">Search</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" id="searchInputModal" class="form-control" placeholder="Enter your search term..." aria-label="Enter your search term..." aria-describedby="button-addon2">
                        <button class="btn btn-danger" type="button" id="button-addon2" onclick="search()">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="philippineTime" class="philippine-time">Philippine Standard Time: <?= $philippineTime ?></span>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
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