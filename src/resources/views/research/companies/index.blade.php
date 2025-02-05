@section('head')
    <link rel="stylesheet" href="{{ asset('css/research.css') }}">
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('企業一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @foreach ($companies as $company)
                    <a href="{{ route('research.selectionsIndex', $company->mco_company_id) }}"
                        class="industry-link">{{ $company->mco_company_name }}</a>
                @endforeach
            </div>
            <a href="{{ route('research.index') }}" class="back-button">戻る</a>
        </div>
    </div>
</x-app-layout>
