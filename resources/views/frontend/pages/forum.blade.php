@extends('frontend.layouts.app')
@section('main-content')

<section>

</section>

<main id="main" class="container">
    <div>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <button class="find-a-job-btn" type="button" data-toggle="modal" data-target="#forumModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Add discussion
                </button>
            </div>
        </div>
    </div>
    <div class="joblisting my-5">
        <div class="row">
            @foreach ($forum_questions as $forum_question )
                <div class="col-12">
                    <div class="job-list border-bottom">
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{ url('job-detail/'.$forum_question->id) }}">{{ $forum_question->question_title }}</a></h5>
                                    {{-- <span class="job-type">{{$job->job_type}}</span> --}}
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled">
                                        <li> <span class="mr-1">via</span> <a href="#">{{ $forum_question->user_id }}</a>
                                        </li>
                                        {{-- <li><i class="ri-map-pin-fill icon-size"></i>{{$job->company_address}}</li> --}}
                                        {{-- <li><i class="ri-filter-2-fill icon-size"></i>{{$job->jobcategories->category_name}}</li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            <span class="job-list-time">
                                <i class="ri-time-fill icon-size"></i>
                                {{ $forum_question->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- New Thread Modal -->
    <div class="modal fade" id="forumModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header d-flex align-items-center bg-secondary text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="threadTitle">Question Title</label>
                                <input type="text" class="form-control" name="question_title" id="question_title" placeholder="Enter title" autofocus="" />
                                <p class="alert alert-danger errorTitle hidden" style="margin-top: 5px!important"></p>

                            </div>

                            <div class="form-group">
                                <label for="question_description" class="block font-medium text-sm text-gray-700">Question Description</label>
                                <textarea name="question_description" id="question_description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    {{ old('question_description', '') }}
                                </textarea>
                                <p class="alert alert-danger errorDesc hidden" style="margin-top: 5px!important"></p>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary save">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main><!-- End #main -->
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
    CKEDITOR.replace( 'question_description' );

    $('.modal-footer').on('click', '.save', function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('forum.storeQuestion') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'question_title': $('#question_title').val(),
                    'question_description': CKEDITOR.instances.question_description.getData(),
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorDesc').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#forumModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.question_title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.question_title);
                        }
                        if (data.errors.question_description) {
                            $('.errorDesc').removeClass('hidden');
                            $('.errorDesc').text(data.errors.question_description);
                        }
                    } else {
                        toastr.success('Successfully saved Question!', 'Success Alert', {timeOut: 5000});

                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    }
                }
            });
    });
</script>
@endsection
