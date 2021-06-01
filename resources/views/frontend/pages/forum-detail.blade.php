@extends('frontend.layouts.app')

@section('main-content')
    <section>
        <main id="main" class="container">
            <div class="container-fluid mt-100">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="media flex-wrap w-100 align-items-center">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="d-block ui-w-40 rounded-circle">
                                            <img class="d-block ui-w-40 rounded-circle" src="{{ $forum_question->users->profile_photo_url }}" alt="{{ $forum_question->users->name }}" />
                                        </button>
                                    @endif
                                    {{-- <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" class="d-block ui-w-40 rounded-circle" alt=""> --}}
                                    <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{{ $forum_question->users->name }}</a>
                                        <div class="text-muted small"></div>
                                    </div>
                                    <div class="text-muted small ml-3">
                                        <div>Member since: <strong>{{ \Carbon\Carbon::parse($forum_question->users->created_at)->format('d M, Y')}}</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p> <h2>{{ $forum_question->question_title }} </h2> </p>
                                <p> {!! $forum_question->question_description !!} </p>
                            </div>
                            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                                {{-- <div class="px-4 pt-3"> <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">445</span> </a> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">14532</span> </span> </div> --}}
                                @if (Auth::id())
                                    @if ($forum_question->status != 2)
                                        <div class="px-4 pt-3"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replyModal"><i class="ion ion-md-create"></i>&nbsp; Reply</button> </div>
                                    @else
                                        <div class="px-4 pt-3">
                                            <span class="badge badge-danger align-text-bottom ml-1">Thread Closed</span>
                                        </div>
                                    @endif

                                @else
                                    <div class="px-4 pt-3">
                                        Please <a href="{{route('login')}}">Sign in</a> or <a href="{{route('register')}}">Register</a> to reply to forum.
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <ul>
                            @foreach ($forum_answers as $answer)
                            <li class="forum-messages d-flex">
                                <div class="mr-3 forum-message-rply-user">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:40px">
                                </div>
                                <div>
                                    <small class="forum-messages-by">
                                        {{$answer->name}}
                                    </small>
                                    <div class="forum-message">
                                        {!! $answer->answer_description !!}
                                    </div>
                                </div>
                            </li>
                            <hr class="border">
                            @endforeach
                        </ul>
                    </div>
                </div>             
            </div>


            <!-- Reply Modal -->
        <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header d-flex align-items-center bg-secondary text-white">
                            <h6 class="modal-title mb-0" id="replyModalLabel">Reply with your answer</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <input type="hidden" name="question_id" id="question_id" value="{{ $forum_question->id }}">
                                    <label for="answer_description" class="block font-medium text-sm text-gray-700">Answer Description</label>
                                    <textarea name="answer_description" id="answer_description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        {{ old('answer_description', '') }}
                                    </textarea>
                                    <p class="alert alert-danger errorAnswerDesc hidden" style="margin-top: 5px!important"></p>

                                </div>
                                @if ($forum_question->user_id == Auth::id())
                                    <div class="form-group">
                                        <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                                        <select name="status" id="status" class="custom-select">
                                            <option >Select</option>
                                            <option value="2">Solved</option>
                                        </select>
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary save">Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </main>
    </section>
@endsection


@section('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
    CKEDITOR.replace( 'answer_description' );

    $('.modal-footer').on('click', '.save', function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('forum.storeAnswer') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'answer_description': CKEDITOR.instances.answer_description.getData(),
                    'question_id': $("#question_id").val(),
                    'status': $("#status").val(),
                },
                success: function(data) {
                    $('.errorAnswerDesc').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#replyModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.answer_description) {
                            $('.errorAnswerDesc').removeClass('hidden');
                            $('.errorAnswerDesc').text(data.errors.answer_description);
                        }
                    } else {
                        toastr.success('Successfully replied with answer!', 'Success Alert', {timeOut: 5000});

                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    }
                }
            });
    });
</script>
@endsection
