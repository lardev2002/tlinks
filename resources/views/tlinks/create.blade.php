@extends('layouts.app')
@section('content')
    <div class="container mb-4 mt-4">
        <h2>@lang('front.tlink_slogan')</h2>
        @if(session()->has('generatedTLink'))
            <div class="alert alert-success">
                <p>@lang('front.tlink_link_generated')</p>
                <p>{{ session()->get('generatedTLink') }}</p>
                <a target="_blank" href="{{ session()->get('generatedTLink') }}">@lang('front.btn_click_to')</a>
            </div>
        @endif
        @if (session()->has('messageError'))
            <div class="alert alert-danger">{{ session()->get('messageError') }}</div>
        @endif
        <form method="post" action="{{ route('tlinks.store') }}">
            @csrf
            <div class="mb-3">
                <label for="tlink" class="form-label">@lang('front.tlink_field_link')</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="tlink"
                       aria-describedby="tlink_help" name="link" value="{{ old('link') }}" placeholder="@lang('front.tlink_field_link_placeholder')">
                <div id="tlink_help" class="form-text">@lang('front.tlink_field_link_help')</div>
                @error('link')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="transition_limit" class="form-label">@lang('front.tlink_field_limit')</label>
                <input type="number" class="form-control @error('transition_limit') is-invalid @enderror"
                       id="transition_limit" aria-describedby="transition_limit_help" name="transition_limit"
                       value="{{ old('transition_limit') }}" placeholder="@lang('front.tlink_field_limit_placeholder')">
                <div id="transition_limit_help" class="form-text">@lang('front.tlink_field_limit_help')</div>
                @error('transition_limit')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tlink_lifetime" class="form-label">@lang('front.tlink_field_lifetime')</label>
                <input type="number" class="form-control @error('lifetime') is-invalid @enderror" id="tlink_lifetime"
                       aria-describedby="lifetime_help" name="lifetime" value="{{ old('lifetime') }}" placeholder="@lang('front.tlink_field_lifetime_placeholder')">
                <div id="lifetime_help" class="form-text">@lang('front.tlink_field_lifetime_help')</div>
                @error('lifetime')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@lang('front.btn_create_link')</button>
        </form>
    </div>
@endsection
