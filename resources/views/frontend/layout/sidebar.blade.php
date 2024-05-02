<div class="cta-sidebar">
    <div>
        <p><span class="tagline">TrackRak &amp;<br>Get More<br>Money Back!</span><br>
            <br>
            Stay on top of <a style='color: #8529cd; width:auto; font-weight: 600; text-decoration: none;'
                              href="http://tinyurl.com/d98frkfy" target="_blank">Rakuten</a> deals with our
            alert tool. Never miss out on savings again!<br>
            <br>
            Your first alert is <strong>FREE!</strong></p>
        <a href="{{route('register')}}" class="cta-btn">Join now!</a>
    </div>
    <div>
        <p>Already saving with TrackRak?</p>
        <a href="{{ auth()->check() ? route('logout') : route('login') }}" class="cta-btn">
            @if(auth()->guest())
                Login now!
            @else
                Logout
            @endif
        </a>
    </div>
</div>