<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TA Home Page</title>
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
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.header, .footer {
    background-color: var(--dark-red);
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
}
.header h1, .footer h1 {
    margin: 0;
    font-size: 36px;
    font-weight: bold;
}
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex: 1;
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
.footer {
    background-color: var(--dark-red);
    padding: 10px 0;
    display: flex;
    justify-content: center;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
}
.footer button {
    background-color: var(--dark-red);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 5px;
}
</style>
</head>
<body onload="changeTheme(document.getElementById('settings'))">
<div class="header">
    <h1>Ole Miss Notes Center</h1>
</div>

<div class="container">
    <h1>TA Home Page</h1>
    <div class="button-container">
        <button onclick="manageClasses()">Manage Classes</button>
        <button onclick="goToMyClasses()">My Classes</button>
    </div>
</div>

<div class="footer">
    <button onclick="goToSettings()">Settings</button>
    <button onclick="logout()">Logout</button>
</div>

<script>
function changeTheme(selectObject) {
    var selectedOption = selectObject.value;
    if (selectedOption === "dark") {
        document.documentElement.style.setProperty('--background-color', 'black');
        document.documentElement.style.setProperty('--text-color', 'white');
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
function goToSettings() {
    window.location.href = "SettingsLogoutPage.php";
}
function logout() {
    window.location.href = "HomePageTest.php";
}
function manageClasses() {
    window.location.href = "ManageClassesTa.php"
}
function goToMyClasses() {
    window.location.href = "MyClassesTA.php";
}
</script>
</body>
</html>
