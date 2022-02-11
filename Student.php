<?php
require './MySql.php';

class Student
{

    public function __construct($argv)
    {
        $this->argv = $argv;
        $this->mysql = new MySql();
    }

    public function get()
    {
        print_r($this->mysql->getStudent());
    }

    public function add()
    {
        if ($this->argv[2]) {
            $name = $this->argv[2];
            $email = $this->argv[3];
            $class = $this->argv[4];
            return $this->mysql->addStudent($name, $email, $class);
        }
        return;
    }

    public function delete()
    {
        $id = $this->argv[2];
        print_r($this->mysql->deleteStudent($id));
    }

    public function operations()
    {
        switch ($this->argv[1]) {
            case 'add':
                $this->add();
                break;
            case 'get':
                $this->get();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                echo "please select correct option";
        }
    }

}

$student = new Student($argv);
$student->operations();
