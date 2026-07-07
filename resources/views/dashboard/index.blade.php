@extends('layouts.admin')

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">
                    Dashboard
                </h3>

            </div>

            <div class="card-body">

                Welcome {{ auth()->user()->name }}

            </div>

        </div>

    </div>

</div>

@endsection
