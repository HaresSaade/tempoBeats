@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<style>
    
    .profilemain{
        display:block;
        padding:15px;
        max-height:92vh;
        background-color:#1d1b1b;
    }
    .profilemain input{
        margin:5px;
    }
    .profilemain button{
        margin:5px;
    }
    .profilemain label{
        margin:5px;
    }
    .profilemain p{
        margin:5px;
    }
    
    #Dac{
        width:115px;
        height:40px;
    }
    #resend-btn{
        width:65px;
    }
    </style>
  <div class="profilemain">
            
                <div >
                    @include('profile.partials.update-profile-information-form')
                </div>
            

            
                <div >
                    @include('profile.partials.update-password-form')
                </div>
            

            
                <div >
                    @include('profile.partials.delete-user-form')
                </div>
            
        
  
    <div class="row">
                    <div class="breakline">
                        <hr>
                    </div>
              </div>

    </div>
@endsection
