<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        th, td {
            padding: 8px;
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        th {
            background-color: #2196F3;
            color: white;
        }
        .left-align {
            text-align: left;
        }
    </style>
</head>
<body>
<?php
include '../dbcon.php';

$branch = $_GET["branch"];
$batch = substr($_GET["batch"], 0, 2);
$sem = $_GET["sem"];
$section = $_GET["section"];
$course = $_GET["course"];

$rollMap = array(
    'A' => array('ECE' => array('0401', '0465'), 'CSE' => array('0501', '0565'), 'IT' => array('1201', '1265'), 'EEE' => array('0201', '0265'), 'AIML' => array('6601', '6665')),
    'B' => array('ECE' => array('0466', '04C9'), 'CSE' => array('0566', '05C9'), 'IT' => array('1266', '12C9'), 'AIML' => array('6666', '66C9')),
    'C' => array('CSE' => array('05C9', '05K2')),
    'D' => array('CSE' => array('05K3', '05R6')),
    'E' => array('CSE' => array('05R7', '05Z0')),
    'F' => array('CSE' => array('05Z1', '05CH'))
);

$useInClause = false;
$rollSuffixList = "";

if (isset($rollMap[$section]) && isset($rollMap[$section][$branch])) {
    $rollStart = $rollMap[$section][$branch][0];
    $rollEnd = $rollMap[$section][$branch][1];

    if ($section === 'F' && $branch === 'CSE') {
        $useInClause = true;
        $rolls = [];
        // 05Z1 to 05Z9
        for ($i = 1; $i <= 9; $i++) {
            $rolls[] = '05Z' . $i;
        }
        // 05AA to 05CH
        $start = base_convert('AA', 36, 10);
        $end = base_convert('CH', 36, 10);
        for ($i = $start; $i <= $end; $i++) {
            $suffix = strtoupper(base_convert($i, 10, 36));
            $suffix = str_pad($suffix, 2, '0', STR_PAD_LEFT);
            $rolls[] = '05' . $suffix;
        }
        // Use the full 4-character roll number suffixes for the IN clause
        $rollSuffixes = [];
        foreach ($rolls as $r) {
            $rollSuffixes[] = "'" . strtoupper($r) . "'"; 
        }
        $rollSuffixList = implode(",", $rollSuffixes);
    }
} else {
    $rollStart = '0000';
    $rollEnd = '0000';
}

if (!$useInClause && base_convert($rollStart, 36, 10) > base_convert($rollEnd, 36, 10)) {
    $temp = $rollStart;
    $rollStart = $rollEnd;
    $rollEnd = $temp;
}

// Get CO Descriptions
$cid = '';
$coDescriptions = array();
$coCount = 6;
$isLab = false;

$cou = "SELECT * FROM course WHERE course_name='$course'";
$res = mysqli_query($conn, $cou);
if ($row = mysqli_fetch_array($res)) {
    $cid = $row["course_id"];
    $coDescriptions = array(
        "CO1" => $row["CO1"],
        "CO2" => $row["CO2"],
        "CO3" => $row["CO3"],
        "CO4" => $row["CO4"],
        "CO5" => $row["CO5"],
        "CO6" => $row["CO6"]
    );
    if (stripos($cid, 'lab') !== false) {
        $isLab = true;
        $coCount = 4;
    }
}

// Build roll filter
if ($useInClause) {
    // CORRECTED: Changed SUBSTRING(l.email, 3, 4) to SUBSTRING(l.email, 7, 4)
    $rollFilter = "AND UPPER(SUBSTRING(l.email, 7, 4)) IN ($rollSuffixList)";
} else {
    // CORRECTED: Changed SUBSTRING(l.email, 3, 4) to SUBSTRING(l.email, 7, 4)
    $rollFilter = "AND CONV(SUBSTRING(l.email, 7, 4), 36, 10) BETWEEN CONV('$rollStart', 36, 10) AND CONV('$rollEnd', 36, 10)";
}

// --- DEBUGGING OUTPUT START ---
echo "<!-- Debug Info: -->\n";
echo "<!-- Branch: " . htmlspecialchars($branch) . " -->\n";
echo "<!-- Batch: " . htmlspecialchars($batch) . " -->\n";
echo "<!-- Sem: " . htmlspecialchars($sem) . " -->\n";
echo "<!-- Section: " . htmlspecialchars($section) . " -->\n";
echo "<!-- Course: " . htmlspecialchars($course) . " -->\n";
echo "<!-- Course ID: " . htmlspecialchars($cid) . " -->\n";
echo "<!-- Use IN Clause: " . ($useInClause ? 'true' : 'false') . " -->\n";
if ($useInClause) {
    echo "<!-- Generated Roll Suffix List: " . htmlspecialchars($rollSuffixList) . " -->\n";
} else {
    echo "<!-- Roll Start: " . htmlspecialchars($rollStart) . " -->\n";
    echo "<!-- Roll End: " . htmlspecialchars($rollEnd) . " -->\n";
}
echo "<!-- Final Roll Filter: " . htmlspecialchars($rollFilter) . " -->\n";

// Table 1: CO Descriptions and Averages
$sql = "SELECT count(c.CO1) as count,        avg(c.CO1) as avg1, avg(c.CO2) as avg2, avg(c.CO3) as avg3,        avg(c.CO4) as avg4, avg(c.CO5) as avg5, avg(c.CO6) as avg6        FROM course_end_survey c        JOIN course_branch b ON c.course_id = b.course_id        JOIN LogDetails l ON SUBSTRING(l.email,1,10) = c.rollnumber
        WHERE b.sem='$sem' AND b.section='$section' AND c.course_id='$cid'
        AND b.branch='$branch' AND b.section=l.section
        AND LEFT(l.email, 2)='$batch'
        $rollFilter";

echo "<!-- SQL Query (Table 1): " . htmlspecialchars($sql) . " -->\n";
// --- DEBUGGING OUTPUT END ---

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

echo "<h3 style='text-align:center;'>$course - Course Outcome Averages</h3>";
echo "<table class='w3-table-all w3-round'>";
echo "<tr><th class='left-align'>Course Outcome</th><th>Average</th></tr>";
for ($i = 1; $i <= $coCount; $i++) {
    $coKey = "CO" . $i;
    echo "<tr>";
    echo "<td class='left-align'>" . $coDescriptions[$coKey] . "</td>";
    echo "<td>" . round($row["avg" . $i], 2) . "</td>";
    echo "</tr>";
}
echo "<tr><td class='left-align'><b>Total Responses</b></td><td><b>" . $row['count'] . "</b></td></tr>";
echo "</table><br>";

// Table 2: CO Rows and Score Columns
function getCOScoreCount($conn, $cid, $sem, $section, $branch, $batch, $rollFilter, $co, $score) {
    $query = "SELECT COUNT(*) as cnt FROM course_end_survey c              JOIN course_branch b ON c.course_id = b.course_id              JOIN LogDetails l ON SUBSTRING(l.email, 1, 10) = c.rollnumber
              WHERE c.course_id = '$cid' AND b.sem = '$sem' AND b.section = '$section'
              AND b.branch = '$branch' AND b.section = l.section
              AND LEFT(l.email, 2) = '$batch'
              $rollFilter
              AND c.$co = '$score'";
    // --- DEBUGGING OUTPUT START (inside function) ---
    echo "<!-- SQL Query (Table 2 for $co, score $score): " . htmlspecialchars($query) . " -->\n";
    // --- DEBUGGING OUTPUT END ---
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    return isset($data['cnt']) ? $data['cnt'] : 0;
}

echo "<h3 style='text-align:center;'>$course - CO Score Distribution</h3>";
echo "<table class='w3-container w3-table-all w3-round' style='width:50%'>";
echo "<tr><th>CO</th>";
for ($score = 5; $score >= 1; $score--) {
    echo "<th>$score</th>";
}
echo "</tr>";
for ($i = 1; $i <= $coCount; $i++) {
    $co = "CO" . $i;
    echo "<tr><td>$co</td>";
    for ($score = 5; $score >= 1; $score--) {
        echo "<td>" . getCOScoreCount($conn, $cid, $sem, $section, $branch, $batch, $rollFilter, $co, $score) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</body>
</html>
