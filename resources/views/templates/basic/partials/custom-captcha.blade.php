@php
	$captcha = getCustomCaptcha(46, '100%');
@endphp
@if($captcha)
    <div class="col-lg-12 form-group">
        @php echo $captcha @endphp
    </div>
    <div class="col-lg-12 form-group">
        <input type="text" name="captcha" placeholder="@lang('Enter Code')">
    </div>
@endif
