        <div class="card card-primary">
            <div class="card heading">
                <h3 class="card-header">Hot News</h3>
            </div>
            @foreach($forum as $forum)
            <div class="list-group">
                  <a href="{{ route('forum.show', $forum->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <h4 class="mb-1">{{ $forum->title }}</h4>
                    <p class="mb-1">{{ $forum->post }}</p><br>
                    <div class="d-flex w-100 justify-content-between">
                        @foreach ($forum->tags as $tag)
                            <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                    <span class="pull-right">by $user {{ date('j F Y, h:ia', strtotime($forum->created_at)) }}</span>
                    </div>
                  </a>
            </div>
            @endforeach
        </div>