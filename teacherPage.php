<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Teacher Home Page</title>
<style>
:root {
    --background-color: white;
    --text-color: black;
}
body {
    background-color: var(--background-color);
    color: var(--text-color);
}
</style>
</head>
<body onload="changeTheme(document.getElementById('settings'))">
<h1>Teacher Home Page</h1>
<select name="myClasses" id="myClasses">
    <option value="class1">Class 1</option>
    <option value="class2">Class 2</option>
</select>
<h2>Manage Classes</h2>
<!-- Add functionality for managing classes here -->
<h2>Create Class</h2>
<!-- Add functionality for creating a class here -->
<h2>Settings</h2>
<select name="settings" id="settings" onchange="changeTheme(this)">
    <option value="device" selected>Use Device Theme</option>
    <option value="light">Light Mode</option>
    <option value="dark">Dark Mode</option>
</select>
<button onclick="logout()">Logout</button>
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
function logout() {
    window.location.href = "HomePageTest.php";
}
</script>
</body>
</html>
