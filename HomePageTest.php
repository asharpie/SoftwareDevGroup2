<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HomePage</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}
header {
    background-color: #333;
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 1.2em;
}
main {
    margin: 15px;
    text-align: center;
}
ul {
    list-style-position: inside; 
    text-align: center; 
}
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-size: 0.8em;
}
form, select {
    margin-bottom: 15px;
    font-size: 1.2em;
}
input[type="radio"] {
    transform: scale(1.2);
}
input[type="text"] {
    padding: 5px;
    font-size: 1em;
}
button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
<header>
<h1>Homepage for Notes App</h1>
</header>
<main>
<h2>Search by Class</h2>
<form>
    <input type="radio" id="classID" name="searchType" value="classID">
    <label for="classID">Class ID</label><br>
    <input type="radio" id="classType" name="searchType" value="classType">
    <label for="classType">Class Type</label><br>
    <label for="lookup">Lookup:</label><br>
    <input type="text" id="lookup" name="lookup"><br>
</form>
<h2>Recently Visited Classes</h2>
<ul>
    <li><a href="#">Class 1</a></li>
    <li><a href="#">Class 2</a></li>
    <li><a href="#">Class 3</a></li>
</ul>
<h2>User Type</h2>
<select name="userType" id="userType" onchange="redirectToStudentPage(this)">
    <option value="">Select User Type</option>
    <option value="student">Student</option>
    <option value="teacher">Teacher</option>
    <option value="ta">TA</option>
    <option value="admin">Admin</option>
</select>
</main>
<footer>
<p>© 2024 Note Taking App</p>
</footer>
<script>
function redirectToStudentPage(selectObject) {
    var selectedOption = selectObject.value;
    if (selectedOption === "student") {
        window.location.href = "studentPage.php";
    } else if (selectedOption === "teacher") {
        window.location.href = "teacherPage.php";
    } else if (selectedOption === "ta") {
        window.location.href = "TAHomePage.php";
    } else if (selectedOption === "admin") {
        window.location.href = "adminHomePage.php";
    }
}
</script>
</body>
</html>
