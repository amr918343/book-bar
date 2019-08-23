        @if(count($errors) > 0)
            <ul class="content-error list-group-item-warning">
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            </ul>
        @endif