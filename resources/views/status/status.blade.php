<div class="media">
  <a href="{{ route('profile.index', ['username' => $status->user->name]) }}" class="pull-left">
    <img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}" class="media-object">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->name]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
    <p>{{ $status->body }}</p>
    <ul class="list-inline">
      <li>{{ $status->created_at->diffForHumans() }}</li>
      @if (!Auth::user()->hasLikedStatus($status))
        @if ($status->user->id !== Auth::user()->id)
        <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a></li>
        @endif
      @endif
      @if (Auth::user()->id == $status->user->id)
        <li><a href="{{ route('status.delete', ['statusId' => $status->id ])}}">Delete</a></li>
        <li><a href="#" data-statusid="{{ $status->id }}"></a></li>
      @endif
      <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
    </ul>
    <div id="repliesBlock{{ $status->id }}">
      @foreach ($status->replies as $reply)
        @include('status.comment');
      @endforeach
    </div>
    @include('status.reply')
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Status</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
