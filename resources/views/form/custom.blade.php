<table  class="table table-striped table-inverse table-bordered table-responsive">
    <thead class="thead-inverse">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Password</th>
        <th>Select</th>
{{--        <th>Multi Select</th>--}}
        <th>Textarea</th>
        <th>Radio</th>
{{--        <th>Checkbox</th>--}}
{{--        <th>Color</th>--}}
        <th>Date</th>
        <th>Month</th>
{{--        <th>File</th>--}}
        <th>Time</th>
        <th>Week</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @forelse($forms as $key=>$form)
        <tr id="{{$form->id}}">
            <td>{{$form->id}}</td>
            <td>{{$form->name}}</td>
            <td>{{$form->email}}</td>
            <td>{{$form->number}}</td>
            <td>{{$form->password}}</td>
            <td>{{$form->select}}</td>
{{--            <td>--}}
{{--                @if (isset($form->multi_select))--}}
{{--                    <ul>--}}
{{--                        @foreach ($form->multi_select as $select)--}}
{{--                            <li>{{$select}}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
{{--            </td>--}}
            <td>
                {{$form->textarea}}
            </td>
            <td>{{$form->radio}}</td>
{{--            <td>--}}
{{--                @if (isset($form->checkbox))--}}
{{--                    <ul>--}}
{{--                        @foreach ($form->checkbox as $checkbox)--}}
{{--                            <li>{{$checkbox}}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
{{--            </td>--}}
{{--            <td style="background-color: {{$form->color}}"></td>--}}
            <td>{{$form->date}}</td>
            <td>{{$form->month}}</td>
{{--            <td>--}}
{{--                <img alt="" height="50" width="50" src="/storage/images/{{$form->file}}">--}}
{{--            </td>--}}
            <td>{{$form->time}}</td>
            <td>{{$form->week}}</td>
            <td><a class="btn btn-primary" href="{{route('forms.edit',$form->id)}}" role="button">Edit</a>
                <a class="btn btn-danger mt-2" onclick="deleteData('{{route('forms.destroy',$form->id)}}','{{$form->id}}')" href="javascript:void(0)" role="button">Delete</a></td>
        </tr>
    @empty
        <h4>No Data Found</h4>
    @endforelse
    </tbody>
</table>
<div class="paginate">
    {!! $forms->links() !!}
</div>
