<?php
// Server time zone, so "today" matches Mogadishu time.
date_default_timezone_set("Africa/Mogadishu");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Registration Form</h2>
                </div>

                <div class="card-body">

                    <p class="text-muted small">
                        Fields marked with <span class="text-danger">*</span> are required.
                    </p>

                    <!-- action="result.php" sends the data to the results page (chapter 4).
                         enctype="multipart/form-data" is needed for the image upload.
                         WHY "required" and "pattern" on inputs: the browser stops the submit and puts
                         the user on the empty/wrong field, so no JavaScript is needed.
                         result.php checks everything again in PHP as a backup, because browser
                         checks can be bypassed. OTHER OPTION: PHP-only checks (no jump to the field). -->
                    <form method="post" action="result.php" enctype="multipart/form-data">

                        <!-- PERSONAL INFORMATION -->
                        <fieldset class="mb-4">
                            <legend class="text-primary">Personal Information</legend>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                       placeholder="Enter your full name"
                                       pattern="[A-Za-z ]+"
                                       title="Name can only contain letters and spaces"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="pob" class="form-label">
                                    Place of Birth <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="pob" name="pob" required>
                                    <option value="">-- Select place of birth --</option>
                                    <option value="Mogadishu">Mogadishu</option>
                                    <option value="Hargeisa">Hargeisa</option>
                                    <option value="Kismayo">Kismayo</option>
                                    <option value="Baidoa">Baidoa</option>
                                    <option value="Garowe">Garowe</option>
                                    <option value="Bosaso">Bosaso</option>
                                    <option value="Beledweyne">Beledweyne</option>
                                    <option value="Galkayo">Galkayo</option>
                                    <option value="Jowhar">Jowhar</option>
                                    <option value="Merca">Merca</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">
                                    Date of Birth <span class="text-danger">*</span>
                                </label>
                                <!-- max = today's date, so the calendar will not allow a future date -->
                                <input type="date" class="form-control" id="dob" name="dob"
                                       max="<?php echo date("Y-m-d"); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="district" class="form-label">
                                    Address (District) <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="district" name="district" required>
                                    <option value="">-- Select district --</option>
                                    <option value="Abdiaziz">Abdiaziz</option>
                                    <option value="Bondhere">Bondhere</option>
                                    <option value="Daynile">Daynile</option>
                                    <option value="Dharkenley">Dharkenley</option>
                                    <option value="Hamar Jajab">Hamar Jajab</option>
                                    <option value="Hamar Weyne">Hamar Weyne</option>
                                    <option value="Hodan">Hodan</option>
                                    <option value="Hawl Wadag">Hawl Wadag</option>
                                    <option value="Heliwa">Heliwa</option>
                                    <option value="Kahda">Kahda</option>
                                    <option value="Karan">Karan</option>
                                    <option value="Shangani">Shangani</option>
                                    <option value="Shibis">Shibis</option>
                                    <option value="Waberi">Waberi</option>
                                    <option value="Wadajir">Wadajir</option>
                                    <option value="Warta Nabadda">Warta Nabadda</option>
                                    <option value="Yaqshid">Yaqshid</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">
                                    Gender <span class="text-danger">*</span>
                                </label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male"
                                           name="gender" value="Male" required>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="female"
                                           name="gender" value="Female">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">
                                    Telephone <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control" id="telephone" name="telephone"
                                       placeholder="e.g. 0612345678 or +252612345678"
                                       pattern="\+?[0-9]{7,15}"
                                       title="Digits only (7 to 15), optional + at the start. No spaces or letters."
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">
                                    Profile Image <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="image" name="image"
                                       accept=".png,.jpg,.jpeg,.webp" required>
                                <div class="form-text">PNG, JPG, JPEG or WEBP only (max 2 MB).</div>
                            </div>
                        </fieldset>

                        <!-- PARENT INFORMATION -->
                        <fieldset class="mb-4">
                            <legend class="text-primary">Parent Information</legend>

                            <div class="mb-3">
                                <label for="parent_name" class="form-label">
                                    Parent Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name"
                                       placeholder="Enter parent's full name"
                                       pattern="[A-Za-z ]+"
                                       title="Name can only contain letters and spaces"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="parent_phone" class="form-label">
                                    Parent Telephone <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control" id="parent_phone" name="parent_phone"
                                       placeholder="e.g. 0612345678 or +252612345678"
                                       pattern="\+?[0-9]{7,15}"
                                       title="Digits only (7 to 15), optional + at the start. No spaces or letters."
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="relationship" class="form-label">
                                    Relationship <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="relationship" name="relationship" required>
                                    <option value="">-- Select relationship --</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </fieldset>

                        <!-- ACADEMIC INFORMATION -->
                        <fieldset class="mb-4">
                            <legend class="text-primary">Academic Information</legend>

                            <div class="mb-3">
                                <label for="student_id" class="form-label">
                                    Student ID <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="student_id" name="student_id"
                                       placeholder="Enter student ID" required>
                            </div>

                            <div class="mb-3">
                                <label for="faculty" class="form-label">
                                    Faculty <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="faculty" name="faculty" required>
                                    <option value="">-- Select faculty --</option>
                                    <option value="Computer and IT">Computer and IT</option>
                                    <option value="Medicine and Health Science">Medicine and Health Science</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">
                                    Department <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="department" name="department"
                                       placeholder="Enter department" required>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">
                                    Class <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="class" name="class"
                                       placeholder="e.g. CA232" maxlength="10" required>
                            </div>

                            <div class="mb-3">
                                <label for="reg_date" class="form-label">
                                    Registration Date <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="reg_date" name="reg_date"
                                       max="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                        </fieldset>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-center text-muted">
                    Student Registration System
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
