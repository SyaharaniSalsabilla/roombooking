@extends('template.front.main')
@section('content')
<section class="m-t-80 p-b-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-error-404">404</div>
            </div>
            <div class="col-lg-6">
                <div class="text-start">
                    <h1 class="text-medium">Ooops, This Page Could Not Be Found!</h1>
                    <p class="lead">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <div class="seperator m-t-20 m-b-20"></div>
                    <div class="search-form">
                        <p>Please try searching again</p>
                        <form action="search-results-page.html" method="get" class="form-inline">
                            <div class="input-group input-group-lg">
                                <input type="text" aria-required="true" name="q" class="form-control widget-search-form" placeholder="Search for pages...">
                                <button type="submit" id="widget-widget-search-form-button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection