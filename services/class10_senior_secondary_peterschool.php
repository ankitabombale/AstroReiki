<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>School Academic Progress Report</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 20px;
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
				display: flex;
				padding: 8px;
				font-weight: bold;
				margin-bottom: 0;
			}

			.info-table {
				width: 100%;
				border-collapse: collapse;
			}

			.info-table td {
				border: 1px solid #ddd;
				padding: 8px;
				font-size: 14px;
				border: 1px solid #a61c21;
				font-weight: bold;
				width: 150px;
				color: #B62321;
			}

			.subjects-table {
				width: 100%;
				border-collapse: collapse;
			}

			.subjects-table th {
				border: 1px solid #a61c21;
				background-color: #A71C1F;
				color: white;
				padding: 10px;
				text-align: center;
				font-weight: bold;
				height: 4rem;
			}

			.subjects-table td {
				border: 1px solid #a61c21;
				padding: 8px;
				text-align: center;

			}

			.grade-table {
				background-color: #A71C1F;
				color: white;
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
				align-items: center;
				padding: 20px 15px 20px 0;
				border: 1px solid #A71D21;
				border-bottom: 1px solid black;
			}

			.signature-box {
				text-align: center;
				width: 200px;
			}

			.signature-line {
				border-bottom: 1px solid #333;
				margin-bottom: 5px;
				height: 30px;
			}

			#attendace-table td {
				text-align: left !important;
			}

			.att-col1 {
				width: 26.9%;
			}
			.att-col2 {
				width: 17.6%;
			}

			.att-col3 {
				width: 8.6%;
			}
			.att-col4 {
				width: 9.4%;
			}

			@media print {
				.logo {
					padding-right: 20px !important;
				}

				.report-title {
					margin: 10px 0 10px 0;
				}



				.subjects-table th,
				.subjects-table td {
					font-size: 14px !important;
					padding: 5px !important;
					vertical-align: middle !important;
					line-height: 1.2 !important;
				}

				.subjects-table th {
					height: 60px !important;
					max-height: 60px !important;
					min-height: 60px !important;
					overflow: hidden !important;
				}

				body {
					-webkit-print-color-adjust: exact !important;
					print-color-adjust: exact !important;
				}

				#attendace-table td {
					text-align: left !important;
				}

				.att-col1 {
					width: 26.8%;
				}
				.att-col2 {
					width: 17.5%;
				}
				.att-col3 {
					width: 8.5%;
				}
				.att-col4 {
					width: 9.5%;
				}
			}
		</style>
	</head>

	<body>
		<div class="container">
			<?php
			$group1 = array("*English", "English Language", "English Literature", "Literature In English", "Hindi", "*Social Studies", "History and Civics", "Geography", "Marathi");
			$group2 = array("Commercial Studies", "Environmental Science", "Mathematics", "Science", "Physics", "Chemistry", "Biology");
			$group3 = array("Physical Education", "Commercial Applications", "Computer Applications", "Art Applications");

			$subject_items = [];
			$group_headers = [];
			// echo "<pre>"; print_r($subjects_with_group_total); echo "</pre>";
			// Step 1: Prepare marks and identify headers
			foreach ($subjects_with_group_total as $key => $row) {
				// Capture group headers (gp_row)
				if (isset($row['gp_row']) && $row['gp_row'] == 1) {
					$group_headers[$row['subject_group_id']] = $row;
				}
			}

			// Step 2: Group all subjects under subject_group_id
			$grouped_subjects_map = []; // [group_id => [subject_rows...]]
			foreach ($subjects_with_group_total as $row) {
				if (!empty($row['subject_group_id']) && $row['subject_group_id'] != 0 && empty($row['gp_row'])) {
					$grouped_subjects_map[$row['subject_group_id']][] = $row;
				} elseif (!isset($row['gp_row'])) {
					// Non-grouped subjects
					$subject_items[] = $row;
				}
			}

			if (!function_exists('customRound')) {
				function customRound($value)
				{
					$decimal = $value - floor($value);
					return $decimal > 0.4 ? ceil($value) : floor($value);
				}
			}

			// Step 3: Insert group headers in correct display order
			foreach ($grouped_subjects_map as $group_id => $subject_list) {
				usort($subject_list, function ($a, $b) {
					return $a['disp_order'] <=> $b['disp_order'];
				});

				// Calculate group header marks (sum of sub-subjects)
				$total_max = 0;
				$total_obtained = 0;
				$subject_count = count($subject_list);
				foreach ($subject_list as $sub) {
					$total_max += $sub['ut_max_marks'];
					$total_obtained += $sub['ut_obtained_marks'];
				}

				if (isset($group_headers[$group_id])) {
					$header = $group_headers[$group_id];
					$header['max_marks'] = customRound($header['max_marks'] / $subject_count);
					$header['marks_obtained'] = customRound($header['marks_obtained'] / $subject_count);
					$header['max_internal_marks'] = customRound($header['max_internal_marks'] / $subject_count);
					$header['internal_marks_secured'] = customRound($header['internal_marks_secured'] / $subject_count);
					$header['subject'] = '*' . $header['subject']; // mark header
					$header['disp_order'] = $subject_list[0]['disp_order'] - 0.1; // ensures it comes right before sub-subjects

					$subject_items[] = $header;
				}

				// Add the sub-subjects
				foreach ($subject_list as $sub) {
					$subject_items[] = $sub;
				}
			}

			// Step 4: Final sorting by disp_order
			usort($subject_items, function ($a, $b) {
				return $a['disp_order'] <=> $b['disp_order'];
			});


			if (!function_exists('displayGroup')) {
				function displayGroup($group, &$remaining_subjects, $group_name, $grading_scale_1, $grading_scale_1_max_upper_limit)
				{

					echo "<tr><td style='font-weight: 700 !important; text-align: left;'>$group_name</td><td></td><td></td><td></td><td></td></tr>"; // Display group title

					$found = false;

					foreach ($group as $group_subject) {
						foreach ($remaining_subjects as $key => $row) {
							// echo "<pre>"; print_r($row); echo "</pre>";
							if (trim($row['subject']) == $group_subject && ($row['eval_type'] != "Graded" || $row['gp_row'] == 1)) {
								$found = true;
								$total = $row['marks_obtained'] + $row['internal_marks_secured'];
								$total_max_marks = $row['max_internal_marks'] + $row['ut_max_marks'] + $row['max_marks'];
								$grade = getGrade3($total, $total_max_marks, $grading_scale_1);
								$style = '';
								if ($group_name == "Group I" && ((isset($row['gp_row']) && $row['gp_row']) || ($row['subject_group_id'] == 0 || $row['subject_group_id'] == null))) {
									$style = 'font-weight: 700 !important; text-align: left; text-transform: capitalize; width: 40% !important;';
								} else {
									$style = 'font-weight: 100 !important; text-align: left; text-transform: capitalize; width: 40% !important;';
								}
								// Display the row (customize as needed)
								echo "<tr>";
								echo "<td style='$style'>{$row['subject']}</td>";
								// condition: no gp_row and key_value != 1
								if (
									(empty($row['gp_row']) || $row['gp_row'] == 0) &&
									(isset($row['key_value']) && $row['key_value'] != 1)
								) {
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

									echo "<td colspan='4' style='text-align:center;'>$att</td>";
								} else {
									// normal marks display
									echo "<td>" . $row['internal_marks_secured'] . "</td>";
									echo "<td>" . $row['marks_obtained'] . "</td>";
									echo "<td>" . $total . "</td>";
									echo "<td>" . $grade['custom_disp_value'] . "</td>";
								}

								echo "</tr>";
								unset($remaining_subjects[$key]); // Prevent reuse
							}
						}
					}
				}
			}

			// Mapping class numbers to Roman numerals
			$roman_classes = ['1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V', '6' => 'VI', '7' => 'VII', '8' => 'VIII', '9' => 'IX', '10' => 'X'];

			$class = $student_info[0]['class_name'];

			$class_roman = isset($roman_classes[$class]) ? $roman_classes[$class] : $class;

			?>

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
						<?php echo $school_info[0]['school_address_line_1'] .  ", Pin " . $school_info[0]['school_pincode'] . ", " . $school_info[0]['school_address_line_2'] ?><br>
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
					ACADEMIC PROGRESS REPORT - <?php echo $exam1[0]['exam_name']; ?> - A.Y. <?php echo $academic_year[0]['academic_name']; ?>
				</div>
			</div>

			<!-- Student Information -->
			<div class="student-info">
				<div style="width: 50%;">Name: <?php echo ucwords(strtolower($student_info[0]['student_full_name'])); ?></div>
				<div style="margin-left: 2px;">Account No. : <?php echo $student_info[0]['student_admission_number']; ?></div>
			</div>

			<!-- Basic Info Table -->
			<table class="info-table">
				<tr>
					<td>Date of Birth</td>
					<td><?php echo date("d-M-Y", strtotime($student_info[0]['date_of_birth'])); ?></td>
					<td>Class - Div</td>
					<td><?php echo $class_roman . ' - ' . $student_info[0]['section_name']; ?></td>
				</tr>
				<tr>
					<td>G.R. No.</td>
					<td><?php echo $student_info[0]['grn']; ?></td>
					<td>House</td>
					<td><?php echo $student_info[0]['house_name']; ?></td>
				</tr>
			</table>

			<div style="width: 100%; display: flex;">
				<!-- Subjects Table -->
				<table class="subjects-table">
					<thead>
						<tr>
							<th style="width: 43%;">Subjects</th>
							<th>IA<br>(<?php echo $subjects_with_group_total[0]['max_internal_marks'] ?>)</th>
							<th>Term 1<br>(<?php echo $subjects_with_group_total[0]['max_marks'] ?>)</th>
							<th>Total<br>(<?php echo $subjects_with_group_total[0]['max_internal_marks'] + $subjects_with_group_total[0]['max_marks'] ?>)</th>
							<th style="text-align: center !important;">Grade</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$non_graded_subjects = [];
						$graded_subjects = [];
						$i = 0;
						$remaining_subjects = $subject_items;

						displayGroup($group1, $remaining_subjects, "Group I", $grading_scale_1, $grading_scale_1_max_upper_limit);
						displayGroup($group2, $remaining_subjects, "Group II", $grading_scale_1, $grading_scale_1_max_upper_limit);
						displayGroup($group3, $remaining_subjects, "Group III", $grading_scale_1, $grading_scale_1_max_upper_limit);
						?>
					</tbody>
				</table>

				<table class="subjects-table" style="width: 60%;">
					<thead>
						<tr>
							<th colspan="2" style="text-align: left;">Subsidiary Subjects</th>
							<th style="text-align: center !important;">Grade<br> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($subject_items as $row) { ?>
							<?php
							if ($row['eval_type'] == 'Graded') { ?>
								<tr>
									<td colspan="2" style="text-align: left; padding-left: 10px;  text-transform: capitalize;">
										<?php echo $row['subject']; ?>
									</td>
									<?php
									if (
										(empty($row['gp_row']) || $row['gp_row'] == 0) &&
										(isset($row['key_value']) && $row['key_value'] != 1)
									) {
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

										echo "<td style='text-align:center;'>$att</td>";
									} else {
									?>
										<td><?php
											$exam_max_marks = $row['max_internal_marks'] + $row['max_marks'];
											$total_combined_marks = $row['internal_marks_secured'] + $row['marks_obtained'];
											$calculated_grade = getGrade3($total_combined_marks, $exam_max_marks, $grading_scale_1);
											echo $calculated_grade['disp_value'];
											?>
										</td>
									<?php } ?>
								</tr>
						<?php
							}
						}

						// Grade Table Header
						echo "<tr>";
						echo "<td colspan='3' style='background-color: #A71C1F; color: white; text-align: center;'>GRADE TABLE</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>Percentage</td>";
						echo "<td>No. of Grade</td>";
						echo "<td>Grade</td>";
						echo "</tr>";

						// Grade Table Rows
						foreach ($grading_scale_1 as $grade_row) {
							echo "<tr>";
							if ($grade_row['lower_limit'] == 0) {
								echo "<td style='text-align: center'> Below " . $grade_row['upper_limit'] . "%</td>";
							} else {
								echo "<td style='text-align: center'>" . $grade_row['lower_limit'] . " - " . $grade_row['upper_limit'] . "%</td>";
							}
							echo "<td>" . $grade_row['custom_disp_value'] . "</td>"; // Percentage
							echo "<td style='text-align: center'>" . $grade_row['disp_value'] . "</td>"; // Grade
							echo "</tr>";
						}
						?>
				</table>
			</div>

			<?php
			$conduct = getRemark($remarks, 'conduct');
			$progress = getRemark($remarks, 'progress');
			$attendance = getRemark($remarks, 'attendance');
			$working_days = getRemark($remarks, 'working_days');
			$additional_remarks = getRemark($remarks, 'additional_remarks');
			$remarks2 = getRemark($remarks, 'remarks');
			$additional_remarks = getRemark($remarks, 'additional_remarks');
			?>
			<!-- Attendance Section -->
			<table class="subjects-table" id="attendace-table">
				<tbody>
					<tr>
						<td class="att-col1">Attendance (Days)</td>
						<td class="att-col2"><?php echo $attendance['disp_value']; ?></td>
						<td class="att-col3">Out of</td>
						<td class="att-col4"><?php echo $working_days['disp_value']; ?></td>
						<td>Conduct</td>
						<td><?php echo $conduct['disp_value']; ?></td>
					</tr>
				</tbody>
			</table>

			<!-- Teacher's Remarks -->
			<!-- <?php echo "<pre>";
					print_r($remarks);
					echo "</pre>"; ?> -->
			<table class="remarks-table">
				<thead>
					<tr>
						<th colspan="2">Class Teacher's Remark</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width: 150px;">Student's Strengths</td>
						<td><?php echo $progress['disp_value'] ?></td>
					</tr>
					<tr>
						<td>Participation</td>
						<td><?php echo $remarks2['disp_value'] ?></td>
					</tr>
					<tr>
						<td>Areas of Improvement</td>
						<td><?php echo $additional_remarks['disp_value'] ?></td>
					</tr>
				</tbody>
			</table>

			<!-- Signatures -->
			<div class="signatures">
				<div class="signature-box">
					<div style="margin-top:20px;  margin-right: 25%;">DATE: <?php echo $report_date; ?></div>
				</div>
				<div class="signature-box">
					<div class="signature-line"> <?php if (!empty($class_teacher[0]['staff_sign'])): ?>
							<img src="<?php echo $signFolder . $class_teacher[0]['staff_sign']; ?>"
								alt="Signature"
								style="height:28px; width:auto;">
						<?php endif; ?>
					</div>
					<div>Class Teacher</div>
					<div>
						(<?php if (!empty($class_teacher)) {
								echo $class_teacher[0]['staff_name'];
							} ?>)
					</div>
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
	</body>

	</html>
<?php } ?>