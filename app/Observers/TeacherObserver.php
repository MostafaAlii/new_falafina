<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Teacher;

class TeacherObserver
{
    public function created(Teacher $teacher): void
    {
        $teacher->profile()->create([]);
    }
}
