@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">عدد المستخدمين</h5>
                                    <h3 class="card-text">{{ $userCount }}</h3>
                                </div>
                                <div>
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <a href="{{ route('users.active-membership') }}" class="text-decoration-none">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">العضويات النشطة</h5>
                                    <h3 class="card-text">{{ $activeMembershipsCount }}</h3>
                                </div>
                                <div>
                                    <i class="fas fa-check-circle fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <a href="{{ route('users.expiring-soon-membership') }}" class="text-decoration-none">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">العضويات القريبة من الانتهاء</h5>
                                    <h3 class="card-text">{{ $expiringSoonMembershipsCount }}</h3>
                                </div>
                                <div>
                                    <i class="fas fa-hourglass-half fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <a href="{{ route('users.expired-membership') }}" class="text-decoration-none">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">العضويات المنتهية</h5>
                                    <h3 class="card-text">{{ $expiredMembershipsCount }}</h3>
                                </div>
                                <div>
                                    <i class="fas fa-times-circle fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
