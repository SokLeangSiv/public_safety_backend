
@extends('dashboard.master')
@section('dashboard.content')
<div class="container">
    <h1 class="text-left my-4">User Feedback</h1>
    <div class="table-responsive">
        <table class="table table-bordered  text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="email">Email</th>
                    <th scope="col" class="description">Description</th>
                    <th scope="col">Information</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback )
                <tr>

                    <td>{{$feedback->feedback_by}}</td>
                    
                    <td>{!!$feedback->feedback_description!!}</td>
                    <td>
                        <div class="d-flex gap-2 mt-2 justify-content-center text-end">
                     
                            <button class="btn btn-warning col px-4" type="button">Edit</button>

                            {{-- delete button using route and id --}}
                            
                            <button class="btn btn-danger col px-4" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection

