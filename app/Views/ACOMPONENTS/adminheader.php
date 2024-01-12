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

<div class="header desktop-header">
    <img src="<?= base_url(); ?>images/Banner03_18Aug2018.png" alt="Logo" class="logo">
    <div class="navigation-bar">
        <a href="<?= site_url('/admin-manage') ?>" class="nav-link">MANAGE</a>

        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle">PROFILE</button>
            <div class="dropdown-content">
                <a href="#">My Profile</a>
                <a href="#">Responders List</a>
                <a href="#">Something else here</a>
            </div>
        </div>

        <a href="<?= site_url('/contact-us') ?>" class="nav-link">ANALYTICS</a>
    </div>


    <span id="philippineTime" class="philippine-time">Philippine Standard Time: <?= $philippineTime ?></span>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>

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

</script>

</body>

</html>
