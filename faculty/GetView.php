<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }
        th { text-align: left; }
    </style>
</head>
<body>

<?php include '../dbcon.php'; ?>

<?php
$batch = $_GET["batch"];
$branch = $_GET["branch"];
?>

<!-- FIRST TABLE: Parameter-wise Score Analysis (was second table) -->
<?php
$parameters = array(
    "PE1" => "Identify, formulate and analyze complex engineering problems by applying knowledge in basic sciences, interdisciplinary subjects and core subjects.",
    "PE2" => "Comprehend the knowledge to design and develop the solutions for complex problems that meet the specified needs of societal, cultural, safety and environmental issues.",
    "PE3" => "Apply research based approach using innovative tools and techniques in the various fields of Engineering.",
    "PE4" => "Demonstrate the knowledge of the engineering and management principles while working individually or as a team.",
    "PE5" => "Communicate effectively in both verbal and written form to develop intrapersonal and interpersonal skills.",
    "PE6" => "Develop competencies through self-education for lifelong learning.",
    "PE7" => "Secure employment or be an entrepreneur with ability to apply professional knowledge with ethical responsibility.",
    "PE8" => "Acquire knowledge to pursue higher studies if I want."
);

$pe_query = "SELECT pe1, pe2, pe3, pe4, pe5, pe6, pe7, pe8
             FROM ges g 
             INNER JOIN LogDetails l 
             ON LEFT(g.rollnumber, 10) = LEFT(l.email, 10)
             WHERE LEFT(g.rollnumber, 2) = '$batch'
             AND l.branch = '$branch'";

$pe_result = mysqli_query($conn, $pe_query);

$gradeCounts = array();
$gradeSums = array();

while ($row = mysqli_fetch_assoc($pe_result)) {
    for ($i = 1; $i <= 8; $i++) {
        $pe = "pe$i";
        $score = trim($row[$pe]);
        
        if ($score >= 1 && $score <= 5) {
            if (!isset($gradeCounts[$pe])) {
                $gradeCounts[$pe] = array(5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0);
                $gradeSums[$pe] = 0;
            }
            $score = (int)$score;
            $gradeCounts[$pe][$score]++;
            $gradeSums[$pe] += $score;
        }
    }
}

echo "<h3 class='w3-blue w3-padding'>Parameter-wise Score Analysis - $branch - $batch batch</h3>";
echo "<table class='w3-table-all w3-hoverable' style='width:100%'>
<tr class='w3-light-blue'>
    <th>Parameter No</th>
    <th>Parameter</th>
    <th>5</th>
    <th>4</th>
    <th>3</th>
    <th>2</th>
    <th>1</th>
    <th>Grade %</th>
</tr>";

foreach ($parameters as $key => $desc) {
    $pe = strtolower($key);
    
    if (isset($gradeCounts[$pe])) {
        $counts = $gradeCounts[$pe];
        $total = array_sum($counts);
        $gradePercent = $total > 0 ? number_format($gradeSums[$pe] / $total, 2) : "0.00";
    } else {
        $counts = array(5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0);
        $gradePercent = "0.00";
    }
    
    echo "<tr>
        <td>$key</td>
        <td>$desc</td>
        <td>{$counts[5]}</td>
        <td>{$counts[4]}</td>
        <td>{$counts[3]}</td>
        <td>{$counts[2]}</td>
        <td>{$counts[1]}</td>
        <td>$gradePercent</td>
    </tr>";
}

echo "</table><br/><br/>";
?>

<!-- SECOND TABLE: Fields Average (was first table) -->
<?php
$sql = "SELECT 
            TRUNCATE(AVG(g.overall), 2) AS avg1,
            TRUNCATE(AVG(g.training_placement), 2) AS avg2,
            TRUNCATE(AVG(g.amenties), 2) AS avg3,
            TRUNCATE(AVG(g.library), 2) AS avg4,
            TRUNCATE(AVG(g.principal), 2) AS avg5,
            TRUNCATE(AVG(g.hod), 2) AS avg6,
            TRUNCATE(AVG(g.teaching), 2) AS avg7,
            TRUNCATE(AVG(g.non_teaching), 2) AS avg8,
            TRUNCATE(AVG(g.labs), 2) AS avg9,
            TRUNCATE(AVG(g.exam_cell), 2) AS avg10,
            TRUNCATE(AVG(g.administration), 2) AS avg11,
            TRUNCATE(AVG(g.ambience), 2) AS avg12,
            TRUNCATE(AVG(g.classrooms), 2) AS avg13,
            COUNT(*) AS tcount
        FROM ges g
        INNER JOIN LogDetails l
        ON LEFT(g.rollnumber, 10) = LEFT(l.email, 10)
        WHERE LEFT(g.rollnumber, 2) = '$batch'
        AND l.branch = '$branch'";

$result = mysqli_query($conn, $sql);

echo "<h3 class='w3-blue w3-padding'>Fields Average - $branch - $batch batch</h3>";
echo "<table class='w3-table-all w3-round' style='width:80%'>
<tr class='w3-blue'>
    <td>Fields</td>
    <td>Average</td>
</tr>";

if ($row = mysqli_fetch_array($result)) {
    $fields = array(
        'Overall Rating' => 'avg1',
        'Placement Training' => 'avg2',
        'Amenties' => 'avg3',
        'Library' => 'avg4',
        'Principal (out of 3)' => 'avg5',
        'HOD (out of 3)' => 'avg6',
        'Teaching (out of 3)' => 'avg7',
        'Non-Teaching' => 'avg8',
        'Labs' => 'avg9',
        'Exam-cell' => 'avg10',
        'Administration' => 'avg11',
        'Ambience' => 'avg12',
        'Classrooms' => 'avg13'
    );
    
    foreach ($fields as $label => $key) {
        echo "<tr><td>$label</td><td>{$row[$key]}</td></tr>";
    }
    echo "<tr><td>Total Number of Students given</td><td>{$row['tcount']}</td></tr>";
} else {
    echo "<tr><td colspan='2'>No Records Found</td></tr>";
}

echo "</table>";

mysqli_close($conn);
?>

</body>
</html>