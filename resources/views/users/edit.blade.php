@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">تعديل المستخدم: {{ $user->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>

            <h3>بيانات العضوية (اختياري)</h3>

            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $user->membership->price ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">تاريخ البدء</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $user->membership->start_date ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $user->membership->end_date ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="walker_count">عدد استخدام المشاية</label>
                <input type="number" class="form-control" id="walker_count" name="walker_count" value="{{ $user->membership->walker_count ?? '' }}">
            </div>

            <div class="form-group">
                <label for="note">ملاحظات</label>
                <textarea class="form-control" id="note" name="note">{{ $user->membership->note ?? '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        </form>
    </div>
@endsection
