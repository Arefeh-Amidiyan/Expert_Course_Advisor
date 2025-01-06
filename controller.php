<?php
class Course_selection extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Course_model');
    }

    // نمایش دروس موجود
    public function index() {
        $data['courseha'] = $this->Course_model->get_courseha();
        $this->load->view('course_selection_view', $data);
    }

    // پردازش فرم انتخاب واحد
    public function register() {
        $student_id = $this->input->post('student_id');
        $selected_courseha = $this->input->post('selected_courseha');
        $errors = [];

        // بررسی ظرفیت هر درس
        foreach ($selected_courseha as $course_id) {
            if (!$this->Course_model->check_capacity($course_id)) {
                $errors[] = "درس با شناسه $course_id ظرفیت کافی ندارد.";
            }
        }

        if (empty($errors)) {
            // ثبت نام دروس
            $this->Course_model->register_courseha($student_id, $selected_courseha);
            $this->load->view('success_message');
        } else {
            // نمایش خطاها
            $data['errors'] = $errors;
            $data['courseha'] = $this->Course_model->get_courseha();
            $this->load->view('course_selection_view', $data);
        }
    }
}
?>
