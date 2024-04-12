<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Home Page</title>
<style>
:root {
    --background-color: white;
    --text-color: black;
    --button-color: #B30000; /* Red color for buttons */
}
body {
    background-color: var(--background-color);
    color: var(--text-color);
    margin: 0;
    padding: 0;
}
.container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: space-between;
}
.header {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
}
.footer {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
}
.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}
.button {
    background-color: var(--button-color);
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Admin Home Page</h1>
    </div>
    <div class="button-container">
        <button class="button" onclick="goToViewRequests()">View Requests</button>
    </div>
    <div class="footer">
        <button class="button" onclick="goToSettings()">Settings</button>
        <button class="button" onclick="goToReportPage()">Report</button>
    </div>
</div>

<script>
function goToViewRequests() {
    window.location.href = "ViewRequestsAdmin.php";
}

function goToSettings() {
    window.location.href = "SettingsLogoutPage.php";
}

function goToReportPage() {
    window.location.href = "ReportPage.php";
}
</script>
</body>
</html>
