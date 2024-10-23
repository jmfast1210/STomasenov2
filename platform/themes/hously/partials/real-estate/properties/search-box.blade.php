<form action="{{ $actionUrl ?? RealEstateHelper::getPropertiesListPageUrl() }}" class="search-filter" data-ajax-url="{{ $ajaxUrl ?? route('public.properties') }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <div class="space-y-5 registration-form text-dark text-start">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:gap-0">
            {!! Theme::partial('filters.keyword', compact('type')) !!}

            {!! Theme::partial('filters.location', compact('type')) !!}

            {!! Theme::partial('filters.category', compact('id', 'type', 'categories')) !!}
        </div>


        </div>

        <div class="grid items-center grid-cols-3 gap-2 md:flex">
            <button type="submit" class="col-span-2 btn bg-primary hover:bg-secondary border-primary hover:border-secondary text-white submit-btn w-full md:w-1/4 !h-12 rounded transition-all ease-in-out duration-200">
                <i class="mdi mdi-magnify me-2"></i>
                {{ __('Search') }}
            </button>

            <button type="button" class="col-span-1 md:mt-0 block md:inline-block w-full md:w-fit px-4 bg-slate-500 rounded text-white py-[0.70rem] hover:bg-slate-600 reset-filter">
                <i class="me-1 mdi mdi-refresh"></i>
                {{ __('Reset') }}
            </button>
        </div>
    </div>
</form>
