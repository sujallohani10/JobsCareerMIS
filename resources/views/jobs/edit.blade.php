<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Job
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('jobs.update', $job->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_title" class="block font-medium text-sm text-gray-700">Job Title</label>
                            <input type="text" name="job_title" id="job_title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('category_name', $job->job_title) }}" />
                            @error('job_title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">Job Category</label>
                            <select name="category_id" id="category_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                <option value="{{ $jobCategoryById->id }}">{{ $jobCategoryById->category_name }}</option>
                                @foreach ($jobcategories as $category)
                                    <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_desc" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea name="job_desc" id="job_desc" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                {{ old('job_desc', $job->job_desc) }}
                            </textarea>
                            @error('job_desc')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_qualification" class="block font-medium text-sm text-gray-700">Qualification</label>
                            <input type="text" name="job_qualification" id="job_qualification" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('job_qualification', $job->job_qualification) }}" />
                            @error('job_qualification')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_experience" class="block font-medium text-sm text-gray-700">Experience</label>
                            <input type="text" name="job_experience" id="job_experience" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('job_experience', $job->job_experience) }}" />
                            @error('job_experience')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_expiry_date" class="block font-medium text-sm text-gray-700">Expiry Date</label>
                            <input type="text" name="job_expiry_date" id="job_expiry_date" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full datepicker"
                                   value="{{ old('job_expiry_date', $job->job_expiry_date) }}" />
                            @error('job_expiry_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="company_name" class="block font-medium text-sm text-gray-700">Company Name</label>
                            <input type="text" name="company_name" id="company_name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('company_name', $job->company_name) }}" />
                            @error('company_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="company_address" class="block font-medium text-sm text-gray-700">Company Address</label>
                            <input type="text" name="company_address" id="company_address" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('company_address', $job->company_address) }}" />
                            @error('company_address')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="career_level" class="block font-medium text-sm text-gray-700">Career Level</label>
                            <input type="text" name="career_level" id="career_level" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('career_level', $job->career_level) }}" />
                            @error('career_level')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="job_type" class="block font-medium text-sm text-gray-700">Job Type</label>
                            <input type="text" name="job_type" id="job_type" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('job_type', $job->job_type) }}" />
                            @error('job_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="min_salary" class="block font-medium text-sm text-gray-700">Min Salary</label>
                            <input type="text" name="min_salary" id="min_salary" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('min_salary', $job->min_salary) }}" />
                            @error('min_salary')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="max_salary" class="block font-medium text-sm text-gray-700">Max Salary</label>
                            <input type="text" name="max_salary" id="max_salary" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('max_salary', $job->max_salary) }}" />
                            @error('max_salary')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'job_desc' );

            $( function() {
                $( ".datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd",
                });
            } );
    </script>
</x-app-layout>
