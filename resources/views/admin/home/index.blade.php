@extends('layouts.admin_layout')

@section('title','general')

@section('content')
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
            key: "YOUR_API_KEY",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });
    </script>
    <style>
        #map {
            height: 400px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }
    </style>
    <div class="row pt-4 mt-1">

        <div class="col-xl-12">
            <section class="news">
            @foreach($news as $n)
                <h2>{{$n->title}}</h2>
                <div>{!! $n->content !!}</div>
            @endforeach
            </section>
        </div>
    </div>
    <div class="row pt-4 mt-1">

        <div class="col-xl-12">
            <section class="card">
                <header class="card-header card-header-transparent">
                    <h2 class="card-title">Projects Stats</h2>
                </header>
                <div class="card-body">
                    <div id="map"><iframe src="https://www.google.ru/maps/@33.6935634,-38.7320898,3z?hl=en&entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
            </section>
        </div>
    </div>
@endsection
