@extends('frontend.layouts.app')
@section('main-content')

<section>
    <main id="main" class="container">

        <div class="container-fluid mt-100">
            <div class="d-flex flex-wrap justify-content-between">
                <div> <button type="button" class="btn btn-shadow btn-wide btn-primary" data-toggle="modal" data-target="#forumModal">
                    <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    New thread
                </button>
                </div>
                <form class="form-inline" action="{{ route('forum.search') }}" method="GET">
                    @csrf
                    {{-- <div class='row'> --}}
                    {{-- <div class="col-12 col-md-3 p-0 mb-3"> --}}
                        <input type="text" class="form-control" name="name" placeholder="Search...">
                        <button type="submit" class="find-a-forum-btn">Search</button>
                    {{-- </div> --}}
                    {{-- </div> --}}
                </form>
            </div>
            @if ($search)
            <div class="my-3">
                Search keyword(s): {{ $search }}
            </div>
            @endif
            <div class="card my-3">
                <div class="card-header pl-0 pr-0">
                    <div class="row no-gutters w-100 align-items-center">
                        <div class="col ml-3">Topics</div>
                        <div class="col-4 text-muted">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">Replies</div>
                                <div class="col-8">Last update</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($forum_questions->isEmpty())
                <div class="ml-auto mr-auto my-3">
                    No Jobs found for '{{ $search }}'.
                    Please search for another keyword.
                </div>
                @endif
                @foreach ($forum_questions as $forum_question )
                    <div class="card-body py-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col"> <a href="{{ route('forumDetail', $forum_question->id ) }}" class="text-big" data-abc="true">{{$forum_question->question_title}}</a> <span class="badge badge-success align-text-bottom ml-1">Solved</span>
                                <div class="text-muted small mt-1">Started {{ $forum_question->created_at->diffForHumans() }} &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">{{ $forum_question->users->name }}</a></div>
                            </div>
                            <div class="d-none d-md-block col-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">12</div>
                                    <div class="media col-8 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                                        <div class="media-body flex-truncate ml-2">
                                            <div class="line-height-1 text-truncate">1 day ago</div> <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by Tim cook</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                @endforeach

            </div>
            <nav>
                <ul class="pagination mb-5">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
                </ul>
            </nav>
        </div>

        <!-- New Thread Modal -->
        <div class="modal fade" id="forumModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header d-flex align-items-center bg-secondary text-white">
                            <h6 class="modal-title mb-0" id="threadModalLabel">New Thread</h6>
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
</section>
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
