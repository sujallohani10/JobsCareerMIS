@extends('frontend.layouts.app')

@section('main-content')
    <section>
        <main id="main" class="container">
            <div class="container-fluid mt-100">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="media flex-wrap w-100 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                                    <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{{ $forum_question->users->name }}</a>
                                        <div class="text-muted small"></div>
                                    </div>
                                    <div class="text-muted small ml-3">
                                        <div>Member since: <strong>{{ $forum_question->users->created_at->toDateString() }}</strong></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p> <h2>{{ $forum_question->question_title }} </h2> </p>
                                <p> {!! $forum_question->question_description !!} </p>
                            </div>
                            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                                <div class="px-4 pt-3"> <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">445</span> </a> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">14532</span> </span> </div>
                                <div class="px-4 pt-3"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replyModal"><i class="ion ion-md-create"></i>&nbsp; Reply</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card mb-4 p-3 d-flex">
                            @foreach ($forum_answers as $answer)
                            <div class="forum-messages">
                                {!! $answer->answer_description !!}
                            </div>
                            <small class="forum-messages-by">
                                {{$answer->name}}
                            </small>
                            @endforeach
                        </div>
                         
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
