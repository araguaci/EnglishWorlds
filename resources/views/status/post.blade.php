<div class="row">
  <div class="col-lg-6">
    <form role="form" action="#" id="postStatus">
      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <textarea class="form-control" rows="2" placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" required id="status"></textarea>
        @if ($errors->has('status'))
          <span class="help-block">{{ $errors->first('status') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-default">Update status</button>
      {{ csrf_field() }}
    </form>
    <hr>
  </div>
</div>
