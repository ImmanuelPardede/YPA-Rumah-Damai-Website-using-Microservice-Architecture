@extends('layouts.management.master')

@section('content')
    <style>
        .table-fixed {
            table-layout: fixed;
        }

        .table-fixed th {
            text-align: center;
            width: 50px;
            height: 50px;
        }

        .table-fixed td {
            width: 125px;
            height: 125px;
            text-align: center;
        }

        .table-fixed td.special {
            background-color: lightblue;
        }

        .table-fixed td.special {
            background-color: lightblue;
            white-space: normal;
            overflow: visible;
        }
    </style>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kalender</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-fixed">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th width="125">Time</th>
                                        @foreach ($weekDays as $day)
                                            <th>{{ $day }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calendarData as $time => $days)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
