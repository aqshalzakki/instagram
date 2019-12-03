@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ asset('images/profile.jpg') }}" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="">
                <h1>aqshalzakki</h1>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>1</strong> posts</div>
                <div class="pr-5"><strong>141</strong> followers</div>
                <div class="pr-5"><strong>139</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">yourdisturber</div>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque reiciendis vel ratione laborum commodi aliquid nisi, iusto voluptates ad, deserunt consequatur.</div>
            <div><a href="https://github.com/aqshalzakki">My github account</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://instagram.fbdo5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/19985093_235710903614081_1709185430898868224_n.jpg?_nc_ht=instagram.fbdo5-1.fna.fbcdn.net&_nc_cat=105&oh=177de601831ddf2eccf4645274ad98c9&oe=5E7473A2" class="w-100">
        </div>
        <div class="col-4">
            <img src="http://news.efinancialcareers.com/binaries/content/gallery/efinancial-careers/articles/2019/03/programmer.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://res.cloudinary.com/practicaldev/image/fetch/s--ZmPcIbAW--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://dzone.com/storage/temp/12334613-971.jpg" class="w-100">
        </div>
    </div>
</div>
@endsection
