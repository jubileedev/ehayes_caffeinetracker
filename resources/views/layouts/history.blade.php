@extends('layouts.app')

@section('content')
<div class="container">
<main>
<div class="row">
<div class="col-sm-12">
    <h3 class="display-5">{{ucfirst(Auth::user()->name)}}'s Drink History</h3>    
    <hr/>
    @if(count($drinker) < 1)
    <div class="alert alert-warning"> <strong>Sorry!</strong> No drinks recorded for today.</div>                                      
    @else
    <table class="table table-striped">
    <thead>
            <tr>
              <td>Drink Name</td>
              <td>Servings</td>
              <td>Total Caffeine Intake</td>
              <td>Date</td>
            </tr>
        </thead>
        <tbody>
    @foreach ($drinker as $drinker)
        <tr>
           
            <td>
            <form method="POST" action="drinkers/{{$drinker->id}}">
            
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type='submit' class='button btn-primary'><i class="fas fa-trash"></i></button>
            {{\App\Drinks::find($drinker->beverage)->drink_name}}</td>
            </form>
           
            <td>{{$drinker->servings}}</td>
            <td>{{($drinker->servings * \App\Drinks::find($drinker->beverage)->caffeine_mg)}} </td>
            <td>{{ \Carbon\Carbon::parse($drinker->created_at)->format('m/d/Y')}}</td>
        </tr>

        @endforeach
        @endif
    </tbody>
  </table>
<div>
</div>
@endsection