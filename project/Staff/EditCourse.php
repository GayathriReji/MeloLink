<?php
include('Head.php');
include("../Assets/Connections/Connection.php");

// Check if the course ID is provided in the URL
if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];

    // Fetch course details based on the provided course ID
    $selQry = "SELECT * FROM tbl_course WHERE course_id = '$courseId'";
    $result = $con->query($selQry);

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
    } else {
        // Redirect or display an error if the course is not found
        header("Location: CourseNotFound.php");
        exit();
    }
} else {
    // Redirect or display an error if the course ID is not provided
    header("Location: CourseNotFound.php");
    exit();
}

// Handle form submission for course editing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the form data

    // For example, update the course details in the database
    $newCourseName = $_POST['course_name'];
    $newCourseRate = $_POST['course_rate'];
    $newCourseDuration = $_POST['course_duration'];

    // Handle course photo upload
    $uploadDir = "../Assets/Files/CoursePhoto/";
    $newPhotoName = $_FILES['course_photo']['name'];
    $newPhotoPath = $uploadDir . $newPhotoName;

    // Perform the update query, you may need to customize this based on your database structure
    $updateQry = "UPDATE tbl_course SET 
                  course_name = '$newCourseName', 
                  course_rate = '$newCourseRate', 
                  course_duration = '$newCourseDuration', 
                  course_photo = '$newPhotoName'
                  WHERE course_id = '$courseId'";

    if ($con->query($updateQry) === TRUE) {
        // Upload the new course photo
        move_uploaded_file($_FILES['course_photo']['tmp_name'], $newPhotoPath);

        // Redirect to the course listing page after successful update
        header("Location: CourseListing.php");
        exit();
    } else {
        // Handle the error, you may want to display an error message or log the error
        echo "Error updating course: " . $con->error;
    }
}

// ... (previous code for HTML head, Bootstrap links, etc.) ...

?>

<!-- HTML form for editing the course details -->
<div class="container mt-5">
    <h2>Edit Course</h2>
    <form method="post" enctype="multipart/form-data">
       
        <!-- Display current course photo with reduced size -->
<div class="form-group">
    <label for="current_photo">Current Course Photo:</label>
    <img src="../Assets/Files/CoursePhoto/<?php echo $course['course_photo']; ?>" alt="Current Course Photo" class="img-thumbnail" style="width: 150px;">
</div>


        <!-- Add form fields for editing course details -->
        <div class="form-group">
            <label for="course_name">Course Name:</label><br>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $course['course_name']; ?>">
        </div>
        <div class="form-group">
            <label for="course_rate">Course Rate:</label>
            <input type="text" class="form-control" id="course_rate" name="course_rate" value="<?php echo $course['course_rate']; ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration (Months):</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php echo $course['course_duration']; ?>">
        </div>
        <div class="form-group">
            <label for="course_photo">Upload New Course Photo:</label>
            <input type="file" class="form-control-file" id="course_photo" name="course_photo">
        </div>
        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>

<!-- ... (remaining code for Bootstrap scripts, footer, etc.) ... -->

<?php
include('Foot.php');
?>
