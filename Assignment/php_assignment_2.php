<?php
echo ("<h3>Question 1</h3>");

// 1) Declare the array
echo ("<b>1) Declare the array:</b><br>");
$q1_arr = array (5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);
echo ('$q1_arr = array (5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);<br>');

// 2) Print all elements
echo ("<br><b>2) Print all elements:</b><br>");
foreach ($q1_arr as $q1_n)
    echo ("$q1_n, ");
echo ("<br><br>");

// calculate totals (used by steps 3, 4 and 5)
$q1_total = 0;
$q1_even = 0;
$q1_odd = 0;
foreach ($q1_arr as $q1_n) {
    $q1_total += $q1_n;
    if ($q1_n % 2 == 0)
        $q1_even += $q1_n;
    else
        $q1_odd += $q1_n;
}

// 3) Total of all elements
echo ("<b>3) Total of all elements:</b><br>");
echo ("Total of all elements is: $q1_total<br><br>");

// 4) Total of even elements
echo ("<b>4) Total of even elements:</b><br>");
echo ("Total of even elements is: $q1_even<br><br>");

// 5) Total of odd elements
echo ("<b>5) Total of odd elements:</b><br>");
echo ("Total of odd elements is: $q1_odd<br><br>");

// 6) Minimum element and its positions
echo ("<b>6) Find minimum element and its positions:</b><br>");
$q1_min = min ($q1_arr);
echo ("Minimum element is: $q1_min in positions: ");
for ($q1_i = 0; $q1_i < count ($q1_arr); $q1_i++)
    if ($q1_arr[$q1_i] == $q1_min)
        echo ("[$q1_i] ");
echo ("<br>");

// 7) Maximum element and its positions
echo ("<br><b>7) Find maximum element and its positions:</b><br>");
$q1_max = max ($q1_arr);
echo ("Maximum element is: $q1_max in positions: ");
for ($q1_i = 0; $q1_i < count ($q1_arr); $q1_i++)
    if ($q1_arr[$q1_i] == $q1_max)
        echo ("[$q1_i] ");
echo ("<br>");




echo ("<h3>Question 2</h3>");

// 1) Declare the array
echo ("<b>1) Declare the associative array:</b><br>");
$q2_colors = array (
    "Light" => array (
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),
    "Normal" => array (
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),
    "Dark" => array (
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )
);
echo ('Rows: Light, Normal, Dark. Columns: Red, Green, Blue.<br>');

// 2) Print the array elements as a table
echo ("<br><b>2) Print the array elements:</b><br>");
echo '<table border=1 cellpadding=8 style=border-collapse:collapse>';
echo
'<tr><th bgcolor=lightgray></th>
<th bgcolor=lightgray>Red</th>
<th bgcolor=lightgray>Green</th>
<th bgcolor=lightgray>Blue</th>
</tr>';

foreach ($q2_colors as $q2_i => $q2_info) {
    echo '<tr>'.'<th bgcolor=lightgray>'.$q2_i.'</th>';    
    foreach ($q2_info as $q2_k => $q2_value) {
        echo '<td>'.$q2_value.'</td>';
    }
    echo "</tr>";
}
echo '</table>';




function q3_find ($arr, $value) {
    $found = array ();
    for ($r = 0; $r < 3; $r++)
        for ($c = 0; $c < 3; $c++)
            if ($arr[$r][$c] == $value)
                $found[] = "[$r,$c]";
    return $found;
}

function q3_wide ($text) {
    echo '<tr align=center><td colspan=5>'.$text.'</td></tr>';
}

// only the two corner cells are gray
function q3_gray ($left, $cols, $right) {
    echo '<tr align=center><td bgcolor=gray>'.$left.'</td>';
    foreach ($cols as $c)
        echo '<td>'.$c.'</td>';
    echo '<td bgcolor=gray>'.$right.'</td></tr>';
}

echo ("<h3>Question 3</h3><br>");

// declare the array
$q3_arr = array (
    array (2, -6, 8),
    array (-6, 1, 6),
    array (7, 8, -6)
);

// calculations
$q3_odd = 0;
$q3_even = 0;
$q3_all = 0;
$q3_diag1 = 0;   // top-left to bottom-right
$q3_diag2 = 0;   // top-right to bottom-left
$q3_rowTotal = array (0, 0, 0);
$q3_colTotal = array (0, 0, 0);

for ($q3_r = 0; $q3_r < 3; $q3_r++) {
    for ($q3_c = 0; $q3_c < 3; $q3_c++) {
        $q3_v = $q3_arr[$q3_r][$q3_c];

        if ($q3_v % 2 == 0)
            $q3_even += $q3_v;
        else
            $q3_odd += $q3_v;

        $q3_all += $q3_v;
        $q3_rowTotal[$q3_r] += $q3_v;
        $q3_colTotal[$q3_c] += $q3_v;

        if ($q3_r == $q3_c)
            $q3_diag1 += $q3_v;
        if ($q3_r + $q3_c == 2)
            $q3_diag2 += $q3_v;
    }
}

// min and max of the whole 2D array
$q3_flat = array_merge ($q3_arr[0], $q3_arr[1], $q3_arr[2]);
$q3_min = min ($q3_flat);
$q3_max = max ($q3_flat);
$q3_minPos = q3_find ($q3_arr, $q3_min);
$q3_maxPos = q3_find ($q3_arr, $q3_max);
$q3_minText = "Min element is: $q3_min in ".count ($q3_minPos)." positions: ".implode (", ", $q3_minPos);
$q3_maxText = "Maximum element is: $q3_max in ".count ($q3_maxPos)." positions: ".implode (", ", $q3_maxPos);

// the formatted table from the assignment
echo '<table border=1 cellpadding=5 cellspacing=0>';
q3_wide ("Total odd elements = $q3_odd");
q3_wide ("Total even elements = $q3_even");
q3_gray ($q3_diag1, $q3_colTotal, $q3_diag2);
foreach ($q3_arr as $q3_r => $q3_row) {
    echo '<tr align=center><td>'.$q3_rowTotal[$q3_r].'</td>';
    foreach ($q3_row as $q3_v)
        echo '<td>'.$q3_v.'</td>';
    echo '<td>'.$q3_rowTotal[$q3_r].'</td></tr>';
}
q3_gray ($q3_diag2, $q3_colTotal, $q3_diag1);
q3_wide ("Total all elements = $q3_all");
q3_wide ($q3_minText);
q3_wide ($q3_maxText);
echo '</table><br>';


echo '<h3>Question 4</h3>';

// 1) Declare the array
echo ("<br><b>1) Declare the associative array:</b><br>");
$q4_students = array (
    "CA221" => array (
        "name" => "Mohamed Ahmed Ali",
        "phone" => "0648440403",
        "address" => "Laba Dhagax, Wardhiigley"
    ),
    "CA223" => array (
        "name" => "Ahmed Abdi Jama",
        "phone" => "0647223201",
        "address" => "Taleex, Hodan"
    ),
    "CA225" => array (
        "name" => "Amina Nur Adan",
        "phone" => "0646990276",
        "address" => "Macmacaanka, Dharkeynley"
    )
);
echo ('<br>Rows: CA221, CA223, CA225. Columns: Name, Phone, Address.<br>');

// 2) Print the array elements as a table
echo ("<br><b>2) Print the array elements:</b><br>");
echo '<table border=1 cellpadding=8 style=border-collapse:collapse>';
echo
'<tr><th bgcolor=lightgray></th>
<th bgcolor=lightgray>Name</th>
<th bgcolor=lightgray>Phone</th>
<th bgcolor=lightgray>Address</th>
</tr>';

foreach ($q4_students as $q4_i => $q4_info) {
    echo '<tr>'.'<th bgcolor=lightgray>'.$q4_i.'</th>';
    foreach ($q4_info as $q4_k => $q4_value) {
        echo '<td>'.$q4_value.'</td>';
    }
    echo "</tr>";
}
echo '</table><br>';


echo ("<h3>Question 5</h3><br>");

// 1) Declare the array
echo ("<br><b>1) Declare the transcript array:</b><br>");
$q5_transcript = array (
    "Semester 1" => array (
        "Python Programming" => array ("cw1" => 9.5, "mid" => 26, "cw2" => 10, "final" => 50),
        "Computer Application Skills" => array ("cw1" => 10, "mid" => 27.5, "cw2" => 10, "final" => 48.5),
        "Arabic Language" => array ("cw1" => 2, "mid" => 12, "cw2" => 3, "final" => 30)
    ),
    "Semester 4" => array (
        "Fundamentals of Database Systems" => array ("cw1" => 15, "mid" => 28.5, "cw2" => 15, "final" => 40),
        "Data Logic Design" => array ("cw1" => 9, "mid" => 28, "cw2" => 10, "final" => 49),
        "Financial Accounting" => array ("cw1" => 3, "mid" => 8, "cw2" => 2, "final" => 35.5)
    )
);
echo ('<br>Semesters: 1 and 4. Each semester has 3 courses.<br>');

// 2) Print the array elements as a table
echo ("<br><b>2) Print the array elements:</b><br>");
echo '<table border=1 cellpadding=8 style=border-collapse:collapse>';
echo
'<tr><th>Semester</th>
<th>Course</th>
<th>CW1</th>
<th>MidTerm</th>
<th>CW2</th>
<th>Final</th>
<th>Total</th>
<th>Status</th>
</tr>';

foreach ($q5_transcript as $q5_sem => $q5_courses) {
    $q5_first = true;
    foreach ($q5_courses as $q5_course => $q5_marks) {
        $q5_sum = 0;
        foreach ($q5_marks as $q5_m)
            $q5_sum += $q5_m;

        if ($q5_sum >= 50)
            $q5_status = "Pass";
        else
            $q5_status = "Fail";

        echo '<tr>';
        if ($q5_first) {
            echo '<th rowspan='.count($q5_courses).'>'.$q5_sem.'</th>';
            $q5_first = false;
        }
        echo '<td>'.$q5_course.'</td>';
        foreach ($q5_marks as $q5_k => $q5_value) {
            echo '<td>'.$q5_value.'</td>';
        }
        echo '<td>'.$q5_sum.'</td>';
        echo '<td>'.$q5_status.'</td>';
        echo '</tr>';
    }
}
echo '</table><br>';
?>