<?php require_once "process.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Student Result Management</h1>

<h2>All Students</h2>
<table>
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <?php foreach (array_keys($students[0]["marks"]) as $subject): ?>
            <th><?php echo $subject; ?></th>
        <?php endforeach; ?>
        <th>Total Marks</th>
        <th>Obtained Marks</th>
        <th>Percentage</th>
        <th>Grade</th>
        <th>Status</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student["roll_no"]; ?></td>
        <td><?php echo $student["name"]; ?></td>
        <?php foreach ($student["marks"] as $mark): ?>
            <td><?php echo $mark; ?></td>
        <?php endforeach; ?>
        <td><?php echo $student["total_marks"]; ?></td>
        <td><?php echo $student["obtained_marks"]; ?></td>
        <td><?php echo number_format($student["percentage"], 2); ?>%</td>
        <td><?php echo $student["grade"]; ?></td>
        <td class="<?php echo strtolower($student["status"]); ?>"><?php echo $student["status"]; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Highest-Scoring Student</h2>
<div class="box">
    <?php echo $topStudent["name"]; ?> (Roll No <?php echo $topStudent["roll_no"]; ?>) scored
    <?php echo $topStudent["obtained_marks"]; ?> / <?php echo $topStudent["total_marks"]; ?>
    (<?php echo number_format($topStudent["percentage"], 2); ?>%), Grade <?php echo $topStudent["grade"]; ?>
</div>

<h2>Average Percentage</h2>
<div class="box">
    Average percentage of all students: <strong><?php echo number_format($averagePercentage, 2); ?>%</strong>
</div>

<h2>Passed Students</h2>
<table>
    <tr><th>Roll No</th><th>Name</th><th>Percentage</th><th>Grade</th></tr>
    <?php foreach ($passedStudents as $student): ?>
    <tr>
        <td><?php echo $student["roll_no"]; ?></td>
        <td><?php echo $student["name"]; ?></td>
        <td><?php echo number_format($student["percentage"], 2); ?>%</td>
        <td><?php echo $student["grade"]; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Failed Students</h2>
<table>
    <tr><th>Roll No</th><th>Name</th><th>Percentage</th><th>Grade</th></tr>
    <?php foreach ($failedStudents as $student): ?>
    <tr>
        <td><?php echo $student["roll_no"]; ?></td>
        <td><?php echo $student["name"]; ?></td>
        <td><?php echo number_format($student["percentage"], 2); ?>%</td>
        <td><?php echo $student["grade"]; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Summary</h2>
<table>
    <tr><th>Total Students</th><th>Passed Students</th><th>Failed Students</th></tr>
    <tr>
        <td><?php echo $totalStudents; ?></td>
        <td class="pass"><?php echo count($passedStudents); ?></td>
        <td class="fail"><?php echo count($failedStudents); ?></td>
    </tr>
</table>

</body>
</html>
