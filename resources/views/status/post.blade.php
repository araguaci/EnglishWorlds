<div class="ui raised segment">
  <div class="ui icon buttons">
  	<button class="ui button"><i class="align left icon"></i></button>
  	<button class="ui button"><i class="align center icon"></i></button>
  	<button class="ui button"><i class="align right icon"></i></button>
  	<button class="ui button"><i class="align justify icon"></i></button>
  </div>
  <div class="ui icon buttons">
  	<button class="ui button"><i class="bold icon"></i></button>
  	<button class="ui button"><i class="underline icon"></i></button>
  	<button class="ui button"><i class="text width icon"></i></button>
  </div>
  <label for="image" class="ui icon button">
    <i class="image icon"></i>
  Open File
  </label>
  <input type="file" id="image" name="image" accept='image/*' style="display:none">
  <hr>
  <form role="form" action="#" id="postStatus" enctype="multipart/form-data" class="ui form error">
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
