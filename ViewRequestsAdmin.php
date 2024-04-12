<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Requests - Admin</title>
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
    font-family: Arial, sans-serif;
}
.container {
    display: flex;
    flex-direction: column;
    height: 100vh;
}
.header {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
    position: relative;
}
.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    color: white;
    cursor: pointer;
}
.menu {
    width: 200px;
    background-color: #EEE;
    padding: 20px;
    border-right: 1px solid #DDD;
    border-bottom: 1px solid #DDD;
}
.menu h2 {
    margin-bottom: 10px;
    color: var(--button-color);
}
.menu ul {
    list-style-type: none;
    padding-left: 0;
}
.menu li {
    margin-bottom: 10px;
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
.menu li:hover {
    background-color: #F5F5F5;
}
.content {
    flex-grow: 1;
    padding: 20px;
}
.footer {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
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
.report-list {
    margin-top: 20px;
}
.report {
    border: 1px solid #DDD;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}
.report h3 {
    margin-top: 0;
}
.report-details {
    margin-top: 10px;
}
.report-details p {
    margin: 5px 0;
}
.report-actions {
    margin-top: 10px;
}
.report-actions input[type="text"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>View Requests - Admin</h1>
        <div class="back-button" onclick="goBack()">Back</div>
    </div>
    <div class="menu">
        <h2>Menu</h2>
        <ul>
            <li onclick="toggleRequests('pending')">Pending Requests</li>
            <li onclick="toggleRequests('completed')">Completed Requests</li>
        </ul>
    </div>
    <div class="content">
        <div id="pending-requests" class="report-list" style="display:none;">
            <h2>Pending Requests</h2>
            <div id="pending-reports"></div>
        </div>
        <div id="completed-requests" class="report-list" style="display:none;">
            <h2>Completed Requests</h2>
            <div id="completed-reports"></div>
        </div>
    </div>
    <div class="footer">
        <button class="button" onclick="goToSettings()">Settings</button>
        <button class="button" onclick="goToReportPage()">Report</button>
    </div>
</div>

<script>
function toggleRequests(type) {
    const pendingRequests = document.getElementById('pending-requests');
    const completedRequests = document.getElementById('completed-requests');
    if (type === 'pending') {
        pendingRequests.style.display = 'block';
        completedRequests.style.display = 'none';
        // Fetch and display pending requests
        // Example:
        displayPendingRequests();
    } else if (type === 'completed') {
        completedRequests.style.display = 'block';
        pendingRequests.style.display = 'none';
        // Fetch and display completed requests
        // Example:
        displayCompletedRequests();
    }
}

function displayPendingRequests() {
    // Example of adding pending reports dynamically
    const pendingReportsContainer = document.getElementById('pending-reports');
    pendingReportsContainer.innerHTML = `
        <div class="report">
            <h3>Report Title: Pending Report 1</h3>
            <div class="report-details">
                <p>Report Type: User Report</p>
                <p>Description: This is a pending report description.</p>
                <p>Report Number: #12345</p>
                <p>Created Date: April 1, 2024</p>
                <button onclick="removeFile()">Remove File</button>
                <button onclick="ignoreRequest()">Ignore Request</button>
                <input type="text" placeholder="Enter Response (Optional)">
                <button onclick="submitResponse()">Submit</button>
            </div>
        </div>
        <div class="report">
            <h3>Report Title: Pending Report 2</h3>
            <div class="report-details">
                <p>Report Type: Admin Report</p>
                <p>Description: This is another pending report description.</p>
                <p>Report Number: #54321</p>
                <p>Created Date: April 5, 2024</p>
                <button onclick="removeFile()">Remove File</button>
                <button onclick="ignoreRequest()">Ignore Request</button>
                <input type="text" placeholder="Enter Response (Optional)">
                <button onclick="submitResponse()">Submit</button>
            </div>
        </div>
    `;
}

function displayCompletedRequests() {
    // Example of adding completed reports dynamically
    const completedReportsContainer = document.getElementById('completed-reports');
    completedReportsContainer.innerHTML = `
        <div class="report">
            <h3>Report Title: Completed Report 1</h3>
            <div class="report-details">
                <p>Report Type: User Report</p>
                <p>Description: This is a completed report description.</p>
                <p>Report Number: #67890</p>
                <p>Created Date: March 25, 2024</p>
                <p>Completed Date: April 3, 2024</p>
                <button onclick="openFile()">Open File</button>
                <button onclick="editReport()">Edit</button>
            </div>
        </div>
        <div class="report">
            <h3>Report Title: Completed Report 2</h3>
            <div class="report-details">
                <p>Report Type: Admin Report</p>
                <p>Description: This is another completed report description.</p>
                <p>Report Number: #09876</p>
                <p>Created Date: March 30, 2024</p>
                <p>Completed Date: April 7, 2024</p>
                <button onclick="openFile()">Open File</button>
                <button onclick="editReport()">Edit</button>
            </div>
        </div>
    `;
}

function removeFile() {
    // Functionality to remove file
}

function ignoreRequest() {
    // Functionality to ignore request
}

function submitResponse() {
    // Functionality to submit response
}

function openFile() {
    // Functionality to open file
}

function editReport() {
    // Functionality to edit report
}

function goToSettings() {
    window.location.href = "SettingsLogoutPage.php";
}

function goToReportPage() {
    window.location.href = "ReportPage.php";
}

function goBack() {
    window.history.back();
}
</script>
</body>
</html>
