<?php

// WHY: header() sends the browser to another page, so opening result.php directly
// (without submitting the form) goes back to the form instead of showing errors.
// OTHER OPTION: remove these 4 lines (the page would show "undefined index" warnings).
if (!isset($_POST["submit"])) {
    header("Location: form.php");
    exit;
}

// Server time zone, so "today" matches Mogadishu time.
date_default_timezone_set("Africa/Mogadishu");

$errors = array();
$imagePath = "";

// 1) Check every field has an entry (field name => label)
$required = array(
    "fullname"     => "Full Name",
    "pob"          => "Place of Birth",
    "dob"          => "Date of Birth",
    "district"     => "Address (District)",
    "gender"       => "Gender",
    "telephone"    => "Telephone",
    "email"        => "Email",
    "parent_name"  => "Parent Name",
    "parent_phone" => "Parent Telephone",
    "relationship" => "Relationship",
    "student_id"   => "Student ID",
    "faculty"      => "Faculty",
    "department"   => "Department",
    "class"        => "Class",
    "reg_date"     => "Registration Date",
);

foreach ($required as $field => $label) {
    if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
        $errors[] = "Please enter your " . $label . ".";
    }
}

// 2) Name: letters and spaces only
// WHY: preg_match() checks text against a pattern. /^[A-Za-z ]+$/ means the WHOLE
// text is only letters or spaces. It is one line, instead of a loop over every character.
// OTHER OPTION: a for loop + strlen() + in_array() comparing each character to a-z.
if (!empty($_POST["fullname"])) {
    if (!preg_match("/^[A-Za-z ]+$/", $_POST["fullname"])) {
        $errors[] = "Full Name can only contain letters and spaces.";
    }
}

if (!empty($_POST["parent_name"])) {
    if (!preg_match("/^[A-Za-z ]+$/", $_POST["parent_name"])) {
        $errors[] = "Parent Name can only contain letters and spaces.";
    }
}

// Phone numbers: digits only, optional + at the start, 7 to 15 characters
// WHY: same preg_match() idea as the name check. [0-9]{7,15} means 7 to 15 digits.
// OTHER OPTION: is_numeric() (but it also accepts things like "1e5" and "-5").
if (!empty($_POST["telephone"])) {
    if (!preg_match("/^\+?[0-9]{7,15}$/", $_POST["telephone"])) {
        $errors[] = "Telephone must contain digits only (7 to 15), with no letters or spaces.";
    }
}

if (!empty($_POST["parent_phone"])) {
    if (!preg_match("/^\+?[0-9]{7,15}$/", $_POST["parent_phone"])) {
        $errors[] = "Parent Telephone must contain digits only (7 to 15), with no letters or spaces.";
    }
}

// 3) Email: valid format
// WHY: filter_var() with FILTER_VALIDATE_EMAIL is PHP's built-in email check,
// more accurate than checking "@" and "." by hand.
// OTHER OPTION: explode("@") and explode(".") then count() the pieces.
if (!empty($_POST["email"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid Email address.";
    }
}

// 3b) Dates: not in the future
// WHY: date("Y-m-d") gives today's date like 2026-10-20. Dates in that format can be
// compared with > directly, so a bigger date means a later (future) date.
// OTHER OPTION: strtotime() on both dates and compare the numbers.
$today = date("Y-m-d");

if (!empty($_POST["dob"]) && $_POST["dob"] > $today) {
    $errors[] = "Date of Birth cannot be in the future.";
}

if (!empty($_POST["reg_date"]) && $_POST["reg_date"] > $today) {
    $errors[] = "Registration Date cannot be in the future.";
}

// 4) Image: uploaded, allowed type, not too big
if (empty($_FILES["image"]["name"])) {
    $errors[] = "Please upload a Profile Image.";
} else {
    $filename = explode(".", $_FILES["image"]["name"]);
    $extension = strtolower(end($filename));
    $allowed = array("png", "jpg", "jpeg", "webp");

    if (!in_array($extension, $allowed)) {
        $errors[] = "Image type (" . $extension . ") is not allowed. Use png, jpg, jpeg or webp.";
    }

    if ($_FILES["image"]["size"] > 2097152) {
        $errors[] = "Image is too big. Maximum size is 2 MB.";
    }
}

// 5) If no errors, save the image as FullName.extension
if (count($errors) == 0) {
    // Saved in the same folder as this file (C:\xampp\htdocs\Assignment\php_assignment_3).
    // OTHER OPTION: put "uploads/" in front of the name to use a separate folder (it must exist first).
    $imagePath = trim($_POST["fullname"]) . "." . $extension;

    if (file_exists($imagePath)) {
        $errors[] = "An image named " . $imagePath . " already exists.";
    } elseif (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
        $errors[] = "The image could not be saved. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

<?php if (count($errors) > 0) { ?>

            <div class="card shadow">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h2 class="mb-0">Please Fix The Following</h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php
                            // WHY: htmlspecialchars() turns characters like < and > into safe text,
                            // so a user cannot inject HTML/JavaScript into the page. Used on every echo below.
                            // OTHER OPTION: plain echo (works, but is unsafe).
                            foreach ($errors as $error) { ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- WHY: history.back() returns to the form with what the user already typed.
                         OTHER OPTION: <a href="form.php"> (works, but the form is cleared). -->
                    <a href="javascript:history.back()" class="btn btn-primary">&larr; Go Back</a>
                </div>
            </div>

<?php } else { ?>

            <div class="card shadow">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Student Information</h2>
                </div>

                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="<?php echo htmlspecialchars($imagePath); ?>"
                             alt="Profile image" width="120" height="120"
                             class="rounded-circle border shadow-sm"
                             style="object-fit: cover;">
                    </div>

                    <table class="table table-bordered table-striped">
                        <tr class="table-primary">
                            <th colspan="2" class="text-center">Personal Information</th>
                        </tr>
                        <tr><th style="width: 40%;">Full Name</th><td><?php echo htmlspecialchars($_POST["fullname"]); ?></td></tr>
                        <tr><th>Place of Birth</th><td><?php echo htmlspecialchars($_POST["pob"]); ?></td></tr>
                        <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($_POST["dob"]); ?></td></tr>
                        <tr><th>Address (District)</th><td><?php echo htmlspecialchars($_POST["district"]); ?></td></tr>
                        <tr><th>Gender</th><td><?php echo htmlspecialchars($_POST["gender"]); ?></td></tr>
                        <tr><th>Telephone</th><td><?php echo htmlspecialchars($_POST["telephone"]); ?></td></tr>
                        <tr><th>Email</th><td><?php echo htmlspecialchars($_POST["email"]); ?></td></tr>
                        <tr><th>Image File</th><td><?php echo htmlspecialchars($imagePath); ?></td></tr>

                        <tr class="table-primary">
                            <th colspan="2" class="text-center">Parent Information</th>
                        </tr>
                        <tr><th>Parent Name</th><td><?php echo htmlspecialchars($_POST["parent_name"]); ?></td></tr>
                        <tr><th>Parent Telephone</th><td><?php echo htmlspecialchars($_POST["parent_phone"]); ?></td></tr>
                        <tr><th>Relationship</th><td><?php echo htmlspecialchars($_POST["relationship"]); ?></td></tr>

                        <tr class="table-primary">
                            <th colspan="2" class="text-center">Academic Information</th>
                        </tr>
                        <tr><th>Student ID</th><td><?php echo htmlspecialchars($_POST["student_id"]); ?></td></tr>
                        <tr><th>Faculty</th><td><?php echo htmlspecialchars($_POST["faculty"]); ?></td></tr>
                        <tr><th>Department</th><td><?php echo htmlspecialchars($_POST["department"]); ?></td></tr>
                        <tr><th>Class</th><td><?php echo htmlspecialchars($_POST["class"]); ?></td></tr>
                        <tr><th>Registration Date</th><td><?php echo htmlspecialchars($_POST["reg_date"]); ?></td></tr>
                    </table>

                    <a href="form.php" class="btn btn-primary">Register Another Student</a>
                </div>

                <div class="card-footer text-center text-muted">
                    Student Registration System
                </div>
            </div>

<?php } ?>

        </div>
    </div>
</div>

</body>
</html>
