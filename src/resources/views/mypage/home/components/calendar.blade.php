<div class="flex justify-around items-center mb-8">
    @if ($month == 1)
        <a
        href="{{route('home.move', (sprintf('%s-%s', $year -1 , (sprintf('%02d', $month + 11 ))))) }}"
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
        >
            前の月へ
        </a>
    @else
        <a
            href="{{route('home.move', (sprintf('%s-%s', $year, (sprintf('%02d', $month - 1 ))))) }}"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
        >
            前の月へ
        </a>
    @endif

    <p class="text-lg text-center">{{ $year }}年 {{ $month }}月</p>
    @if ($month == 12)
        <a
        href="{{route('home.move', (sprintf('%s-%s', $year + 1, (sprintf('%02d', $month - 11 ))))) }}"
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
        >
            次の月へ
        </a>
    @else
        <a
        href="{{route('home.move', (sprintf('%s-%s', $year, (sprintf('%02d', $month + 1 ))))) }}"
        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:px-32 px-16 py-2.5 text-center"
        >
            次の月へ
        </a>
    @endif
</div>


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
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-first text-4xl md:text-5xl mt-2"></i></p>
                                    @break
                                @case(2)
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-second text-4xl md:text-5xl mt-2"></i></p>
                                    @break
                                @case(3)
                                    <p class="calender-fish-icon"><i class="fa fa-fish fish-color-third text-4xl md:text-5xl mt-2"></i></p>
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
