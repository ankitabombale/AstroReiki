<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
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
            border: 2px solid #A71D21;
            color: #a61c21;
            padding: 8px 16px;
            font-weight: bold;
            font-size: 19px;
            margin: 0 50px 15px auto;

        }

        .student-info {
            background-color: #a61c21;
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
            border: 1px solid #a61c21;
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

        .subjects-table th {
            border: 1px solid #a61c21;
            background-color: #A71D21;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;

        }

        .subjects-table td {
            border: 1px solid #a61c21;
            padding: 6px;
        }

        .grade-table-title {
            background-color: #A71C1F;
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
            border: 1px solid #a61c21;
        }

        .remarks-table td {
            border: 1px solid #a61c21;
            padding: 10px;
            text-align: left;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            padding: 20px 15px 20px 0;
            border: 1px solid #A71D21;
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

            .info-table td {
                font-size: 12px !important;
            }

            .subjects-table td,
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

            .attendance-value {
                width: 21.6% !important;
            }

            .attendance-value1 {
                width: 10.1% !important;
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
                <table class="subjects-table">
                    <thead>
                        <tr>
                            <th style="width: 70%;">Subjects</th>
                            <th style="text-align: center !important; width: 30%;">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //$max_rows = max(count($subjects), count($subsidiary_subjects));
                        $grade_table_started = false;
                        $grade_index = 0;

                        $current_group_id = null;

                        foreach ($subjects_with_group_total as $index => $row) {
                            // Group heading logic
                            if (isset($row['gp_row']) && $row['gp_row']) {
                                // Display group heading before its subjects
                                echo '<tr>';
                                echo '<td style="font-weight: bold;">*' . $row['subject'] . '</td>';
                                echo '<td style="font-weight: bold;"></td>';
                                echo '</tr>';

                                // Go back and display all subjects in this group
                                for ($i = $index - 1; $i >= 0; $i--) {
                                    $prev = $subjects_with_group_total[$i];

                                    if (isset($prev['subject_group_id']) && $prev['subject_group_id'] == $row['subject_group_id']) {
                                        if ($prev['eval_type'] == 'Marked') {
                                            $grade = getGrade($prev, $grading_scale_1, $grading_scale_1_max_upper_limit);
                                            echo '<tr>';
                                            echo '<td style="text-align: left; padding-left: 10px; font-weight: normal;">' . $prev['subject'] . '</td>';
                                            if (isset($prev['key_value']) && $prev['key_value'] != 1) {
                                                $att = '';
                                                if (!empty($prev['attendance_disp_val'])) {
                                                    $words = preg_split('/\s+/', trim($prev['attendance_disp_val']));
                                                    if (count($words) > 1) {
                                                        // Multiple words → first letter of each word
                                                        foreach ($words as $w) {
                                                            $att .= mb_substr($w, 0, 1);
                                                        }
                                                    } else {
                                                        // Single word → first two letters
                                                        $att = mb_substr($words[0], 0, 2);
                                                    }
                                                    $att = mb_strtoupper($att); // uppercase
                                                }
                        ?>

                                                <!-- print one cell spanning 4 columns (or adjust as you like) -->
                                                <td style='text-align:center;'><?php echo $att ?></td>
                                        <?php
                                            } else {
                                                echo '<td style="text-align: center; ' . $grade['disp_color'] . ';">' . $grade['disp_value'] . '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                    } else {
                                        break; // Stop if the previous row isn't part of this group
                                    }
                                }
                            } else if (!isset($row['subject_group_id']) || $row['subject_group_id'] == 0) {
                                // Display ungrouped subjects directly
                                if ($row['eval_type'] == 'Marked') {
                                    $grade = getGrade($row, $grading_scale_1, $grading_scale_1_max_upper_limit);
                                    echo '<tr>';
                                    echo '<td style="text-align: left; font-weight: bold;">' . $row['subject'] . '</td>';
                                    if (isset($row['key_value']) && $row['key_value'] != 1) {
                                        $att = '';
                                        if (!empty($row['attendance_disp_val'])) {
                                            $words = preg_split('/\s+/', trim($row['attendance_disp_val']));
                                            if (count($words) > 1) {
                                                // Multiple words → first letter of each word
                                                foreach ($words as $w) {
                                                    $att .= mb_substr($w, 0, 1);
                                                }
                                            } else {
                                                // Single word → first two letters
                                                $att = mb_substr($words[0], 0, 2);
                                            }
                                            $att = mb_strtoupper($att); // uppercase
                                        }
                                        ?>

                                        <td style='text-align:center;'><?php echo $att ?></td>
                        <?php
                                    } else {
                                        echo '<td style="text-align: center; ' . $grade['disp_color'] . ';">' . $grade['disp_value'] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <table class="subjects-table" style="width:60% !important;">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Subsidiary Subjects</th>
                            <th style="text-align: center !important;">Grade<br> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($subjects_with_group_total as $row) {
                            if ($row['eval_type'] == 'Graded') {
                                $grade = getGrade($row, $grading_scale_1, $grading_scale_1_max_upper_limit);
                                echo "<tr>";
                                echo "<td style='text-align: left; font-weight: normal'>" . $row['subject'] . "</td>";
                                if (isset($row['key_value']) && $row['key_value'] != 1) {
                                    $att = '';
                                    if (!empty($row['attendance_disp_val'])) {
                                        $words = preg_split('/\s+/', trim($row['attendance_disp_val']));
                                        if (count($words) > 1) {
                                            // Multiple words → first letter of each word
                                            foreach ($words as $w) {
                                                $att .= mb_substr($w, 0, 1);
                                            }
                                        } else {
                                            // Single word → first two letters
                                            $att = mb_substr($words[0], 0, 2);
                                        }
                                        $att = mb_strtoupper($att); // uppercase
                                    }
                        ?>
                                    <td style='text-align:center;'><?php echo $att ?></td>
                        <?php
                                } else {
                                    echo "<td style='text-align: center'>" . $grade['disp_value'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }

                        // Grade Table Header
                        echo "<tr>";
                        echo "<td colspan='2' style='background-color: #A71C1F; color: white; text-align: center;'>GRADE TABLE</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td style='text-align: center'>Percentage</td>";
                        echo "<td style='text-align: center'>Grade</td>";
                        echo "</tr>";

                        // Grade Table Rows
                        foreach ($grading_scale_1 as $grade_row) {
                            echo "<tr>";

                            if ($grade_row['lower_limit'] == 0) {
                                // Display "Below upper_limit%"
                                echo "<td style='text-align: center'>Below " . $grade_row['upper_limit'] . "%</td>";
                            } else {
                                // Display "lower_limit - upper_limit%"
                                echo "<td style='text-align: center'>" . $grade_row['lower_limit'] . " - " . $grade_row['upper_limit'] . "%</td>";
                            }

                            echo "<td style='text-align: center'>" . $grade_row['disp_value'] . "</td>"; // Grade
                            echo "</tr>";
                        }

                        ?>
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
                        <td style="width:22%;">Attendance (Days)</td>
                        <td class="attendance-value" style="width:21.7%;"><?php echo $attendance['disp_value']; ?></td>
                        <td style="width:10%;">Out of</td>
                        <td style="width:8.9%;"><?php echo $working_days['disp_value']; ?></td>
                        <td>Conduct</td>
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

            <!-- Signatures -->
            <div class="signatures">
                <div class="signature-box">
                    <div style="margin-top:20px;">DATE: <?php echo $report_date; ?></div>
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
    <?php } ?>