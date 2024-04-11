<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Page</title>
<style>
:root {
    --background-color: white;
    --text-color: black;
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
}
.header h1 {
    margin: 0;
    font-size: 36px;
    font-weight: bold;
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
}
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 120px); /* Adjust for header and footer height */
}
.button-container {
    margin: 20px 0;
}
.button-container button {
    background-color: var(--dark-red);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}
.button-container button:last-child {
    margin-right: 0;
}
</style>
</head>
<body onload="changeTheme(document.getElementById('settings'))">
<div class="header">
    <h1>Ole Miss Notes Center</h1>
</div>

<div class="container">
    <h1>Student Home Page</h1>
    <div class="button-container">
        <button onclick="goToMyClasses()">My Classes</button>
    </div>
</div>

<div class="footer">
    <div class="button-container">
        <button onclick="goToSettings()">Settings</button>
        <button onclick="goToReport()">Report</button>
    </div>
</div>

<script>
function changeTheme(selectObject) {
    var selectedOption = selectObject.value;
    if (selectedOption === "dark") {
        document.documentElement.style.setProperty('--background-color', 'black');
        document.documentElement.style.setProperty('--text-color', 'white');
    } else if (selectedOption === "light") {
        document.documentElement.style.setProperty('--background-color', 'white');
        document.documentElement.style.setProperty('--text-color', 'black');
    } else if (selectedOption === "device") {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.style.setProperty('--background-color', 'black');
            document.documentElement.style.setProperty('--text-color', 'white');
        } else {
            document.documentElement.style.setProperty('--background-color', 'white');
            document.documentElement.style.setProperty('--text-color', 'black');
        }
    }
}
function goToMyClasses() {
    window.location.href = "MyClassesStudent.php";
}
function goToSettings() {
    window.location.href = "SettingsLogoutPage.php";
}
function goToReport() {
    window.location.href = "ReportPage.php";
}
</script>
</body>
</html>
