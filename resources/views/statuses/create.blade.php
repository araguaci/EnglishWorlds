<div class="ui centered segment">
  <form id="post-status-form" class="ui form {{ $errors->any() ? 'error' : ''}}" action="{{ route('statuses') }}" method="post">
    @csrf
    <div class="inline field {{ $errors->has('body') ? 'error' : ''}}">
      <label for="status">Write status</label>
      <div class="ui action input {{ $errors->has('body') ? 'error' : ''}}">
        <input type="text" name="body" value="{{ old('body') }}" onsubmit="this.form.submit()" id="status">
        <div class="inline field {{ $errors->has('tags') ? 'error' : ''}}">
          <select name="tags[]" multiple="" class="ui search dropdown">
            <option value="">Select Tag(s)</option>
            @foreach ($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    @if ($errors->any())
      <div class="ui error message">
        <div class="header">Could not post status</div>
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
  </form>
</div>
