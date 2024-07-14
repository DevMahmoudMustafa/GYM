@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $titlePage }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>اسم العميل</th>
                    <th>رقم الهاتف</th>
                    <th>قيمة الاشتراك</th>
                    <th>تاريخ البدء</th>
                    <th>تاريخ الانتهاء</th>
                    <th>عدد استخدام المشاية</th>
                    <th>ملاحظات</th>
                    <th>إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone ?? 'لا يوجد' }}</td>
                        @if($user->membership)
                            <td>{{ $user->membership->price }}</td>
                            <td>{{ $user->membership->start_date }}</td>
                            <td>{{ $user->membership->end_date }}</td>
                            <td>{{ $user->membership->walker_count }}</td>
                            <td>{{ $user->membership->note }}</td>
                        @else
                            <td colspan="5" class="text-center">لا توجد عضوية</td>
                        @endif
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
