@extends('layouts.app')

@section('title')
Buy Packages For User

@endsection

@section('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

@endsection

    @section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">buy packages</li>
    @endsection

@section('content')

<div class="row">
    <div class="offset-3 col-lg-6">

        <form action="https://checkout.stripe.com/" method="post">

            <label>Training Package</label>
            <select class="form-select mb-3" name="package">
                @foreach ($packages as $package)

                    <option value="{{ $package->id }}">{{ $package->name }} - {{ $package->price }} $$</option>

                @endforeach
            </select>

            <label>User</label>
            <select class="form-select mb-3" name="user">

                @foreach ($users as $user)

                    <option value="{{ $user->id }}">{{ $user->name }}</option>

                @endforeach
            </select>
            <label>Gym</label>
            <select class="form-select mb-5" name="gym">

                @foreach ($gyms as $gym)

                    <option value="{{ $gym->id }}">{{ $gym->name }}</option>

                @endforeach

            </select>


              <button type="submit" class="btn btn-primary btn-lg">Buy</button>

        </form>

    </div>
</div>


@endsection
