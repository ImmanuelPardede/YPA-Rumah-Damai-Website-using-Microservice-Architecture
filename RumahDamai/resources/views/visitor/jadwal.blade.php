@extends('layouts.visitors.master')

<style>
    .table-fixed {
        table-layout: fixed;
        width: 100%;
    }

    .table-fixed th {
        width: 70%;
        /* Ubah lebar kolom Time menjadi 200px */
        height: 50px;
        background-color: #3f5a77;
        color: white;
        text-align: center;
    }

    .table-fixed td {
        width: 150px;
        height: 150px;
        background-color: #fff;
        text-align: center;
        vertical-align: middle;
    }

    .table-fixed td.special {
        background-color: lightblue;
        padding: 5px;
    }

    .table-fixed td.special div {
        margin-bottom: 5px;
    }

    .table-fixed th,
    .table-fixed td {
        color: #333;
    }

    .bg-primary {
        background-color: #5394da !important;
        color: #fff;
    }
</style>

@section('content')
    <section class="news-detail-header-section text-center">
        <!-- Header section code -->
    </section>

    <section class="section-padding">
        <div class="content">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($calendarData as $lokasiPenugasanId => $calendar)
                            <div class="table-responsive mb-4">
                                <p>Jadwal Pembelajaran di {{ $lokasiPenugasanId }}</p>
                                <table class="table table-bordered table-fixed">
                                    <thead class="text-white">
                                        <tr>
                                            <th width="200">Time</th>
                                            @foreach ($weekDays as $day)
                                                <th>{{ $day }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($calendar as $time => $days)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse(explode(' - ', $time)[0])->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse(explode(' - ', $time)[1])->format('H:i') }}</td>
                                                @foreach ($weekDays as $day)
                                                    @if (isset($days[$day]))
                                                        <td class="align-middle text-center special"
                                                            style="background-color: {{ $days[$day]['color'] ?? '#ffffff' }}">
                                                            @if ($days[$day]['time_start'] != '-')
                                                                <div>
                                                                    {{ $days[$day]['guru'] }}<br>
                                                                    {{ $days[$day]['kelas'] }}<br>
                                                                </div>
                                                            @else
                                                                ....
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td class="special">....</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
