
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="col-md-3">
    <form method="POST" action="{{ route('crawler') }}">
        @csrf
        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Input crawler url') }}</label>

            <div class="col-md-12">
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required  autofocus>    
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Crawler web') }}
                </button>                
            </div>
        </div>
    </form>
</div>
 
 