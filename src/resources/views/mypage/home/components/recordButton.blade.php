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
                {{-- value="{{ $record->is_breakfast }}" --}}
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                <i class="fa fa-fish fa-5x {{ $record->is_breakfast ? 'fish-color-first' : 'fish-color' }}"></i>
            </button>
            <button
                type="submit"
                class="btn m-0 p-1 shadow-none col-2"
                name="lunch"
                {{-- value="{{ $record->is_lunch }}" --}}
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                <i class="fa fa-fish fa-5x {{ $record->is_lunch ? 'fish-color-first' : 'fish-color' }}"></i>
            </button>
            <button
                type="submit"
                class="btn m-0 p-1 shadow-none col-2"
                name="dinner"
                {{-- value="{{ $record->is_dinner }}" --}}
                form="form-record"
                formaction="{{ route('home.record')}}"
                formmethod="POST"
            >
                <i class="fa fa-fish fa-5x {{ $record->is_dinner ? 'fish-color-first' : 'fish-color' }}"></i>
            </button>
        </div>
    </form>
</div>
