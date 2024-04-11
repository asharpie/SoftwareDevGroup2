<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Classes - Teacher</title>
<style>
:root {
    --background-color: #f0f0f0;
    --text-color: #333;
    --dark-red: #B30000;
}
body {
    background-color: var(--background-color);
    color: var(--text-color);
    margin: 0;
    font-family: Arial, sans-serif;
}
.header {
    background-color: var(--dark-red);
    color: white;
    padding: 20px;
    text-align: center;
    position: relative;
}
.header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: bold;
}
.back-button {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}
.container {
    padding: 20px;
}
.search-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.search-container input[type="text"] {
    padding: 10px;
    width: 70%;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}
.filter-container {
    margin-left: 20px;
}
.filter-container select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}
.class-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.class-list li {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 10px;
    position: relative;
}
.class-list li:hover {
    background-color: #f9f9f9;
}
.class-list li .options {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
.options-menu {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 120px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px 0;
}
.options-menu ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.options-menu ul li {
    padding: 10px;
    cursor: pointer;
}
.options-menu ul li:hover {
    background-color: #f9f9f9;
}
.footer {
    background-color: var(--dark-red);
    color: white;
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}
.footer button {
    background-color: var(--dark-red);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}
.footer button:last-child {
    margin-right: 0;
}
</style>
</head>
<body>
<div class="header">
    <div class="back-button"> <!-- Added -->
        <button onclick="goBack()">Back to Home</button>
    </div>
    <h1>My Classes</h1>
</div>

<div class="container">
    <div class="search-container">
        <input type="text" placeholder="Search...">
        <div class="filter-container">
            <select name="filter">
                <option value="most-used">Most Used</option>
                <option value="most-relevant">Most Relevant</option>
            </select>
        </div>
    </div>

    <ul class="class-list">
        <li>
            <h2>Class 1</h2>
            <p>Description of Class 1</p>
            <div class="options" onclick="showOptions(event)">
                <span>&#8230;</span>
                <div class="options-menu">
                    <ul>
                        <li><a href="#">Report</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <h2>Class 2</h2>
            <p>Description of Class 2</p>
            <div class="options" onclick="showOptions(event)">
                <span>&#8230;</span>
                <div class="options-menu">
                    <ul>
                        <li><a href="#">Report</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- Add more classes here -->
    </ul>
</div>

<div class="footer">
    <button onclick="goToSettings()">Settings</button>
    <button onclick="goToReport()">Report</button>
</div>

<script>
function showOptions(event) {
    var optionsMenu = event.target.nextElementSibling;
    if (optionsMenu.style.display === "block") {
        optionsMenu.style.display = "none";
    } else {
        optionsMenu.style.display = "block";
    }
}

// Close options menu when clicking outside
window.onclick = function(event) {
    if (!event.target.matches('.options')) {
        var optionsMenus = document.querySelectorAll('.options-menu');
        optionsMenus.forEach(function(menu) {
            menu.style.display = 'none';
        });
    }
}

function goToSettings() {
    window.location.href = "SettingsLogoutPage.php";
}

function goToReport() {
    window.location.href = "ReportPage.php";
}

function goBack() {
    window.location.href = "TeacherPage.php";
}
</script>
</body>
</html>
