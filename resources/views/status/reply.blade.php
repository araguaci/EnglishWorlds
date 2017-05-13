<form class="ui reply form">
    <div class="field">
			<input type="text" name="replyBody-{{ $status->id }}"
				placeholder="Reply to this status" required>
    </div>
    <div class="ui blue tiny labeled submit icon button replyButton" type="submit" data-id="{{ $status->id }}">
      <i class="icon edit"></i> Add Reply
    </div>
</form>
{{ csrf_field() }}
