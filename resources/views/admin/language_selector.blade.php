{{--<div class="col-md-12 mb-4">--}}
   {{--<div class="d-flex  align-items-center">--}}
      {{--<div class="seclector">--}}
         {{--<div style="font-weight: bold;">--}}
         {{--<div class="current">--}}
            {{--English--}}
         {{--</div>--}}
      {{--</div>--}}
         {{--<i class="fas fa-angle-down"></i>--}}
         {{--<ul class="option change-lang">--}}
            {{--@foreach(Config::get('app.available_locales') as $lang=> $key)--}}
               {{--<li data-lang="{{$key}}">  {{$lang}}</li>--}}
            {{--@endforeach--}}
         {{--</ul>--}}
      {{--</div>--}}
   {{--</div>--}}
{{--</div>--}}

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
   @foreach($language as $lang)
      <li class="nav-item">
         <a class="nav-link @if($lang->code == 'en') active @endif" id="pills-{{$lang->code}}-tab" data-toggle="pill" href="#pills-{{$lang->code}}" role="tab" aria-controls="pills-{{$lang->code}}" aria-selected="{{$lang->code == 'en' ? 'true' : 'false'}}">{{$lang->name}}</a>
      </li>
   @endforeach
</ul>
