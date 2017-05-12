{{-- <div class="form-group row add">
	<div class="col-md-8">
		<input type="text" class="form-control" id="name" name="replyBody-{{ $status->id }}"
			placeholder="Reply to this status" required>
		<p class="error text-center alert alert-danger hidden"></p>
	</div>
	<div class="col-md-4">
		<button class="ui small primary button replyButton" type="submit" data-id="{{ $status->id }}">
			<i class="reply icon"></i>Reply
		</button>
	</div>
</div>
{{ csrf_field() }} --}}
<form class="ui reply form">
    <div class="field">
			<input type="text" class="form-control" id="name" name="replyBody-{{ $status->id }}"
				placeholder="Reply to this status" required>
    </div>
    <div class="ui blue labeled submit icon button replyButton" type="submit" data-id="{{ $status->id }}">
      <i class="icon edit"></i> Add Reply
    </div>
</form>
{{ csrf_field() }}
