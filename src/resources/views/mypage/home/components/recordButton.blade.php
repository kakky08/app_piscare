<div>
    <form class="row" id="form-record">
        @csrf
        <input type="hidden" value="{{ $record_year_month }}" name="year_month">
        <input type="hidden" value="{{ $record_day }}" name="day">
        <div class="row justify-content-center spacing-reset record-button-group">
            <button
                type="submit"
                class="btn m-0 p-1 shadow-none col-2"
                name="breakfast"
                value="{{ isset($record->is_breakfast) ? $record->is_breakfast : 0 }}"
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                @if (isset($record))
                    <i class="fa fa-fish fa-5x {{ $record->is_breakfast ? 'fish-color-first' : 'fish-color' }}"></i>
                @else
                    <i class="fa fa-fish fa-5x fish-color"></i>
                @endif
            </button>
            <button
                type="submit"
                class="btn m-0 p-1 shadow-none col-2"
                name="lunch"
                value="{{ isset($record->is_lunch) ? $record->is_lunch : 0 }}"
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                @if (isset($record))
                    <i class="fa fa-fish fa-5x {{ $record->is_lunch ? 'fish-color-first' : 'fish-color' }}"></i>
                @else
                    <i class="fa fa-fish fa-5x fish-color"></i>
                @endif
            </button>
            <button
                type="submit"
                class="btn m-0 p-1 shadow-none col-2"
                name="dinner"
                value="{{ isset($record->is_dinner) ? $record->is_dinner : 0 }}"
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                @if (isset($record))
                    <i class="fa fa-fish fa-5x {{ $record->is_dinner ? 'fish-color-first' : 'fish-color' }}"></i>
                @else
                    <i class="fa fa-fish fa-5x fish-color"></i>
                @endif
            </button>
        </div>
    </form>
</div>
