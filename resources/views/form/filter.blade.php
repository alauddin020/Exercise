@if (count($forms))
    <table  class="table table-striped table-inverse table-bordered table-responsive">
        <thead class="thead-inverse">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Password</th>
            <th>Select</th>
            <th>Textarea</th>
            <th>Radio</th>
            <th>Date</th>
            <th>Month</th>
            <th>Time</th>
            <th>Week</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach($forms as $key=>$form)
            <tr id="{{$form->id}}">
                <td>{{$form->id}}</td>
                <td>{{$form->name}}</td>
                <td>{{$form->email}}</td>
                <td>{{$form->number}}</td>
                <td>{{$form->password}}</td>
                <td>{{$form->select}}</td>
                <td>
                    {{$form->textarea}}
                </td>
                <td>{{$form->radio}}</td>
                <td>{{$form->date}}</td>
                <td>{{$form->month}}</td>
                <td>{{$form->time}}</td>
                <td>{{$form->week}}</td>
                <td><a class="btn btn-primary" href="{{route('forms.edit',$form->id)}}" role="button">Edit</a>
                    <a class="btn btn-danger mt-2" onclick="deleteData('{{route('forms.destroy',$form->id)}}','{{$form->id}}')" href="javascript:void(0)" role="button">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="paginateData">
        {!! $forms->links() !!}
    </div>
@else
    <div class="row justify-content-center mt-4">
        <h3><strong>No Data Found</strong></h3>
    </div>
@endif
