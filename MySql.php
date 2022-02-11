<?php
define('SERVER', '127.0.0.1');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'clistudent');

class MySql
{
    public function __construct()
    {
        $this->conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    }

    public function getStudent()
    {
        $students = array();
        $sql = "SELECT * FROM student";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        return $students;
    }
    public function deleteStudent($studenId)
    {
        $sql = "DELETE FROM student WHERE id=$studenId";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function addStudent($name, $email, $class)
    {
        $sql = "INSERT INTO student (student_name, student_email, student_class)
        VALUES ('$name', '$email', '$class')";
        $result = $this->conn->query($sql);
        return $result;
    }

}
