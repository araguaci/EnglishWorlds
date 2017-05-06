<div class="form-group row add">
	<div class="col-md-8">
		<input type="text" class="form-control" id="name" name="replyBody-{{ $status->id }}"
			placeholder="Reply to this status" required>
		<p class="error text-center alert alert-danger hidden"></p>
	</div>
	<div class="col-md-4">
		<button class="btn btn-primary btn-sm replyButton" type="submit" data-id="{{ $status->id }}">
			Reply <span class="glyphicon glyphicon-share-alt"></span>
		</button>
	</div>
</div>
{{ csrf_field() }}
