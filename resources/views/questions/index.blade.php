@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <div class="d-flex align-items-center">
                       <h4>Questions</h4>
                       <div class="ml-auto">
                           <a href="{{route('questions.create')}}" class="btn btn-outline-primary"> Ask Question </a>
                       </div>
                   </div>     
                    
                </div>

                <div class="card-body">
                    @foreach($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{$question->votes}}</strong> {{Str::plural('Vote', $question->votes)}}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{$question->answers}}</strong> {{Str::plural('Answer', $question->answers)}}
                                </div>
                                <div class="view">
                                    {{$question->views .' '. Str::plural('View', $question->views)}}
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                <div class="lead">
                                    Asked by 
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    <small class="text-muted">
                                        {{$question->created_date}}
                                    </small>
                                </div>
                                {{ Str::limit($question->body, 200)}}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="max-auto">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection