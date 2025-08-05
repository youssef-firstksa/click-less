<div class="d-flex gap-2">
    <span class="text-md fw-medium text-secondary-light mb-0">{{__('dashboard.general.show')}}</span>

    <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page"
        onchange="this.form.submit()">
        <option value="10" @selected(request()->get('per_page') == 10)>10</option>
        <option value="25" @selected(request()->get('per_page') == 25)>25</option>
        <option value="50" @selected(request()->get('per_page') == 50)>50 </option>
        <option value="100" @selected(request()->get('per_page') == 100)>100</option>
    </select>
</div>