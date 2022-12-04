<?php
  //Meetings
  $sql = "SELECT * FROM tblappointment WHERE appointment_arrangement='Online';";
  $result = mysqli_query($conn, $sql);
  $Online = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_arrangement='Face-to-face';";
  $result = mysqli_query($conn, $sql);
  $FaceToFace = mysqli_num_rows($result);

  //Types of Counselling
  $sql = "SELECT * FROM tblappointment WHERE appointment_counselling='Individual';";
  $result = mysqli_query($conn, $sql);
  $Individual = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_counselling='Group';";
  $result = mysqli_query($conn, $sql);
  $Group = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_counselling='Follow-up';";
  $result = mysqli_query($conn, $sql);
  $FollowUp = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_counselling='Consultaion';";
  $result = mysqli_query($conn, $sql);
  $Consultaion = mysqli_num_rows($result);

  //Cases
  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Family';";
  $result = mysqli_query($conn, $sql);
  $Family = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Girl-Boy Relationship';";
  $result = mysqli_query($conn, $sql);
  $GirlBoyRelationship = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Personal';";
  $result = mysqli_query($conn, $sql);
  $Personal = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Academic';";
  $result = mysqli_query($conn, $sql);
  $Academic = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Interpersonal';";
  $result = mysqli_query($conn, $sql);
  $Interpersonal = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Gender Sensitivity Issue';";
  $result = mysqli_query($conn, $sql);
  $GenderSensitivityIssue = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Cultural Differences';";
  $result = mysqli_query($conn, $sql);
  $CulturalDifferences = mysqli_num_rows($result);

  $sql = "SELECT * FROM tblappointment WHERE appointment_case='Career concern';";
  $result = mysqli_query($conn, $sql);
  $CareerConcern = mysqli_num_rows($result);
?>