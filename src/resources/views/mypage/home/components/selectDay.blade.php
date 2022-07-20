<div class="select">
    <p class="select-message">日付を選択 : </p>
    <div class="select-form">
        <datepicker-component
            name="start_date"
            defaultdate="{{ isset($select)
                                ? \Carbon\Carbon::createMidnightDate($year, $month, $record_day)->format("Y/m/d")
                                : \Carbon\Carbon::now()->format("Y/m/d") }}"
        >
        </datepicker-component>
    </div>
</div>
