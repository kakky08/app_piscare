<table class="table table-bordered">
    <thead>
        <tr>
            @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                <th class="calender-table-header">{{ $dayOfWeek }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($dates as $date)
            @if ($date->dayOfWeek == 0)
                <tr class="calender-table-row">
            @endif
            @if ($date->month !== $month)
                <td class="calender-table-data">
                </td>
            @else
                <td class="calender-table-data">
                        <p class="p-test">{{ $date->day }}</p>
                        @if (isset($array[sprintf('%02d', $date->day)]))
                            @switch($array[sprintf('%02d', $date->day)])
                                @case(1)
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-first fa-3x"></i></p>
                                    @break
                                @case(2)
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-second fa-3x"></i></p>
                                    @break
                                @case(3)
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-third fa-3x"></i></p>
                                    @break
                                @default

                            @endswitch
                        @endif
                </td>
            @endif
            @if ($date->dayOfWeek == 6)
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
