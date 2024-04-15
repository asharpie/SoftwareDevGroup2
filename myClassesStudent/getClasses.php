<?php
function getClasses(){
    require '/home/asharp2/connections/connect.php';
    $query = 'select * from Classes';
    $queryResults = $conn->query($query);
    while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
        echo "Class Name:: <input type='text' value = '" .$row['class_name'] . "'>\n";
        echo "<hr>\n";
    }
}
?>