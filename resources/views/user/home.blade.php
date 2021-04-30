@extends('layouts.app')
@section('content')

    @include('partial.flash-message')
    <div class="row">
        &nbsp;<br/>&nbsp;
    </div>
    <div class="row">
        <div class="col-6">
            @if(isset($signature->id))
            <form method="post" action="/edit/{{$signature->id}}" enctype="multipart/form-data">
            @else
            <form method="post" action="/create" enctype="multipart/form-data">
            @endif

                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="first_name" class="form-control" value="{{old('first_name', isset($signature->first_name)?$signature->first_name:'')}}" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="last_name" class="form-control" value="{{old('last_name', isset($signature->last_name)?$signature->last_name:'')}}" placeholder="Last name">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="{{old('title', isset($signature->title)?$signature->title:'')}}" placeholder="Title">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="phone" class="form-control" value="{{old('phone', isset($signature->phone)?$signature->phone:'')}}" placeholder="Phone No">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" value="{{old('email', isset($signature->email)?$signature->email:'')}}" placeholder="Email ID">
                    </div>
                </div>

                <div class="form-group">
                    <input type="text"  name="linkedin_url" class="form-control" value="{{old('linkedin_url', isset($signature->linkedin_url)?$signature->linkedin_url:'')}}" placeholder="Linkedin Profile Link">
                </div>

                <div class="form-group">
                    <input type="text"  name="address" class="form-control" value="{{old('address', isset($signature->address)?$signature->address:'23475 Rock Haven Way, Suite 125, Sterling VA 20166 (USA)')}}" placeholder="Address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        @if(isset($signature) && isset($signature->profile_image_path))
                            <img height="100" src="{{isset($signature) && isset($signature->profile_image_path)? url('/storage'.$signature->profile_image_path):''}}" />
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" name="profile_image" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        @if(isset($signature) && isset($signature->logo_path))
                            <img height="100" src="{{url('/storage'.$signature->logo_path)}}" />
                        @else
                            <img width="100" src="http://www.mvixusa.com/wp-content/uploads/2016/08/mvix_logo.png" />
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" name="logo_image" class="form-control">
                    </div>
                </div>
                <button type="submit" name="preview" value="preview" class="btn btn-primary">Preview</button>
                <button type="submit" name="save" value="save" class="btn btn-primary">Save</button>
                <a href="/" class="btn btn-light">New form</a>
            </form>
        </div>
        <div class="col-6">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Preview</th>
                    <th>Actions</th>
                </tr>
                @foreach($records as $signature)
                <tr>
                    <td>{{$signature->first_name. ' '. $signature->last_name}}</td>
                    <td><a href="/edit/{{$signature->id}}/preview" type="submit" class="btn btn-light">Preview</a></td>
                    <td><a href="/edit/{{$signature->id}}">Edit</a> | <a onclick="return confirm('Are you sure?')" href="/delete/{{$signature->id}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
    <hr/>
    @if(isset($preview))
        <div class="row">
            <div class="col-6">
                <h2>Preview</h2>
                <div>
                    {!!$preview!!}
                </div>
            </div>
            <div class="col-6">
                <h2 style="float: left">HTML/CSS</h2><a id="copyBlock" href="#" style="float: right">Copy</a>
                <textarea id="preview_code" style="width: 100%; height: 100%">{{$preview}}</textarea>
            </div>
            <span id="copyAnswer"></span>
        </div>
    @endif
@endsection
@section('script')
    <script>
        // Setup the variables
        var textarea = document.getElementById("preview_code");
        var answer  = document.getElementById("copyAnswer");
        var copy    = document.getElementById("copyBlock");
        copy.addEventListener('click', function(e) {
            // Select some text (you could also create a range)
            textarea.select();

            // Use try & catch for unsupported browser
            try {

                // The important part (copy selected text)
                var ok = document.execCommand('copy');

                if (ok) answer.innerHTML = '';
                else    answer.innerHTML = 'Unable to copy!';
            } catch (err) {
                answer.innerHTML = 'Unsupported Browser!';
            }
        });
    </script>
@endsection
