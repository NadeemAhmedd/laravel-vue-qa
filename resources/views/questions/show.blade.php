@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                  <div class="card-title">
                   <div class="d-flex align-items-center">
                       <h2>{{$question->title}}</h2>
                       <div class="ml-auto">
                           <a href="{{route('questions.index')}}" class="btn btn-outline-primary"> Back To All Questions </a>
                       </div>
                   </div>    
                </div>
                <hr>
                <div class="media">
                  <vote :model='{{ $question }}' name='question'></vote>
                  <div class="media-body">
                      {!! $question->body_html !!}
                      <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4">
                          <user-info :model="{{ $question }}" label="Asked"></user-info> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
   @include('answers._index',[
      'answersCount' => $question->answers_count,
      'answers' => $question->answers,
    ])
    @include('answers._create')
</div>
@endsection
