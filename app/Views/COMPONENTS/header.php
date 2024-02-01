<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP WEBSITE</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        .header,
        .logo-bar,
        .nav-desktop-header {
            width: 100%; /* Change to 100% for responsiveness */
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box; /* Include padding in the width */
            padding: 10px 20px; /* Add padding for smaller screens */
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #EF3340;
            width: 100%; /* Change to 100% for responsiveness */
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0 20px; /* Add padding for smaller screens */
            box-sizing: border-box; /* Include padding in the width */
        }

        .logo {
            max-width: 100%; /* Adjust to 100% for responsiveness */
            height: auto;
        }


        .logo-desktop-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            background-color: yellow;
            width: 100%;
            padding: 10px 20px; 
            box-sizing: border-box;
        }

        .nav-desktop-header {
            display: flex;
            flex: 2;
            align-items: center;
            justify-content: space-between;
            background-color: #EF3340;
            width: 100%;
            padding: 10px 10px; 
            box-sizing: border-box; 
            color: #fff;
        }

        .logo-bar {
            width: 100%;
            height: 120px;
            margin-right: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 20px;
            background-color: #EF3340;
            padding: 10px 10px;
            box-sizing: border-box;
        }

        .logo-bar-icons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .logo-bar-icons i {
            display: flex;
            background-color: var(--primary-bg);
            padding: 5px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
        }

        .logo-bar img {
            max-width: 430px;
            height: auto;
        }

        .nav-desktop-header i {
            font-size: 18px;
        }

        .nav-desktop-header .fa-home,
        .fa-comment,
        .fa-bell {
            position: relative;
        }

        .nav-desktop-header .fa-home span,
        .fa-comment span,
        .fa-bell span {
            position: absolute;
            background-color: #e90000;
            font-size: 10px;
            padding: 4px;
            border-radius: 50%;
            top: -5px;
            right: -15px;
        }

        .nav-desktop-header .fa-desktop {
            position: relative;
        }

        .nav-desktop-header .fa-play {
            position: absolute;
            top: 4px;
            left: 34%;
            font-size: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #EF3340;
        }

        .search-bar {
            margin: 20px;
            height: 30px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-button {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #EF3340;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #D82230;
        }

        .philippine-time {
            margin-left: auto;
            color: #333;
            font-size: 16px;
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
            color: #fff;
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

        @media (max-width: 1515px) {
            .desktop-header {
                display: none;
            }

            .toggle-menu-button {
                display: flex;
            }

            .toggle-menu {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 50px;
                right: 0;
                background-color: #EF3340;
                padding: 10px;
                z-index: 1;
            }
                .logo-bar {
                    height: auto;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }

                .logo-bar img {
                    max-width: 100%;
                    margin-right: 0; 
                }

                .nav-desktop-header {
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }

                .nav-desktop-header .nav-link {
                    margin: 10px 0;
                }
            }
            
        @media (min-width: 1000px) {
            .mobile-header {
                display: none;
            }
        }


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
            color: #EF3340;

            border: 1px solid #EF3340;
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #CD5C5C;
            color: #fff;
        }

        .dropdown button {
            font-size: 16px;
            color: #fff;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .emergency-call-button {
            background-color: #fff;
            color: #EF3340;
            border: 1px solid #EF3340;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .emergency-call-button:hover {
            background-color: #EF3340;
            color: #fff;
        }

    </style>
</head>

<body>

    <?php
    function getCurrentTime()
    {
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
    <div class="logo-desktop-header">
        <div class="logo-bar">
            <img src="<?= base_url(); ?>images/Banner03_18Aug2018.png" alt="Logo" class="logo">

            <!-- Search form -->
            <form id="searchForm" class="form-inline">
                <!-- Update the data-bs-target attribute to match your modal ID -->
                <button type="button" class="btn btn-sm search-button" data-toggle="modal"
                    data-target="#searchModal">Search</button>
            </form>

            <!-- Search modal -->
            <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="searchModalLabel">Search</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">Close</button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="text" id="searchInputModal" class="form-control"
                                    placeholder="Enter your search term..."
                                    aria-label="Enter your search term..."
                                    aria-describedby="button-addon2">
                                <button class="btn btn-danger" type="button" id="button-addon2"
                                    onclick="searchInModal()">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <span id="philippineTime" class="philippine-time">Philippine Standard Time:
                <?= $philippineTime ?></span>
        </div>
        <!-- NAVIGATION -->
        <div class="nav-desktop-header">
            <a href="https://www.gov.ph/" class="nav-link">GOVPH</a>

            <a href="<?= site_url('/home') ?>" class="nav-link">Home</a>

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Good Governance
                </button>
                <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= site_url('') ?>">BFP SOPs</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Memorandum Circulars</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Forms</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Manual</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Fire Prev 2020</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">NFO 2020</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Complaint Hotline Number</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">BFP Official Logo</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Downloads
                </button>
                <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= site_url('') ?>">Vision and Mission</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Mandates and Functions</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">Key Officials</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About US
                </button>
                <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= site_url('') ?>">Annual Procurement Plan</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">BFP Citizen's Charter</a>
                    <a class="dropdown-item" href="<?= site_url('') ?>">PhilGEPS Posting</a>
                </div>
            </div>

            <a href="<?= site_url('/contact-us') ?>" class="nav-link">Contact Us</a>
        </div>
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
