
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
                    <td>{$feedback->email}</td>
                    <td>Sed fermentum nunc vel libero iaculis, sed tempus tortor convallis. Sed quis lorem eu ante tempor eleifend. Sed convallis purus ac lorem sodales, ut efficitur nunc pellentesque. Aenean vestibulum odio nec interdum egestas. Morbi auctor, sapien vitae interdum faucibus, arcu arcu congue justo, eget suscipit libero dui id lacus. Integer non consectetur lorem. Ut ut erat vitae tellus sodales accumsan.</td>
                    <td>
                        <div class="d-flex gap-2 mt-2 justify-content-center text-end">
                            <button class="btn btn-success col px-4" type="button">View</button>
                            <button class="btn btn-warning col px-4" type="button">Edit</button>
                            <button class="btn btn-danger col px-4" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>user@example.com</td>
                    <td>Sed fermentum nunc vel libero iaculis, sed tempus tortor convallis. Sed quis lorem eu ante tempor eleifend. Sed convallis purus ac lorem sodales, ut efficitur nunc pellentesque. Aenean vestibulum odio nec interdum egestas. Morbi auctor, sapien vitae interdum faucibus, arcu arcu congue justo, eget suscipit libero dui id lacus. Integer non consectetur lorem. Ut ut erat vitae tellus sodales accumsan.</td>
                    <td>
                        <div class="d-flex gap-2 mt-2 justify-content-center text-end">
                            <button class="btn btn-success col px-4" type="button">View</button>
                            <button class="btn btn-warning col px-4" type="button">Edit</button>
                            <button class="btn btn-danger col px-4" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
@endsection

