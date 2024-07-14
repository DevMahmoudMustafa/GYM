@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">إضافة مستخدم جديد</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف (اختياري)</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>

            <hr>

            <h4>بيانات العضوية </h4>
            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">تاريخ البدء</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>
            <div class="form-group">
                <label for="walker_count">عدد استخدام المشاية (اختياري)</label>
                <input type="number" class="form-control" id="walker_count" name="walker_count" value="{{ old('walker_count', 0) }}">
            </div>
            <div class="form-group">
                <label for="note">ملاحظات (اختياري)</label>
                <textarea class="form-control" id="note" name="note">{{ old('note') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
        </form>
    </div>
@endsection
