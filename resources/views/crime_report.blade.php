@extends('dashboard.master')

@section('dashboard.content')
<div class="container">
    <h1 class="text-center my-4">Incident Report Table</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="name">Name</th>
                    <th scope="col" class="date-reported">Date Reported</th>
                    <th scope="col" class="status">Status</th>
                    <th scope="col" class="incident-type">Incident Type</th>
                    <th scope="col" class="location">Location</th>
                    <th scope="col" class="date-incident">Date Incident</th>
                    <th scope="col">Information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Thy</td>
                    <td>23/07/20</td>
                    <td class="align-middle"><span class="badge bg-success">Done</span></td>
                    <td>Murder</td>
                    <td>Kompong Cham</td>
                    <td>23/07/19</td>
                    <td>
                        <div class="d-flex gap-2 mt-2 justify-content-center text-end">
                            <button class="btn btn-success col px-4" type="button">View</button>
                            <button class="btn btn-warning col px-4" type="button">Edit</button>
                            <button class="btn btn-danger col px-4" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sok V</td>
                    <td>23/09/22</td>
                    <td class="align-middle"><span class="badge bg-warning text-dark">In Progress</span></td>
                    <td>Theft</td>
                    <td>Phnom Penh</td>
                    <td>23/07/16</td>
                    <td>
                        <div class="d-flex gap-2 mt-2 justify-content-center text-end">
                            <button class="btn btn-success col px-4" type="button">View</button>
                            <button class="btn btn-warning col px-4" type="button">Edit</button>
                            <button class="btn btn-danger col px-4" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
