@extends('layouts.app')

@section('content')
    <!-- 1. Picture + Bio -->
    @include('portfolio.partials.hero')

    <!-- 2. Professional Experience -->
    @include('portfolio.partials.experience')

    <!-- 3. Education -->
    @include('portfolio.partials.education')

    <!-- 4. Projects (Git repo + live website links included) -->
    @include('portfolio.partials.projects')

    <!-- 5. Programming Languages & Frameworks -->
    @include('portfolio.partials.skills')

    <!-- 6. Contact Person Details -->
    @include('portfolio.partials.contact')

    <!-- 7. An Invitation to Work Together (Collaboration Form) -->
    @include('portfolio.partials.collaboration')
@endsection
