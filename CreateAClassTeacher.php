<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Class - Teacher</title>
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
    position: relative; /* Added */
}
.header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: bold;
}
.back-button { /* Added */
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}
.container {
    padding: 20px;
}
.form-container {
    width: 50%;
    margin: 0 auto;
}
.form-container input[type="text"], .form-container textarea {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 20px;
    box-sizing: border-box;
    outline: none;
}
.form-container select {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 20px;
    box-sizing: border-box;
    outline: none;
}
.form-container .file-upload {
    margin-bottom: 20px;
}
.form-container .file-upload input[type="file"] {
    display: none;
}
.form-container .file-upload label {
    background-color: var(--dark-red);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.form-container .file-upload label:hover {
    background-color: #8a0000;
}
.button-container {
    text-align: center;
}
.button-container button {
    background-color: var(--dark-red);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.button-container button:hover {
    background-color: #8a0000;
}
/* Added CSS */
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
    <h1>Create Class</h1>
</div>

<div class="container">
    <div class="form-container">
        <form>
            <input type="text" name="classTitle" placeholder="Class Title">
            <input type="text" name="classID" placeholder="Class ID" readonly>
            <textarea name="classDescription" placeholder="Class Description" rows="4"></textarea>
            <select name="fileDropdown">
                <option value="files">Files</option>
            </select>
            <div class="file-upload">
                <input type="file" id="fileInput" multiple>
                <label for="fileInput">Upload Files</label>
            </div>
            <div class="button-container">
                <button type="submit">Create Class</button>
            </div>
        </form>
    </div>
</div>

<div class="footer">
    <button onclick="goToSettings()">Settings</button>
    <button onclick="goToReport()">Report</button>
</div>

<script>
document.querySelector('[name="classID"]').value = generateClassID();

function generateClassID() {
    var classID = '';
    var characters = '0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < 11; i++) {
        classID += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return classID;
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
