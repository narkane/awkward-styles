@extends('layouts.dashboard')

@section('content')

<div class="container">
    
      <div class="row">
         <div class="col-md-3">
            <div id="accordion">
    <div class="card">
      <div class="card-header">
      
        
        <div> <span class="icon-user-circle"></span><a class="card-link accor-header" data-toggle="collapse" href="#collapseOne">
        
          My Account  <span class="icon-angle-down right-arrow1"></span>
        </a></div>
        
    
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
           <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
         
        </div>
      </div>
    </div>
    
     <div class="card">
      <div class="card-header">
      
        
        <div> <span class="icon-user-circle"></span><a class="card-link accor-header" data-toggle="collapse" href="#collapseFive">
        
          My Stores  <span class="icon-angle-down right-arrow1"></span>
        </a></div>
        
    
      </div>
      <div id="collapseFive" class="collapse" data-parent="#accordion">
        <div class="card-body">
           <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
         
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
       <span class="icon-clock"></span> <a class="collapsed card-link accor-header" data-toggle="collapse" href="#collapseTwo">
        My Earnings <span class="icon-angle-down right-arrow1"></span>
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
       <span class="icon-chart-bar"></span> <a class="collapsed card-link accor-header" data-toggle="collapse" href="#collapseThree">
          Reports <span class="icon-angle-down right-arrow1"></span>
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
        </div>
      </div>
    </div>
    
     <div class="card">
      <div class="card-header">
       <span class="icon-sun"></span> <a class="collapsed card-link accor-header" data-toggle="collapse" href="#collapseFour">
          Settings <span class="icon-angle-down right-arrow1"></span>
        </a>
      </div>
      <div id="collapseFour" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
        </div>
      </div>
    </div>
    
    
  </div>
         
         </div>
         
         <div class="col-md-6">
           
           <div class="container p-4">
             
            <h4>My Stores view comes here</h4>
           </div>
         
         
         </div>
         
         
         
      </div>

        

       

        
        
        
        
    </div>

@endsection
