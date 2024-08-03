@extends('front.layout.app')
@section('title', $page->title)
@section('content')
    <section class="about__area pt-120 pb-120 p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-8 col-lg-8">
                    <div class="about__content">
                        <div class="section__title-wrapper mb-15">
                            <h2 class="section__title">{{$page->title}}</h2>
                        </div>
                        <div class="about__list mb-40">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
