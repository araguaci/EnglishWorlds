<div class="ui raised segment">
  <form role="form" action="#" id="postStatus" enctype="multipart/form-data" class="ui form error">
    <label for="image" class="ui icon button">
      <i class="image icon"></i>
    Open File
    </label>
    <input type="file" id="image" name="image[]" accept='image/*' style="display:none" multiple>
    <hr>
    	<div class="field{{ $errors->has('status') ? ' has-error' : '' }}">
    			<textarea placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" required id="status"></textarea>
    	</div>
  		@if ($errors->has('status'))
  			<span class="help-block">{{ $errors->first('status') }}</span>
  		@endif
      <button type="submit" class="ui primary button" id="statusPostBtn">Update status</button>
    	{{ csrf_field() }}
  </form>
</div>
