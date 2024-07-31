<?php 
include_once("../../config/app.php");
include_once("../controllers/StudentController.php");


if(isset($_POST['deleteStudent'])){
    $student_id = validateInput($db_conn,$_POST['deleteStudent']);
    $student = new StudentController();
    $result = $student->delete($student_id);
    if($result){
        redirect("Student Deleted Successfuly","backend/view_student.php");

    }else{
        redirect("Something Went Wrong Please try again","backend/view_student.php");

    }
}


if(isset($_POST["update_student"])){
    $id = validateInput($db_conn,$_POST['student_id']);
    $inputData = [
        'fullname' => validateInput($db_conn,$_POST['fullname']),
        'email' => validateInput($db_conn,$_POST['email']),
        'course' => validateInput($db_conn,$_POST['course']),
        'phone_no' => validateInput($db_conn,$_POST['phone_no']),
        
    ];
    $student = new StudentController();
    $result = $student->update($inputData, $id);
    if($result){
        redirect("Student Updated Successfuly","backend/view_student.php");
    }else{
        redirect("Somethinig went wrong please try again","backend/view_student.php");
     
    }

}







if(isset($_POST['student_btn'])){

    $inputData = [
        'fullname' => validateInput($db_conn,$_POST['fullname']),
        'email' => validateInput($db_conn,$_POST['email']),
        'course' => validateInput($db_conn,$_POST['course']),
        'phone_no' => validateInput($db_conn,$_POST['phone_no']),
        
    ];

    $student = new StudentController();
    $result = $student->create($inputData);
    //echo $result;
    if($result){
        redirect("Student registered Successfuly","backend/add_student.php");
    }else{
        redirect("Something went wrong try again","backend/add_student.php");


    }
    


}