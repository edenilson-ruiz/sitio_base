@if (session()->has('success'))
{{-- <div wire:poll.4s class="alert alert-success alert-block"> --}}
    {{-- <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('success') }}</strong>
    </div> --}}
    <div wire:poll.4s class="alert alert-success alert-block" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div wire:poll.4s class="alert alert-danger alert-block" role="alert">
        {{ session('error') }}
    </div>
    @endif

    @if (session()->has('warning'))
    <div wire:poll.4s class="alert alert-warning alert-block" role="alert">
        {{ session('warning') }}
    </div>
    @endif

    @if (session()->has('info'))
    <div wire:poll.4s class="alert alert-info alert-block" role="alert">
        {{ session('info') }}
    </div>
    @endif

    @if ($errors->any())
    <div wire:poll.4s class="alert alert-danger alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
    @endif
