<label>
    How many students do you have?
    <input type="number" name="student_count" min="1" max="6">
</label>

<div id="studentForm">
    @forelse((array) old('students') as $data)
        @include('students.form', [
            'index' => $loop->index,
        ])
    @empty
        @include('students.form', [
            'index' => 0
        ])
    @endforelse
</div>
