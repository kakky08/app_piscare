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


<div class="mb-20">
    <div class="grid grid-cols-7">
        @foreach (['日', '月', '火', '水', '木', '金', '土'] as $index => $dayOfWeek)
            @if (($index + 1) % 7 !== 0)
                <p class="col-span-1 text-center border-t border-l border-b">{{ $dayOfWeek }}</p>
            @else
                <p class="col-span-1 text-center border">{{ $dayOfWeek }}</p>
            @endif
        @endforeach
        @foreach ($dates as $index => $date)
            @if ($date->month !== $month)
                @if (($index + 1 ) % 7 !== 0)
                    <div class="bg-gray-200 h-32 border-l border-b border-gray-900">
                    </div>
                @else
                    <div class="bg-gray-200 h-32 border-l border-b border-r border-gray-900">
                    </div>
                @endif
            @elseif(($index + 1 ) % 7 !== 0)
                @if (isset($array[$date->day]))
                    <record-component
                        month="{{ $month }}"
                        day="{{ $date->day }}"
                        @if (isset($array[$date->day]["image"]))
                            url="https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/{{ $array[$date->day]["image"] }}"
                        @else
                            url="{{ asset('images/noimage.jpeg') }}"
                        @endif
                        title="{{ $array[$date->day]["title"] }}"
                        record-create-root="{{ route("record.store")}}"
                        record-destroy-root="{{ route("record.destroy",  ["record" => $array[$date->day]["id"]]) }}"
                        is-data="true"
                    >
                    </record-component>
                @else
                    <record-component
                        month="{{ $month }}"
                        day="{{ $date->day }}"
                        bg-white=true
                        year_month="{{ $record_year_month }}"
                        record-create-root="{{ route("record.store")}}"
                    >
                    </record-component>
                @endif
            @elseif(($index + 1 ) % 7 === 0)
                @if (isset($array[$date->day]))
                    <record-component
                        month="{{ $month }}"
                        day="{{ $date->day }}"
                        url="{{ asset('images/topimage-record.png') }}"
                        is-right-end=true
                        is-data="true"
                    >
                    </record-component>
                @else
                    <div class="flex flex-col bg-white-200 h-32 border-l border-b border-r border-gray-900 cursor-pointer">
                        <p class="text-center">{{ $date->day }}</p>
                    </div>
                @endif
            @endif
        @endforeach
    </div>

</div>


{{-- <table class="table table-bordered">
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
</table> --}}
