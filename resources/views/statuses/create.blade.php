<form class="ui form" action="{{ route('statuses') }}" method="post">
  @csrf
  <label for="status">Write status</label>
  <div class="ui input">
    <input type="text" name="body" value="{{ old('status') }}" onsubmit="this.form.submit()" id="status">
  </div>
</form>
