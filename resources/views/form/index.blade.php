@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>All Data</strong>
            <a role="button" class="btn btn-xs btn-success float-right" href="{{route('forms.create')}}">Create</a>
        </div>
        @if (\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{\Session::get('message')}}</strong>
            </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 offset-6 float-right">
                    <div class="row">
                        <input onkeyup="searchData($(this).val())" type="text" style="max-width: 400px" name="search" id="search" class="form-control mb-2" placeholder="Search Here" aria-describedby="helpId">
                       </div>
                </div>
            </div>
           <div id="allDataSearch">
               @include('form.table', ['forms' => $forms])
           </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let siteUrl = '{{URL::to('/')}}';
        let search = '';
        let type = '';

        function searchData(val)
        {
            search = val;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (search.length>0)
            {
                $.ajax({
                    type: "GET",
                    url: "{{route('custom')}}",
                    data:{
                        'search': search,
                    },
                    success: function (data)
                    {
                        $('#allDataSearch').html(data)
                    },error: function (xhr, status, error) {
                        console.log(error);
                    }
                })
            }
            else{
                fetch()
            }
        }
        function fetch()
        {
            $.ajax({
                type: "GET",
                url: "{{route('custom')}}",
                success: function (data)
                {
                    $('#allDataSearch').html(data);
                    // alert(data.fa);
                }
            });
        }
        $(document).ready(function()
        {
            $(document).on('click', '.paginate>nav>.pagination a', function (e) {
                e.preventDefault();
                var url = $(this).attr('href').split('page=')[1];
                let fullUrl = "/custom?"+"&page="+url;
                $.ajax({
                    url: fullUrl,
                    success: function (data) {
                        $('#allDataSearch').html(data);
                        history.pushState('','',siteUrl+'/custom');
                    }
                });
            });
            $(document).on('click', 'div#paginateData>nav>.pagination a', function (e) {
                e.preventDefault();
                var url = $(this).attr('href').split('page=')[1];
                let fullUrl = "/custom?search="+search+"&page="+url;
                let fa = $(this).attr('href');
                $.ajax({
                    url: fullUrl,
                    success: function (data) {
                        console.log(search)
                        $('#allDataSearch').html(data);
                        //history.pushState('','',fa);
                    }
                });
                // console.log($(this).attr('href'));
            });
        });
    </script>
    <script>
        deleteData=(route,id)=> {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('#' + id).hide();
                    alert('Delete Successfully')
                }
            });
        }
    </script>
@endsection
