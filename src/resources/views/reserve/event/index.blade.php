@section('head')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('イベント予約') }}
        </h2>
    </x-slot>

    <div class="py-12 calendar-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <p>チケット：{{ $count->tud_event_attendance_remaining }}</p>
            <a href="{{ route('reserve.ticketEdit') }}" class="event-link">チケットを増やす</a>

            <div class="calendar-navigation">
                <a href="{{ route('reserve.eventIndex', ['year' => $previousMonth->year, 'month' => $previousMonth->month]) }}"
                    class="event-link">前月</a>
                <span>{{ $month }}月</span>
                <a href="{{ route('reserve.eventIndex', ['year' => $nextMonth->year, 'month' => $nextMonth->month]) }}"
                    class="event-link">次月</a>
            </div>

            <table class="calendar-table">
                <thead>
                    <tr>
                        <th class="calendar-day">日</th>
                        <th class="calendar-day">月</th>
                        <th class="calendar-day">火</th>
                        <th class="calendar-day">水</th>
                        <th class="calendar-day">木</th>
                        <th class="calendar-day">金</th>
                        <th class="calendar-day">土</th>
                    </tr>
                </thead>
                <tbody>
                    @php $dayCounter = 1; @endphp
                    @while ($dayCounter <= $daysInMonth)
                        <tr>
                            @for ($j = 0; $j < 7; $j++)
                                @if ($dayCounter == 1 && $j < $firstDayOfWeek)
                                    <td class="calendar-day"></td>
                                    @continue
                                @endif
                                <td class="calendar-day">
                                    @if ($dayCounter <= $daysInMonth)
                                        {{ $dayCounter }}
                                        <div class="events">
                                            @foreach ($groupedEvents["$year-$month-$dayCounter"] ?? [] as $event)
                                                <a href="{{ route('reserve.eventShow', $event->mev_event_id) }}"
                                                    class="event-show-link">{{ $event->mev_event_name }}</a>
                                            @endforeach
                                        </div>
                                        @php $dayCounter++ @endphp
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endwhile
                </tbody>
            </table>
            <a href="{{ route('reserve.index') }}" class="event-link">戻る</a>
        </div>
    </div>
</x-app-layout>
