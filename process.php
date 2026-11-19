<?php
// Calculations: results, highest scorer, average, pass/fail lists
require_once "functions.php";
require_once "data.php";

$subjectMax = 100; // each subject is out of 100

foreach ($students as $index => $student) {
    $totalMarks    = count($student["marks"]) * $subjectMax;
    $obtainedMarks = calculateTotal($student["marks"]);
    $percentage    = calculatePercentage($obtainedMarks, $totalMarks);

    $students[$index]["total_marks"]    = $totalMarks;
    $students[$index]["obtained_marks"] = $obtainedMarks;
    $students[$index]["percentage"]     = $percentage;
    $students[$index]["grade"]          = determineGrade($percentage);
    $students[$index]["status"]         = determineStatus($percentage);
}

$topStudent     = $students[0];
$percentageSum  = 0;
$passedStudents = [];
$failedStudents = [];

foreach ($students as $student) {
    if ($student["obtained_marks"] > $topStudent["obtained_marks"]) {
        $topStudent = $student;
    }
    $percentageSum += $student["percentage"];

    if ($student["status"] == "Pass") {
        $passedStudents[] = $student;
    } else {
        $failedStudents[] = $student;
    }
}

$totalStudents     = count($students);
$averagePercentage = $percentageSum / $totalStudents;
