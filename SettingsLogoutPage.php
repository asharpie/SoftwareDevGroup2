<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Ole Miss Notes Center</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #B30000;
            color: #FFF;
            padding: 20px;
            text-align: center;
        }

        .menu {
            background-color: #EEE;
            float: left;
            width: 200px;
            height: calc(100vh - 40px); /* Adjust according to header and footer height */
            padding-top: 20px;
        }

        .menu ul {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            margin-bottom: 10px;
            border-bottom: 1px solid black; /* Add border to separate menu items */
        }

        .menu a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
        }

        .menu a:hover {
            color: #B30000; /* Dark red on hover */
        }

        .content {
            margin-left: 220px; /* Adjust based on menu width */
            padding: 20px;
        }

        .footer {
            background-color: #B30000; /* Dark red for the footer */
            color: #FFF;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #pageTitle {
            background-color: #B30000; /* Dark red for the header bar */
            color: #FFF;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        #oleMissNotesCenter {
            text-align: center;
            margin-top: 50px;
            font-size: 36px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 id="oleMissNotesCenter">Ole Miss Notes Center</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="#" onclick="loadProfile()">My Profile</a></li>
            <li><a href="#" onclick="loadAudio()">Audio</a></li>
            <li><a href="#" onclick="loadColorTheme()">Color Change/Theme</a></li>
            <li><a href="#" onclick="loadMyRequests()">My Requests</a></li>
            <li><a href="#" onclick="signOut()">Sign Out</a></li>
        </ul>
    </div>

    <div class="content">
        <!-- Content will be dynamically loaded based on menu selection -->
    </div>

    <div class="footer">
        <button onclick="signOut()">Sign Out</button>
    </div>

    <script>
        function loadProfile() {
            document.querySelector('.content').innerHTML = `
                <h2 id="pageTitle">My Profile</h2>
                <p>First Name: John</p>
                <p>Last Name: Doe</p>
                <p>Email: johndoe@example.com</p>
                <p>Date of Birth: January 1, 1990</p>
                <p>Account Created: January 1, 2020</p>
            `;
        }

        function loadAudio() {
            document.querySelector('.content').innerHTML = `
                <h2 id="pageTitle">Audio</h2>
                <p>Music Volume: <input type="range" min="0" max="100" value="50"></p>
                <p>Master Volume: <input type="range" min="0" max="100" value="50"></p>
                <button onclick="toggleMute()">Mute</button>
            `;
        }

        function loadColorTheme() {
            document.querySelector('.content').innerHTML = `
                <h2 id="pageTitle">Color Change/Theme</h2>
                <button onclick="setDarkMode()">Dark Mode</button>
                <button onclick="setLightMode()">Light Mode</button>
            `;
        }

        function loadMyRequests() {
            document.querySelector('.content').innerHTML = `
                <h2 id="pageTitle">My Requests</h2>
                <!-- List of current requests will be dynamically loaded here -->
                <p>My Current Requests:</p>
                <ul>
                    <li>Request 1</li>
                    <li>Request 2</li>
                    <li>Request 3</li>
                </ul>
            `;
        }

        function signOut() {
            if (confirm("Are you sure you want to sign out?")) {
                // Perform sign out action
                // Example:
                window.location.href = 'logout.php';
            }
        }

        function toggleMute() {
            // Logic to toggle mute state
        }

        function setDarkMode() {
            document.body.style.backgroundColor = "#000"; /* Dark blue background */
            // Additional dark mode styling
        }

        function setLightMode() {
            document.body.style.backgroundColor = "#BFEFFF"; /* Light blue background */
            // Additional light mode styling
        }

        // Initial load
        loadProfile();

        // Prevent default behavior for links
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
            });
        });
    </script>
