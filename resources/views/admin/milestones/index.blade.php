@extends('layouts.admin.app')
@section('content')
<h2 class="">Milestones</h2>
<hr>
{{-- {{ $data }} --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="table_id" class="table display table-hover ">
                    <thead class="text-white bg-primary">
                        <tr>
                            <th>S.no</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->milestone->title }}</td>
                            @if($value->amount==0)
                            <td>N/A</td>
                            @else
                            <td>{{ $value->amount }}</td>
                            @endif
                            <form action="{{ route('milestone.update',$value->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <td>
                                    @if($value->status=="Paid")
                                    <select class="form-control" id="status" name="status" readonly>
                                        <option value="Paid" {{$value->status=='Paid'?'selected' : ''}} >Paid</option>
                                        <option value="Unpaid" {{$value->status=='Unpaid'?'selected' : ''}} >Unpaid</option>
                                    </select>
                                    @else
                                    <select class="form-control" id="status" name="status">
                                        <option value="Paid" {{$value->status=='Paid'?'selected' : ''}}>Paid</option>
                                        <option value="Unpaid" {{$value->status=='Unpaid'?'selected' : ''}}>Unpaid</option>
                                    </select>
                                    @endif
                                </td>
                                <td>
                                    @if($value->task=="Completed")
                                    <select class="form-control" id="task" name="task" disabled>
                                        <option value="Pending" {{$value->task=='Pending'?'selected' : ''}}>Pending</option>
                                        <option value="Completed" {{$value->task=='Completed'?'selected' : ''}}>Completed</option>
                                    </select>
                                    @else
                                    <select class="form-control" id="task" name="task">
                                        <option value="Pending" {{$value->task=='Pending'?'selected' : ''}}>Pending</option>
                                        <option value="Completed" {{$value->task=='Completed'?'selected' : ''}}>Completed</option>
                                    </select>
                                    @endif
                                </td>
                                <td><button class="btn btn-primary" id="update" type="submit" name="submit">Update</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
