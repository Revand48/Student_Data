<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Hfour extends Component
{
    public $students;

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function render()
    {
        return view('components.section.hfour');
    }
}
