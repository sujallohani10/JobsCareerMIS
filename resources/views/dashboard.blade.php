<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- here is the code or icons for dashboard of admin panel  --}}

                <div class="flex flex-wrap">
                    @can('admin_user_access')
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                                        <h3 class="font-bold text-3xl"><a href="{{ route('users.index') }}">{{$total_users}}</a> <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    @endcan

                    @can('job_category_access')
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-600">Job Category</h5>
                                        <h3 class="font-bold text-3xl"><a href="{{ route('jobcategory.index') }}">{{$total_category}}</a> <span class="text-green-500"></span></h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    @endcan


                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600"><a href="{{route('profile.show')}}">User Profile</a> </h5>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>


                    @can('job_access')
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-600">Jobs</h5>
                                        <h3 class="font-bold text-3xl"><a href="{{ route('jobs.index') }}">{{$total_jobs}}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    @endcan


                    @if(isset(Auth::user()->roles[0]->id) && Auth::user()->roles[0]->id != 1)
                    @can('job_application')
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-600">Job Application</h5>
                                        <h3 class="font-bold text-3xl"><a href="{{ route('jobapplication.index') }}">{{$total_job_application}}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    @endcan
                    @endif

                    @can('student_applied_jobs')
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-600">Applied Jobs</h5>
                                        <h3 class="font-bold text-3xl"><a href="{{ route('jobapplication.appliedjobs') }}">{{$total_job_applied_student_users}}</a></i></span></h3>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
