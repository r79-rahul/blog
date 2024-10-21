<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="width: 50%;">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ url('posts') }}"> Posts</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @csrf
                <ul class="list-group">
                    @foreach($posts as $post)
                    <li class="list-group-item">
                        {{ $post['content'] }}
                        <br>
                        <small>By: {{ $post['created_by'] }}</small>
                        <br>
                        <br>

                        <!-- Comments -->
                        <p>Comments:</p>
                         <div style=" height: 70px; overflow-y: auto;">
                             <ul class="list-group">
                                @if(isset($comments[$post['id']]))
                                    @foreach($comments[$post['id']] as $cmt)
                                    <li class="list-group-item"> {{ $cmt['content'] }} </li>
                                    @endforeach
                                @endif
                             </ul>
                         </div>

                        <div class="input-group mb-3 mt-2" style="width: 30%;">
                            <input type="text" class="form-control comment" name="comment" placeholder="Comment">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary save-comment" type="button" id="button-addon2" data-postid="{{ base64_encode($post['id']) }}">Submit</button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.save-comment', function() {
            const comment = $(this).closest('.input-group').find('.comment').val();
            
            if (!comment) {
                alert('Comment cannot be empty');
                return false;
            }
            
            $.ajax({
                url: 'comment/'+comment,
                method: 'POST',
                data: {
                    '_token': $('[name="_token"]').val(),
                    'postId': $(this).data('postid'),
                },
                success: function(response) {
                    alert(response.msg);
                }
            });
        });
    </script>
</x-app-layout>
