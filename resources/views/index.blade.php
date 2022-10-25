@extends('layouts.app')
@section('content')
    <div class="py-5 text-center">
        <a href="{{route('index')}}"><h2>Short URL</h2></a>
        <p class="lead">Paste the URL to be shortened</p>
    </div>
    <div class="row g-5">
        <div class="col-lg-12">
            <form method="POST" action="{{route('store.url')}}">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="url" class="form-label">URL <span class="text-muted">(Full URL)</span></label>
                        <input name="url" type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ''}}"
                               id="url" placeholder="https://site.com.ua"
                               required>
                        <div class="invalid-feedback">
                            {{ $errors->has('url') ? $errors->get('url')[0] : ''}}
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="transition_limit" class="form-label">Transition Limit
                            <span class="text-muted">(0 = unlimited transition limit)</span>
                        </label>
                        <input name="transition_limit" type="number"
                               class="form-control {{ $errors->has('transition_limit') ? 'is-invalid' : ''}}"
                               id="transition_limit"
                               placeholder="9999" min="0"
                               max="2000000000" required>
                        <div class="invalid-feedback">
                            {{ $errors->has('transition_limit') ? $errors->get('transition_limit')[0] : ''}}
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="lifetime" class="form-label">URL Lifetime In Hours</label>
                        <select name="lifetime" class="form-select {{ $errors->has('lifetime') ? 'is-invalid' : ''}}"
                                id="url_lifetime" required>
                            <option value="">Select Lifetime</option>
                            @for ($i = 1; $i <= 24; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->has('lifetime') ? $errors->get('lifetime')[0] : ''}}
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Get Short URL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
