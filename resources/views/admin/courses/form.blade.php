<div class="mb-3">
    <label>Название</label>
    <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" class="form-control" required>
    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Описание</label>
    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $course->description ?? '') }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Программа курса (текст или документ)</label>
    <textarea name="program" class="form-control" rows="4">{{ old('program', $course->program ?? '') }}</textarea>
    @error('program')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Прикрепить файл (PDF, DOCX)</label>
    <input type="file" name="program_file" class="form-control">
    @if(!empty($course->program_file))
        <small>Текущий файл: <a href="{{ asset('storage/' . $course->program_file) }}" target="_blank">Посмотреть</a></small>
    @endif
    @error('program_file')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Категория</label>
    <select name="course_category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('course_category_id', $course->course_category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('course_category_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="mb-3">
    <label>Тренер</label>
    <select name="trainer_id" class="form-control">
        <option value="">—</option>
        @foreach($trainers as $trainer)
            <option value="{{ $trainer->id }}"
                {{ old('trainer_id', $course->trainer_id ?? '') == $trainer->id ? 'selected' : '' }}>
                {{ $trainer->name }}
            </option>
        @endforeach
    </select>
    @error('trainer_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Дата начала</label>
    <input type="date" name="start_date" value="{{ old('start_date', $course->start_date ?? '') }}" class="form-control" required>
    @error('start_date')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Дата окончания</label>
    <input type="date" name="end_date" value="{{ old('end_date', $course->end_date ?? '') }}" class="form-control" required>
    @error('end_date')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
