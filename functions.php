<?php
// Reusable functions

function calculateTotal($marks) {
    return array_sum($marks);
}

function calculatePercentage($obtained, $total) {
    return ($obtained / $total) * 100;
}

function determineGrade($percentage) {
    if ($percentage >= 80) {
        return "A";
    } elseif ($percentage >= 70) {
        return "B";
    } elseif ($percentage >= 60) {
        return "C";
    } elseif ($percentage >= 50) {
        return "D";
    } elseif ($percentage >= 40) {
        return "E";
    } else {
        return "F";
    }
}

function determineStatus($percentage) {
    if ($percentage >= 40) {
        return "Pass";
    } else {
        return "Fail";
    }
}
