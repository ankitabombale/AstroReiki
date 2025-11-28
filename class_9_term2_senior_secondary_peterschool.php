<?php

?><?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
<!-- Display report card HTML here -->
<!-- This section will only be shown if the form was submitted -->


<style>
    body {
        font-family: Arial, sans-serif;
        /* margin: 20px; */
        background-color: #f5f5f5;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin: 25px auto 5px auto;
        gap: 10px;
    }

    .logo-section {
        /* flex: 0 0 auto; */
        display: flex;
        align-items: center;
        margin-left: 15px;
        width: 22%;
    }

    .logo {
        width: 170px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .school-info {
        flex: 1;
        /* take remaining space */
        text-align: left;
    }

    .school-name {
        font-size: 36px;
        font-weight: bold;
        color: #a61b20;
        margin-bottom: 8px;
        border-bottom: 5px solid #fac424;
        padding-bottom: 13px;
    }

    .school-details {
        font-size: 14px;
        color: #333;
        line-height: 1.4;
    }

    .report-title {
        display: inline-block;
        text-align: center;
        background-color: #fff;
        border: 2px solid #a61b20;
        color: #a61b20;
        padding: 8px 16px;
        font-weight: bold;
        font-size: 19px;
        margin: 0 50px 15px auto;

    }

    .student-info {
        background-color: #a61b20;
        color: white;
        padding: 8px 12px;
        font-weight: bold;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        font-size: 14px;
    }

    .student-name {
        text-align: left;
        flex: 1;
    }

    .account-no {
        position: absolute;
        left: 50%;
        margin-left: 2px;
        text-align: center;
    }

    .info-table {
        width: 100%;
        border-collapse: collapse;
        color: #B62321;
        font-weight: bold;
    }

    .info-table td {
        border: 1px solid #a61b20;
        padding: 8px;
        font-size: 14px;
    }

    .info-label {
        font-weight: bold;
        width: 25% !important;
    }

    .subjects-table {
        width: 100%;
        border-collapse: collapse;

    }

    .subjects-table tbody {
        background-color: #fff1cc;
    }

    .subjects-table th {
        border: 1px solid #d95e5f;
        background-color: #a61b20;
        color: white;
        padding: 10px;
        text-align: left;
        font-weight: bold;

    }

    .subjects-table td {
        border: 1px solid #d95e5f;
        padding: 6px;
    }

    .grade-table-title {
        background-color: #a61b20;
        color: white;
        text-align: center;
        font-weight: bold;
    }

    .grade-table {
        text-align: center;
        font-weight: bold;
    }

    .attendance-section {
        margin: 20px 0;
    }

    .remarks-section {
        margin: 20px 0;
    }

    .remarks-table {
        width: 100%;
        border-collapse: collapse;
        font-weight: 300;
    }

    .remarks-table th {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #d95e5f;
    }

    .remarks-table td {
        border: 1px solid #d95e5f;
        padding: 10px;
        text-align: left;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        padding: 20px 15px 5px 0;
        /* border: 1px solid #d95e5f; */
        margin: 5px 0 0 0;
    }

    .signature-box {
        text-align: center;
        width: 200px;
        margin-right: 50px;
    }

    .signature-line {
        border-bottom: 1px solid #333;
        margin-bottom: 5px;
        height: 30px;
    }

    .date {
        margin-top: 30px;
        margin-right: 95px;
    }

    .signature-outside {
        padding: 5px 5px 5px 0;
        border: 1px solid #d95e5f;
        /* margin: 5px 0 0 0; */
    }

    .signature1 {
        margin: 5px 0 0 0;
    }

    .attendace-table {
        background-color: #ffffff;
    }
    th {
    background-color: #a61b20;
    color: white;
}


    @media print {
        body {
            background-color: white !important;
            margin: 0;
            font-size: 12pt;
        }

        .container {
            box-shadow: none !important;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .logo-section {
            /* flex: 0 0 auto; */
            display: flex;
            align-items: center;
            margin-left: 10px;
            width: 28%;
        }

        .report-title {
            font-size: 15px;
            margin: 0 10px 8px auto !important;
        }

        .header,
        .school-info,
        .school-details,
        .school-name {
            page-break-inside: avoid;
        }

        .school-name {
            padding-bottom: 5px !important;
        }

        .subjects-table,
        .info-table,
        .remarks-table {
            page-break-inside: avoid;
            break-inside: avoid;
            width: 100% !important;

        }

        .subsidiary-sub {
            padding: 30px 5px 0 30px !important;
            width: 50% !important;
        }

        .info-table td {
            font-size: 12px !important;
        }

        .subjects-table td,
        .subjects-table th {
            font-size: 13px;

        }

        .subjects-table th {
            width: 60% !important;
        }

        .remarks-table th,
        .remarks-table td {
            font-size: 14px;
        }

        .signatures {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .signature-line {
            height: 40px !important;
        }

        .attendance-val {
            width: 19.3% !important;
        }

        .attendance-value {
            width: 18.7% !important;
        }

        .attendance-value1 {
            width: 13.8% !important;
        }

        .attendance-value2 {
            width: 12.7% !important;
        }
    }
</style>
</head>

<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo-section">
                <img class="logo" src="<?php echo $school_logo ?>" alt="school_logo">

            </div>
            <div class="school-info">
                <?php
                $school_name = $school_info[0]['school_name'];

                // Replace "ST" with "ST." and "PETER" with "PETER'S"
                $display_name = str_ireplace(
                    ['ST ', 'PETER'],   // search
                    ['ST. ', "PETER'S"], // replace
                    $school_name
                );
                ?>
                <div class="school-name"><?= $display_name ?></div>
                <div class="school-details">
                    <?php echo $school_info[0]['school_address_line_1'] . ", Pin " . $school_info[0]['school_pincode'] . ", " . $school_info[0]['school_address_line_2']; ?><br>
                    <?php $formatted_phone = $school_info[0]['school_phone']; // +912168241584

                    // Step 1: Remove +91 if it exists
                    if (substr($formatted_phone, 0, 3) == '+91') {
                        $formatted_phone = '0' . substr($formatted_phone, 3); // replace +91 with 0
                    }

                    // Step 2: Insert hyphen after first 5 digits
                    $first_part = substr($formatted_phone, 0, 5);
                    $second_part = substr($formatted_phone, 5);
                    $phone = $first_part . '-' . $second_part; ?>
                    <b>Tel: </b><?php echo $phone; ?> / <?php echo $school_info[0]['support_phone']; ?><br>
                    <b>Email: </b><?php echo $school_info[0]['school_email']; ?>
                </div>
            </div>
        </div>

        <!-- Report Title -->
        <div style="text-align: center;">
            <div class="report-title">
                ACADEMIC PROGRESS REPORT - <?php echo strtoupper($exam1[0]['exam_name']); ?> - A.Y. (<?php echo $academic_year[0]['academic_name']; ?>)
            </div>
        </div>
        <!-- Student Information -->
        <div class="student-info">
            <div class="student-name">
                Name: <?php
                        $class = $student_info[0]['class_name'];
                        // echo $class;
                        if ($class == '1') {
                            echo $student_info[0]['student_name'];
                        } elseif (in_array($class, ['2', '3', '4'])) {
                            echo $student_info[0]['student_full_name'];
                        }
                        ?>
            </div>
            <div class="account-no">
                Account No: <?php echo $student_info[0]['student_admission_number']; ?>
            </div>
        </div>

        <!-- Basic Info Table -->
        <table class="info-table">
            <tr>
                <td class="info-label">Date of Birth</td>
                <td class="info-label"><?php echo date("d-M-Y", strtotime($student_info[0]['date_of_birth'])); ?></td>
                <td class="info-label">Class - Div</td>
                <td class="info-label"><?php
                                        // Mapping class numbers to Roman numerals
                                        $roman_classes = [
                                            '1' => 'I',
                                            '2' => 'II',
                                            '3' => 'III',
                                            '4' => 'IV',
                                            '5' => 'V',
                                            '6' => 'VI',
                                            '7' => 'VII',
                                            '8' => 'VIII',
                                            '9' => 'IX',
                                            '10' => 'X'
                                        ];

                                        $class = $student_info[0]['class_name'];
                                        $section = $student_info[0]['section_name'];

                                        $class_roman = isset($roman_classes[$class]) ? $roman_classes[$class] : $class;

                                        echo $class_roman . ' - ' . $section;
                                        ?></td>
            </tr>
            <tr>
                <td class="info-label">G.R. No.</td>
                <td><?php echo $student_info[0]['grn']; ?></td>
                <td class="info-label">House</td>
                <td><?php echo $student_info[0]['house_name']; ?></td>
            </tr>
        </table>
        <!-- Subjects Table -->
        <div style="width: 100%; display: flex;">
            <!-- MAIN (MARKED) SUBJECTS -->
            <table class="subjects-table">
                <thead>
                    <tr>
                        <th style="width: 35%;">Subjects</th>
                        <th>Term (T1) (100)</th>
                        <th>IA 2<br>(<?php echo $subjects_with_group_total[0]['max_internal_marks'] ?>)</th>
                        <th>Term 2<br>(<?php echo $subjects_with_group_total[0]['max_marks'] ?>)</th>
                        <th>Term II (T2)<br>(<?php echo $subjects_with_group_total[0]['max_internal_marks'] + $subjects_with_group_total[0]['max_marks'] ?>)</th>
                        <th>Average <br> (T1&T2) <br> (100)</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <?php

                ?>
                <tbody>
                    <?php
                    // --- Build subject lists from both terms ---
                    $displayNames = []; // preserve display names
                    $groups = [];
                    $group_names = [];
                    function customRound($value)
                    {
                        $decimal = $value - floor($value);
                        return $decimal > 0.4 ? ceil($value) : floor($value);
                    }
                    // --- safe helpers ---
                    function toNumericOrNull($v)
                    {
                        // treat numeric strings, ints, floats as numeric; otherwise null
                        return (isset($v) && $v !== '' && is_numeric($v)) ? (float)$v : null;
                    }

                    function displayField($v)
                    {
                        // Show 0 when 0, show numeric rounded value when numeric, else '-'
                        if ($v === 0 || $v === 0.0 || $v === '0') return '0';
                        if (is_numeric($v)) return (string) customRound((float)$v);
                        return '-';
                    }
                    // Term II dataset (for grouping)
                    if (!empty($subjects_with_group_total)) {
                        foreach ($subjects_with_group_total as $row) {
                            $key = strtolower(trim($row['subject']));
                            $displayNames[$key] = $row['subject'];

                            if (!empty($row['subject_group_id'])) {
                                if (!empty($row['gp_row'])) {
                                    $group_names[] = $key;
                                    $groups[$row['subject_group_id']]['group_name'] = $row['subject'];
                                    if (!isset($groups[$row['subject_group_id']]['subjects'])) {
                                        $groups[$row['subject_group_id']]['subjects'] = [];
                                    }
                                } else {
                                    $groups[$row['subject_group_id']]['subjects'][] = $key;
                                }
                            }
                        }
                        $group_names = array_unique($group_names);
                    }

                    // --- Term I marks ---
                    $term1Marks = [];
                    if (!empty($total)) {
                        foreach ($total as $row) {
                            $k = strtolower(trim($row['subject_name']));
                            $marks_val = toNumericOrNull($row['total_term1_marks']);
                            $term1Marks[$k] = [
                                'marks' => $marks_val, // numeric or null
                                'eval_type' => $row['eval_type'] ?? 'Marked',
                                'grade' => $row['grade'] ?? ''
                            ];
                            if (!isset($displayNames[$k])) $displayNames[$k] = $row['subject_name'];
                        }
                    }

                    // --- Term II marks ---
                    $term2Marks = [];
                    if (!empty($subjects_with_group_total)) {
                        foreach ($subjects_with_group_total as $row) {
                            if (!empty($row['gp_row'])) continue;
                            $key = strtolower(trim($row['subject']));

                            // find matching UT2 row
                            $ut_match = null;
                            if (!empty($subjects_with_group_total2)) {
                                foreach ($subjects_with_group_total2 as $u_row) {
                                    if (strtolower(trim($u_row['subject'])) == $key) {
                                        $ut_match = $u_row;
                                        break;
                                    }
                                }
                            }

                            // get numeric or null
                            $internal = toNumericOrNull($row['internal_marks_secured']);

                            $term2_main = toNumericOrNull($row['marks_obtained']);

                            $total_combined = null;
                            if (is_numeric($internal) || is_numeric($term2_main)) {
                                // treat missing parts as 0 for the sum but result becomes numeric only if at least one part exists
                                $total_combined = (float) (($internal ?? 0) + ($term2_main ?? 0));
                            }

                            $term2Marks[$key] = [
                                'internal_marks_secured' => $internal,
                                'marks_obtained' => $term2_main,
                                'total_combined_marks' => $total_combined,
                                'eval_type' => $row['eval_type'] ?? 'Marked',
                                'grade' => $row['grade'] ?? ''
                            ];

                            if (!isset($displayNames[$key])) {
                                $displayNames[$key] = $row['subject'];
                            }
                        }
                    }

                    // --- Combine subjects from both terms ---
                    $allSubjects = array_unique(array_merge(array_keys($term1Marks), array_keys($term2Marks)));
                    $allSubjects = array_values(array_diff($allSubjects, $group_names)); // remove group headers
                    $displayed = [];


                    // === Define fixed subject groups ===
                  $group1 = [
    '*English',
    'English Language',
    'Literature In English',
    'Hindi',
    '*Social Studies',
    'History & Civics',
    'Geography'
];

$group2 = [
    'Mathematics',
    '*Science',
    'Physics',
    'Chemistry',
    'Biology'
];

$group3 = [
    'Commercial Applications'
];



                    // === Helper to print one subject row ===
                    function printSubjectRow($label, $term1Marks, $term2Marks, $grading_scale_1, $padding = 7)
                    {
                        $key = strtolower(trim($label));

                        if (!isset($term1Marks[$key]) && !isset($term2Marks[$key])) return;

                        $eval_type = $term2Marks[$key]['eval_type'] ?? ($term1Marks[$key]['eval_type'] ?? '');
                        if (strtolower($eval_type) !== 'marked') return;

                        $t1val = $term1Marks[$key]['marks'] ?? null;
                        $internal = $term2Marks[$key]['internal_marks_secured'] ?? null;
                        $main = $term2Marks[$key]['marks_obtained'] ?? null;

                        $t2val = null;
                        if (is_numeric($internal) || is_numeric($main)) {
                            $t2val = (float)(($internal ?? 0) + ($main ?? 0));
                        }

                        if (is_numeric($t1val) || is_numeric($t2val)) {
                            $avg_marks = customRound((($t1val ?? 0) + ($t2val ?? 0)) / 2);
                        } else {
                            $avg_marks = null;
                        }

                        $avg_grade = is_numeric($avg_marks)
                            ? getGrade3($avg_marks, 100, $grading_scale_1)
                            : ['custom_disp_value' => '-'];

                        echo "<tr>";
                        echo "<td style='padding-left:{$padding}px;'>" . htmlspecialchars($label) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($t1val) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($internal) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($main) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($t2val) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($avg_marks) . "</td>";
                        echo "<td style='text-align:center;'>" . ($avg_grade['custom_disp_value'] ?? '-') . "</td>";
                        echo "</tr>";
                    }


              
                    // === Function to print a complete group with header (with average for *header subjects) ===
                    function printGroup($groupName, $subjects, $term1Marks, $term2Marks, $grading_scale_1)
                    {
echo "<tr>
        <td colspan='7' style='font-weight:bold; text-align:left; background-color:#A71C1F; color:white;'>
            $groupName
        </td>
      </tr>";

                        $i = 0;
                        $n = count($subjects);

                        while ($i < $n) {
                            $subj = $subjects[$i];
                            $key = strtolower(trim($subj));

                            if (strpos($subj, '*') === 0) {
                                // --- Header subject ---
                                $header = ltrim($subj, '* ');
                                $subSubjects = [];

                                // Collect sub-subjects
                                $j = $i + 1;
                                while ($j < $n && strpos($subjects[$j], '*') !== 0) {
                                    $subSubjects[] = $subjects[$j];
                                    $j++;
                                }

                                // Totals and counts for averaging
                                $t1_total = $internal_total = $ut_total = $marks_total = $term2_total = $t1t2_total_for_avg = 0;
                                $t1_count = $internal_count = $ut_count = $marks_count = $term2_count = $t1t2_count = 0;

                                foreach ($subSubjects as $sub) {
                                    $subKey = strtolower(trim($sub));

                                    // Term1 marks
                                    $t1val = $term1Marks[$subKey]['marks'] ?? null;
                                    if (is_numeric($t1val)) {
                                        $t1_total += $t1val;
                                        $t1_count++;
                                    }

                                    // Internal (IA2)
                                    $ival = $term2Marks[$subKey]['internal_marks_secured'] ?? null;
                                    if (is_numeric($ival)) {
                                        $internal_total += $ival;
                                        $internal_count++;
                                    }

                                    // Term2 main marks
                                    $mval = $term2Marks[$subKey]['marks_obtained'] ?? null;
                                    if (is_numeric($mval)) {
                                        $marks_total += $mval;
                                        $marks_count++;
                                    }

                                    // Term2 combined
                                    $tcval = $term2Marks[$subKey]['total_combined_marks'] ?? null;
                                    if (is_numeric($tcval)) {
                                        $term2_total += $tcval;
                                        $term2_count++;
                                    }

                                    // T1+T2 average per subject
                                    if (is_numeric($t1val) && is_numeric($tcval)) {
                                        $t1t2_total_for_avg += ($t1val + $tcval) / 2;
                                        $t1t2_count++;
                                    }
                                }

                                // Compute averages safely
                                $group_term1_avg = $t1_count ? customRound($t1_total / $t1_count) : null;
                                $internal_marks_avg = $internal_count ? customRound($internal_total / $internal_count) : null;
                                $marks_avg = $marks_count ? customRound($marks_total / $marks_count) : null;
                                $term2_avg = $term2_count ? customRound($term2_total / $term2_count) : null;
                                $t1_t2_avg = $t1t2_count ? customRound($t1t2_total_for_avg / $t1t2_count) : null;

                                $totalgrade = getGrade3($t1_t2_avg ?? 0, 100, $grading_scale_1);

                                // --- Print header row (group summary) ---
                                echo '<tr>'
    . '<td style="padding-left:7px; font-weight:bold; color:#000;">' . htmlspecialchars($header) . '</td>'

                                    . '<td style="text-align:center;">' . displayField($group_term1_avg) . '</td>'
                                    . '<td style="text-align:center;">' . displayField($internal_marks_avg) . '</td>'
                                    . '<td style="text-align:center;">' . displayField($marks_avg) . '</td>'
                                    . '<td style="text-align:center;">' . displayField($term2_avg) . '</td>'
                                    . '<td style="text-align:center;">' . displayField($t1_t2_avg) . '</td>'
                                    . '<td style="text-align:center;">' . ($t1_t2_avg !== null ? ($totalgrade['custom_disp_value'] ?? '-') : '-') . '</td>'
                                    . '</tr>';

                                // --- Print sub-subject rows ---
                                foreach ($subSubjects as $sub) {
                                    printSubjectRow($sub, $term1Marks, $term2Marks, $grading_scale_1, 14);
                                }

                                $i = $j;
                            } else {
                                // Non-header subject
                                printSubjectRow($subj, $term1Marks, $term2Marks, $grading_scale_1, 14);
                                $i++;
                            }
                        }
                    }


                    // === Print fixed groups first ===
                    printGroup('Group I', $group1, $term1Marks, $term2Marks, $grading_scale_1);
                    printGroup('Group II', $group2, $term1Marks, $term2Marks, $grading_scale_1);
                    printGroup('Group III', $group3, $term1Marks, $term2Marks, $grading_scale_1);

                    // === Then keep your existing ungrouped subjects (not in hardcoded arrays) ===
                    $hardcoded_all = array_map('strtolower', array_merge($group1, $group2, $group3));
                    foreach ($allSubjects as $key) {
                        if (in_array($key, $hardcoded_all)) continue; // skip already shown

                        $eval_type = $term2Marks[$key]['eval_type'] ?? ($term1Marks[$key]['eval_type'] ?? '');
                        if (strtolower($eval_type) !== 'marked') continue;

                        $label = htmlspecialchars($displayNames[$key] ?? ucwords($key));
                        $t1val = $term1Marks[$key]['marks'] ?? null;
                        $internal = $term2Marks[$key]['internal_marks_secured'] ?? null;
                        $main = $term2Marks[$key]['marks_obtained'] ?? null;
                        $t2val = (is_numeric($internal) || is_numeric($main)) ? (float)(($internal ?? 0) + ($main ?? 0)) : null;
                        $avg_marks = is_numeric($t1val) || is_numeric($t2val) ? customRound((($t1val ?? 0) + ($t2val ?? 0)) / 2) : null;
                        $avg_grade = is_numeric($avg_marks) ? getGrade3($avg_marks, 100, $grading_scale_1) : ['custom_disp_value' => '-'];

                        echo "<tr>";
                        $class = ($padding == 14) ? "sub-subject" : "main-subject";
                        echo "<td class='{$class}'>" . htmlspecialchars($label) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($t1val) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($internal) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($main) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($t2val) . "</td>";
                        echo "<td style='text-align:center;'>" . displayField($avg_marks) . "</td>";
                        echo "<td style='text-align:center;'>" . ($avg_grade['custom_disp_value'] ?? '-') . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>


            <!-- SUBSIDIARY SUBJECTS -->
            <table class="subjects-table" style="width: 60%;">
                <thead>
                    <tr>
                        <th class="subsidiary-sub" colspan="2" style="text-align:left; padding: 30px 0 30px 8px !important;">Subsidiary Subjects</th>
                        <th style="text-align:center;">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allSubjects as $key) {
                        $t1 = isset($term1Marks[$key]['marks']) ? $term1Marks[$key]['marks'] : 0;
                        $t2 = isset($term2Marks[$key]['total_combined_marks']) ? $term2Marks[$key]['total_combined_marks'] : 0;
                        $eval_type = $term2Marks[$key]['eval_type'] ?? ($term1Marks[$key]['eval_type'] ?? 'Marked');

                        if ($eval_type !== 'Graded') continue;

                        // $t1_grade = $term1Marks[$key]['grade'] ?? '';
                        // $t2_grade = $term2Marks[$key]['grade'] ?? '';

                        // $hasT1 = is_numeric($t1);
                        // $hasT2 = is_numeric($t2);

                        $avg_marks = customRound($t1 + $t2 > 0 ? ($t1 + $t2) / 2 : 0);
                        $avg_grade = getGrade3($avg_marks, 100, $grading_scale_1);


                        $label = htmlspecialchars($displayNames[$key] ?? ucwords($key));
                        //$avg_grade = getGrade3($avg, 100, $grading_scale_1);

                        echo '<tr>';
                        echo '<td colspan="2" style="padding-left:15px; !important">' . $label . '</td>';
                        // echo '<td style="text-align:center;">' . ($hasT1 ? $t1_grade['disp_value'] : '-') . '</td>';
                        // echo '<td style="text-align:center;">' . ($hasT2 ? $t2_grade['disp_value'] : '-') . '</td>';
                        echo '<td style="text-align:center;">' . ($avg_marks !== '' ? $avg_grade['disp_value'] : '-') . '</td>';

                        echo '</tr>';
                    }
                    ?>
                </tbody>
                <tbody style='background-color: #fff !important;'>
                    <?php
                    // Grade Table Header
                    echo "<tr>";
                    echo "<td colspan='3' style='background-color: #A71C1F; color: white; text-align: center;'>GRADE TABLE</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td style='text-align:center;'>Percentage</td>";
                    echo "<td style='text-align:center;'>No. Grade</td>";
                    echo "<td colspan='1' style='text-align:center;'>Grade</td>";
                    echo "</tr>";

                    // Grade Table Rows
                    foreach ($grading_scale_1 as $grade_row) {
                        echo "<tr>";
                        if ($grade_row['lower_limit'] == 0) {
                            echo "<td style='text-align: center'> Below " . $grade_row['upper_limit'] . "%</td>";
                        } else {
                            echo "<td style='text-align: center'>" . $grade_row['lower_limit'] . " - " . $grade_row['upper_limit'] . "%</td>";
                        }
                        echo "<td style='text-align: center'>" . $grade_row['custom_disp_value'] . "</td>";
                        echo "<td style='text-align: center'>" . $grade_row['disp_value'] . "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>

        <?php
        $remark = getRemark($remarks, 'remarks');
        $progress = getRemark($remarks, 'progress');
        $conduct = getRemark($remarks, 'conduct');
        $attendance = getRemark($remarks, 'attendance');
        $working_days = getRemark($remarks, 'working_days');
        $additional_remarks = getRemark($remarks, 'additional_remarks');
        $grade = getRemark($remarks, 'grade');
        ?>
        <table class="subjects-table">
            <tbody>
                <tr class="attendace-table">
                    <td class="attendance-val" style="width:25.3%;">Attendance (Days)</td>
                    <td class="attendance-value" style="width: 15.5%;"><?php echo $attendance['disp_value']; ?></td>
                    <td class="attendance-value1" style="width:11.7%;">Out of</td>
                    <td class="attendance-value2" style="width:10.1%;"><?php echo $working_days['disp_value']; ?></td>
                    <td class="attendance-value3" style="width:15.5%;">Conduct</td>
                    <td><?php echo $conduct['disp_value']; ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Teacher's Remarks -->
        <table class="remarks-table">
            <thead>
                <tr>
                    <th colspan="2">Class Teacher's Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 200px;">Student's Strengths</td>
                    <td><?php echo $progress['disp_value']; ?></td>
                </tr>
                <tr>
                    <td>Participation</td>
                    <td><?php echo $remark['disp_value']; ?></td>
                </tr>
                <tr>
                    <td>Areas of Improvement</td>
                    <td><?php echo $additional_remarks['disp_value']; ?></td>
                </tr>
            </tbody>
        </table>

        <?php

        $next_class_num = (int)$class + 1;
        $next_class_roman = $roman_classes[$next_class_num] ?? 'N/A';
        ?>
        <!-- Signatures -->
        <div class="signature-outside">
            <div class="signatures1">
                <div style="width: 100%; font-weight: bold; font-size: 14px; margin: 5px 0 0 15px;">
                    Congratulations! Promoted to Class <?php echo $next_class_roman; ?>
                </div>
            </div>
            <div class="signatures">
                <div class="signature-box">
                    <div style="margin:20px 0 0 -50px;">DATE: <?php echo $report_date; ?></div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"> <?php if (!empty($class_teacher[0]['staff_sign'])): ?>
                            <img src="<?php echo $signFolder . $class_teacher[0]['staff_sign']; ?>"
                                alt="Signature"
                                style="height:28px; width:auto;">
                        <?php endif; ?>
                    </div>
                    <div>Class Teacher</div>
                    <div>(<?php if (!empty($class_teacher)) {
                                echo $class_teacher[0]['staff_name'];
                            } ?>) </div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"> <?php if (!empty($principal[0]['staff_sign'])): ?>
                            <img src="<?php echo $signFolder . $principal[0]['staff_sign']; ?>"
                                alt="Signature"
                                style="height:30px; width:auto;">
                        <?php endif; ?>
                    </div>
                    <div>Principal</div>
                    <div>(<?php if (!empty($principal)) {
                                echo $principal[0]['staff_name'];
                            } ?>) </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>