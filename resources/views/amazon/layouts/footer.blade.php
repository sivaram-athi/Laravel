<footer>
    @if (auth()->user())
    @else
        <section class="signin-section">
            <p>See personalized recommendations</p>
            <button>
                <a href="{{ url('/login') }}">Sign in</a>
            </button>
            <p>New customer?<a href="{{ url('/register') }}">Start here.</a></p>
        </section>
    @endif

    <section class="footer-first-shortcut-links">

        <div>
            <p>Get to Know Us</p>

            <div class="links">
                <a href="">Careers</a>
                <a href="">Blog</a>
                <a href="">About Amazon</a>
                <a href="">Investor Relations</a>
                <a href="">Amazon Devices</a>
                <a href="">Amazon Science</a>
            </div>
        </div>

        <div>
            <p>Make Money with Us</p>

            <div class="links">
                <a href="">Sell products on Amazon</a>
                <a href="">Sell on Amazon Business</a>
                <a href="">Sell apps on Amazon</a>
                <a href="">Become an Affiliate</a>
                <a href="">Advertise Your Products</a>
                <a href="">Self-Publish with Us</a>
                <a href="">Host an Amazon Hub</a>
                <a href=""><i class="fa-solid fa-caret-right"></i>See More Make Money <br> with Us</a>
            </div>
        </div>

        <div>
            <p>Amazon Payment Products</p>

            <div class="links">
                <a href="">Amazon Business Card</a>
                <a href="">Shop with Points</a>
                <a href="">About Amazon</a>
                <a href="">Reload Your Balance</a>
                <a href="">Amazon Currency Converter</a>
            </div>
        </div>
        <div>
            <p>Let Us Help You</p>

            <div class="links">
                <a href="">Amazon and COVID-<br>19</a>
                <a href="">Your Account</a>
                <a href="">Your Orders</a>
                <a href="">Shipping Rates & <br>Policies</a>
                <a href="">Returns & <br>Replacements</a>
                <a href="">Manage Your <br> Content and Devices</a>
                <a href="">Amazon Assistant</a>
                <a href="">Help</a>
            </div>
        </div>
    </section>
    <section class="copyright-section">
        <div class="important-links">
            <a href="">Conditions of Use</a>
            <a href="">Privacy Notice</a>
            <a href="">Your Ads Privacy Choices</a>
        </div>
        <p class="copyright">
            &copy; 1996-2023, Amazon.com, Inc. or its affiliates
        </p>
    </section>

</footer>
